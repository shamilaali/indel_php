<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * Metadata
 *
 * Fetches page title and returns page metadata array.
 *
 * @access  public
 * @param   string page title
 * @return  array response
 */

if ( ! function_exists('curl_post_public'))
{
  
	function curl_bound_public($url, $headers, $method="POST",$rqstParm=''){

	        // print_r($headers);
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    if($method == "POST") 
	    {
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $rqstParm);
	    }
	    
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER,  true);
		// curl_setopt($ch, CURLOPT_ENCODING , '');
		// curl_setopt($ch, CURLOPT_MAXREDIRS , 10);
		// curl_setopt($ch, CURLOPT_TIMEOUT , 0);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION ,true);
		// curl_setopt($ch, CURLOPT_HTTP_VERSION ,CURL_HTTP_VERSION_1_1);
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		// curl_setopt($ch, CURLOPT_SSLVERSION , CURL_SSLVERSION_DEFAULT);
		// curl_setopt($ch, CURLOPT_SSL_VERIFYSTATUS , false);
		
		// curl_setopt($ch, CURLOPT_SSLKEY, '/usr/share/nginx/html/ssl_curl/www.krcoinpre.kr.om.pem');
		// curl_setopt($ch, CURLOPT_SSLCERT, '/usr/share/nginx/html/ssl_curl/krcoinnewssl.pem');
	    $curl_result = curl_exec($ch);
	    
	    
		if(curl_errno($ch)){
			$err = curl_errno($ch).": ".curl_error($ch);
			$curl_result = $err;
		}
		curl_close($ch);
	    return $curl_result;
	    
	}
}

if ( ! function_exists('unique_reference_id'))
{

     function unique_reference_id() 
    {
        date_default_timezone_set('Asia/Muscat');
        $string = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $string_shuffled = str_shuffle($string);
        $random_string = substr($string_shuffled, 1,3);
        $charset = hash('sha256', date("d/m/Y").microtime());
       
        $result = '';
        $count = strlen($charset);
        for ($i = 0; $i < 9; $i++) {
            $result .= $charset[mt_rand(0, $count - 1)];
        }
        $result = 'TRP'.$result.$random_string;
        return $result;
    }
}
// Encryption Function
function encrypt($plainText, $key) {
    $secretKey = hextobin(md5($key));
    $initVector = "\x00\x01\x02\x03\x04\x05\x06\x07\x08\x09\x0a\x0b\x0c\x0d\x0e\x0f";
    $encryptedText = openssl_encrypt($plainText, 'aes-128-cbc', $secretKey, OPENSSL_RAW_DATA, $initVector);
    if ($encryptedText === false) {
        return false;
    }
    return bin2hex($encryptedText);
}

// Decryption Function
function decrypt($encryptedText, $key) {
    $key = hextobin(md5($key));
    $initVector = "\x00\x01\x02\x03\x04\x05\x06\x07\x08\x09\x0a\x0b\x0c\x0d\x0e\x0f";
    $encryptedText = hextobin($encryptedText);
    $decryptedText = openssl_decrypt($encryptedText, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $initVector);
    return $decryptedText;
}

// Hexadecimal to Binary Function
function hextobin($hexString) {
    if (strlen($hexString) % 2 !== 0) {
        return false; // Hex string must have an even length
    }
    if (!ctype_xdigit($hexString)) {
        return false; // Invalid hex characters
    }
    return hex2bin($hexString);
}

//********** To generate ramdom String ********
function generateRandomString($length = 35) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if (!function_exists('log_api_call')) {
    function log_api_call($method, $url, $request, $response) {
        $log_message = "API Call\n";
        $log_message .= "Method: $method\n";
        $log_message .= "URL: $url\n";
        $log_message .= "Request: " . json_encode($request) . "\n";
        $log_message .= "Response: " . json_encode($response) . "\n";
        $log_message .= "=============================\n";

        log_message('debug', $log_message);
    }
}