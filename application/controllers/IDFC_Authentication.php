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
            'kid' => '6cc1daa5-039f-44f3-bc5c-9c4741a0fa79'
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
            'sub' => 'a55cc9cf-ddb9-45b2-ad66-863a47fa659e',
            'iss' => 'a55cc9cf-ddb9-45b2-ad66-863a47fa659e',
            'aud' => 'https://app.uat-opt.idfcfirstbank.com/platform/oauth/oauth2/token',
            'exp' => intval($utcTime)
        ];

        // Private key
        $private_key = <<<EOD
        -----BEGIN RSA PRIVATE KEY-----
        MIIEogIBAAKCAQEAozKQxPxhQNYpCFqjq03/FFDduAa9avZM8cRKpYGWPQEai7zu
        Tc5BvHsXSfuQinmIPLfjFT21P6xm5zceaCO3PEIKAXkJejrI8y9LxlUoRAqo1kZi
        nfPEov31xMnKCauzx0Mqsu2fbVjHGDTXydjHjvSG7isU4gXe8FGcPdCMjxoLl39a
        402URvi4KWUr7zcofcAfxVxGn4+z1rv2q7URIqrtIRkX9786lBPtLFzpTUDmyTI2
        9LE1a/mtb9WcLSPuVPZr0TYeFRgDzw8uqJu+uhAS/cTzPUyjZSGLAQjQnE9bfkSb
        0hYIeFHsCCtRlToj3fx5DH5oaNXO7LfFxVhT7wIDAQABAoIBAHKJjqlyKB+FLw85
        7hzQhPIRP0tlD5P+gUo9ZdZ6+KKgH61rUCUzWVebXGEEOhG18jQLK0lBIfAqY55r
        RN/6ESQthTA7brdmgpqK2ze7lKMMiCq7A4OwDpYGf3M53J6k72wua81gkMABytnm
        XHzBtG1UmU6W1fU8AZfQ70NDFyNnGJvVjmmYbp3dZosRHXUFCPZ/nGaoNcQ8Se8N
        U/CvWYt1VZ60OLnAL6tcwzgYdO9MWEjo4xqiAwNXCnFdAzRli4caL+HHjc1GYRRQ
        ttpzAzheRuSTMlMxaQWeyt85Hp7MG6sulqhf7LdbtgYaA48t/jCHnGMZCNb5/2Cn
        8xSfNeECgYEA2vykyJ+AYXAxOZfIjbjzBE4KtRmHnY8NEpU9D4mPTrkjnfueAIeS
        TcdSbfzmcQhIdI0CIHfXfqrsYeD6x4ELzFtF9b/vQQo30WqdzMsGDhkOmOfoOyBu
        O4HSei4UXcWLOC5X6Aj0j4WtM6Jxi4Np0j8189Nb8mUTTHj7AEpMfVUCgYEAvsf3
        7GljOfj5j6n90IOX4gvRXNVY8ZJssGA+qHPPuTlsxBII/3M+IFGHYGQjbH5mwsCw
        hZqhwh91AfR3HMu/cCihy7C/mNMbPzkWVQCX/vml3pu9M4CQJp5oEGl++tITZu2k
        30r/Ycxqc2rHdMJZYiALqd/8hoibwlqVi7pN7DMCgYAJBZeUXF3hpcmhYct1a0U3
        zC9MvryDlT0ootVdKoGo8J+zBoa/5tX0Nl4DAgRMa9bwVk7cH5PVOB18+tPaHErs
        JGaBdWLZ/x3FlurhYQvi0M11Jzi+Ftvzv6l4NyXHpzfRHLeqa5QHxa4ZDnw3Dzbw
        3oHOhcqn9doRsHpGzMjR8QKBgFxfjldVn8nOF2fMMyzmyn+UoUaFto8hCqdLsor1
        qDpS56r34ItvTUFwuE+frNc3TKI3kkDeYjwP5yOPLq0uqf6wbcamSd7BOIwgJAP8
        SZwXXIywc6egNCu+vzxTGDxxwxsvLYlAUu8TfudraC/MemLciUkzPp4VPvWXzpjd
        GCWpAoGAAVaregaEWhsY2IOZdcC6sTbb/ZF7/zpm7dY9ElAG0JvyJ+5kuuSKFEQV
        JZqFEZqE6zGQU6ILNuDyQcPjGQe3h5gdKG/2MEg36De2s4oX63faY9blb5/oqiIt
        DXM5xREWFXUAlGL/mgBsqEUi9ocZJf9o2kh9z+aGdsqszmeQihE=
        -----END RSA PRIVATE KEY-----
        EOD;
        
        try {
            // Generate JWT token
            $jwt_token = JWT::encode($payload, $private_key, 'RS256', null, $header);
            
            $url = 'https://apiext.uat.idfcfirstbank.com/authorization/oauth2/token';

            // Data to be sent in the request
            $data = array(
                'grant_type' => 'client_credentials',
                'scope' => 'cmsapibridge-payments-executeTransaction paymenttxn-v1fundTransfer paymentenq-paymentTransactionStatus cmsapibridge-payments-enquirePaymentsDebitTransaction',
                'client_id' => 'a55cc9cf-ddb9-45b2-ad66-863a47fa659e',
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
