<?php

	function sanitise($data) {
        
		$data = str_replace(
				array("\xe2\x80\x98", "\xe2\x80\x99", "\xe2\x80\x9c", "\xe2\x80\x9d", "\xe2\x80\x93", "\xe2\x80\x94", "\xe2\x80\xa6"),
				array("'", "'", '"', '"', '-', '--', '...'),
				$data);
		$data = str_replace(
				array(chr(145), chr(146), chr(147), chr(148), chr(150), chr(151), chr(133)),
				array("'", "'", '"', '"', '-', '--', '...'),
				$data);
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlentities($data, ENT_QUOTES);
		$data = strip_tags($data);
        
		return $data;        
	}  		

	/*function encrypt($text, $salt) {
        
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
        
    }*/

	function randomstr($length = 15) {
        
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
        
	    for ($i = 0; $i < $length; $i++) {
            
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
        
	    return $randomString;
	}

?>