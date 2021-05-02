<?php 


function force_ssl() {
    if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
        $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        redirect($url);
        exit;
    }
}


function encode($id) {
	$this->load->library('encrypt');
	$id = $this->encrypt->encode($id);
	$id = urlencode($id);
	$id = urlencode($id);
	return $id;
}


function decode($id) {
	$id = urldecode($id);
	$id = urldecode($id);
	$id = $this->encrypt->decode($id);
	return $id;
}


function script_tag($href) {
    $CI =& get_instance();
    if (strpos($href, '//') !== FALSE) {
    		$link = 'src="'.$href.'" ';
    	} else {
    	 	$link = 'src="'.$CI->config->slash_item('base_url').$href.'" ';
    }
            
	return '<script type="text/javascript" '.$link.'></script>'."\n";
}


