<?php
require __DIR__ . '/../../vendor/autoload.php';
use Firebase\JWT\JWT;
class IDFC_Authentication 
{
    public function index()
	{ 
        $header = [
            'alg' => 'RS256',
            'typ' => 'JWT',
            'kid' => '80698342-2a62-4eaf-8560-fa27fad9a698'
        ];
        
        $currentTimestamp = time();

        $next30MinutesTimestamp = $currentTimestamp + 1800;

        $utcTime = date('U', $next30MinutesTimestamp);
        
        
        $uniqueId = uniqid();
        $hashedId = md5($uniqueId);
        $randomString = substr($hashedId, 0, 12);
        
        // Payload
        $payload = [
            'jti' => $randomString,
            'sub' => 'ee75143d-d3b5-441a-b747-7f8cce15af82',
            'iss' => 'ee75143d-d3b5-441a-b747-7f8cce15af82',
            // 'aud' => 'https://app.uat-opt.idfcfirstbank.com/platform/oauth/oauth2/token',
            'aud' => 'https://app.my.idfcfirstbank.com/platform/oauth/oauth2/token',
            'exp' => intval($utcTime)
        ];
        
        $private_key = <<<EOD
-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAxID3b2Z5SLQkxiNIB6DCxk4vIZ1l8qUq6KO3iE/eOF9Deh2J
uGSvpwfzKadN160J/+x1aLaPO5aU6MNPuUY6NBC5XuP/pTJeFt/yv7vuXGg7pHfJ
bbZ4B/J/lG/44De468DKAuiCz93fH5nvgbiwN/ZXLgB6yt56K6wAYZRjURP3e7WS
kBjNzx7t0FXTTQ3zn1ZpJ6rLfl7TOfQlIF2Msoapjp6PfIbhdzZGKcyiE+Ph6J4t
DuaTWSnl9+0+1bS99wUaN+A94g8RSmhrjTMkREpCd9+1i7sVhJSqxvz/DT7gHXQo
Q6x8smzUsj0b1jKzVqVwU7zIrchRpt880YrR2QIDAQABAoIBAF48Tu0wondYVM5k
exWVZfL96aJgPlTYGrTIVqrbSoGUReLZKYOxXX9n05glMLJ+vG3sMv4NlrEH7M+X
YrNCV4VCg/Naue26Mt8bdOm4MX5FSlz8STABMpz1EXPZIuw8LMV6hiZQ5PLUvz0D
cJWwQWoFDBf2iOyjNsmcye4B4IMvjS9yIBLn3kQEnz1AaBH9AYXKjBQ4/900PF/o
5y6UztOkmVSh5QLwGsXXWIE4Tx5gNXQIpM0sbefwlV5oYDQYENkSDBgKvnxhvdxa
4w4IanU/48/PiEgCZnBPrmoO/sEmqlzC7sslHvpsVXXl24iPWBYWHWU7S+iT4VVx
gANwXRECgYEA9KXAHnH/kcDblihaIm0YsIBs4Q9arZRq4d7Bcy3+i0cMNiB9hXAW
fmUPfIdTe2fOCsn/J2JM3D/ejRvLqq5CLBNUhx0vxJVKA05dhb2GafQIHB/+/LM2
7Mr9uFwQuvJ35Y6RZASUaREpLMb4mKaytENuuovzJnv7zPNi8g3Tvd0CgYEAzZ9N
D4fNGUJ97gUvYO7ndbaPyYtwSDgZOCVvvmOPE3db4bMxDDmJ8PisApL7eUsBpj7e
KHbnixg7P9h52lz10w0RpkT/YbGTHRGlZS49AqnF3AcQqBpIysuS1fW/sjyRoXX9
wXfgPUXMNJZTTQYU+C467OnWce80TIUhuGKSGi0CgYABm+Fykc9bdwg6qZNGLK9/
4ahVppMzFwnI6H0fM8s7wUDcTkRlD0KmnCWI7R7obdtWCNQLv0LAJA9joC4rti+r
OIlSxiddRJoTAX3t9jwfEELJZJB5uvf+gKtAfiKCCDwvn0tne/w54KoDqF9UKax9
MQBWa7syopgaVfNtohelZQKBgHJFVmkMGlIwXpWZchQXkLAdTdk+0Z6A9pr6Sxhu
ccPqsDhFAjv9+gfd2pHvpytoILmH9KReOB1X0Q2RO168DK1GdQmHDLn5Gn2sIdOS
F7vUJ644iuww90UkTyzyzp66BGDLlsMe4JKMqIiNBiwm9h5aasrgxRk6S0E/N1cm
CHXdAoGAIC1CEKiuxlu4e7eJbGW5grUpHO8mDaMMdR0JihBBUXEw8gT7Jpe6Yp6a
wbY7zJ9RwfHMjWP7I9tYVZyuUCTHRp2nEIoJFdW8AIClzc/CQEyrPN9I5LLpT/pO
izAfh3vZGwOwD8WUnAVdYct321PYkyGUNvNFaM16hYnSyQUf9ds=
-----END RSA PRIVATE KEY-----
EOD;

       
        
        try {
            // Generate JWT token
            $jwt_token = JWT::encode($payload, $private_key, 'RS256', null, $header);
            
            // $url = 'https://apiext.uat.idfcfirstbank.com/authorization/oauth2/token';
            $url = 'https://apiext.idfcfirstbank.com/authorization/oauth2/token';
            
            $data = array(
                'grant_type' => 'client_credentials',
                'scope' => 'paymenttxn-v1fundTransfer paymentenq-paymentTransactionStatus',
                'client_id' => 'ee75143d-d3b5-441a-b747-7f8cce15af82',
                'client_assertion_type' => 'urn:ietf:params:oauth:client-assertion-type:jwt-bearer',
                'client_assertion' => $jwt_token
            );
           
            // Initialize cURL session
            $ch = curl_init($url);

            // Set the cURL options for the request
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
            curl_setopt($ch, CURLOPT_POST, true); // Set the request type to POST
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Set the POST data

            // Execute the cURL request
            $response = curl_exec($ch);
            // print_r($response);
            // Check for errors
            if(curl_errno($ch)) {
                echo 'Error: ' . curl_error($ch);
            }

            // Close cURL session
            curl_close($ch);

            return $response;

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return FALSE;
        }
    }
}
    
?>
