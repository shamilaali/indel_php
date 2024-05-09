<?php
if (!defined('BASEPATH')) exit('Access denied. Stop the script access');


include 'IDFC_Authentication.php';

class IDFC_FundTransfer extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
        $hitTime = date("Y-m-d H:i:s");
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            date_default_timezone_set('Asia/Calcutta');
            
            $postdata = file_get_contents("php://input");
            $object = json_decode($postdata, true);
            $this->load->helper("source");
            $this->load->helper("main");
                
            if (json_last_error() === JSON_ERROR_NONE)
            {
                
                // $creditAccountNumber = $object["creditAccountNumber"] ?? "";
                
                // $beneficiaryIFSC = $object["beneficiaryIFSC"] ?? "";
                // $beneficiaryName = $object["beneficiaryName"] ?? "";
                // $beneficiaryAddress = $object["beneficiaryAddress"] ?? "";
                // $debitAccountNumber = $object["debitAccountNumber"] ?? "";
                $transactionID = $object["transactionID"] ?? "";
                $emailID = $object["emailID"] ?? "";
                $mobileNo = $object["mobileNo"] ?? "";
                $amount = $object["amount"] ?? "";
                $paymentDescription = $object["paymentDescription"] ?? "";
                $creditAccountNumber = "6819002100001617";
                $debitAccountNumber = "10019527465";
                $beneficiaryIFSC = "PUNB0681900";
                $beneficiaryName = "Indel";
                $beneficiaryAddress = "KALAMASSERY";

                if (!empty($transactionID) && !empty($creditAccountNumber))
                {
                    $json_data = array(
                        "initiateAuthGenericFundTransferAPIReq" => array(
                            "transactionID" => $transactionID,
                            "debitAccountNumber" => $debitAccountNumber,
                            // "debitAccountNumber" => "96271102170",
                            "creditAccountNumber" => $creditAccountNumber,
                            "remitterName" => "Indel Money Limited",
                            "amount" => strval($amount),
                            "currency" => "INR",
                            "transactionType" => "IMPS",
                            "paymentDescription" => $paymentDescription,
                            "beneficiaryIFSC" => $beneficiaryIFSC,
                            "beneficiaryName" => $beneficiaryName,
                            "beneficiaryAddress" => $beneficiaryAddress,
                            "emailID" => $emailID,
                            "mobileNo" => $mobileNo
                        )
                    );
                    if (is_array($json_data)) {
                        // Remove whitespaces and encode JSON data
                        $json_string = json_encode($json_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                        
                        if ($json_string === false) {
                            // JSON encoding failed
                            die("Error: JSON encoding failed");
                        }
                    } else {
                        // JSON data is not an array
                        die("Error: JSON data is not an array");
                    }
                    // $key = "77616d706c65496467134142536b659123616d706c65496468634145536b9637";
                    $key = "50616d706c62496466634145336b758073616d706c65496432426145536b0077";
                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

                    // Encrypt the data using AES-256-CBC cipher
                    $encryptedData = openssl_encrypt($json_string, 'aes-256-cbc', hex2bin($key), OPENSSL_RAW_DATA, $iv);

                    // Combine IV and encrypted data
                    $combinedData = $iv . $encryptedData;

                    // Base64 encode the combined data
                    $reqbody = base64_encode($combinedData);
                    
                    // Call the authentication method to get the token
     
                    $authObj = new IDFC_Authentication();                   
                    $token = $authObj->index();
                    $token = json_decode($token, true);
                    // print_r($token);
                    $access_token = $token['access_token'];

                    $uniqueId = uniqid();
                    $hashedId = md5($uniqueId);
                    $randomString = substr($hashedId, 0, 12);
                    
                    $headers = [
                        "Content-Type: application/octet-stream",
                        "Source: IML",
                        "correlationId: {$randomString}",
                        "Authorization: Bearer {$access_token}",
                    ];
                    // Make the API call using cURL
                    // $url = 'https://apiext.uat.idfcfirstbank.com/paymenttxns/v1/fundTransfer';
                    $url = 'https://apiext.payments.idfcfirstbank.com/paymenttxns/v1/fundTransfer';
                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $reqbody);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    

                    $response = curl_exec($ch);
                    if (curl_errno($ch)) {
                        echo 'Error: ' . curl_error($ch);
                    }
                    curl_close($ch);

                    $cipher = "AES-256-CBC";
                    $secretKeyHexbytes = hex2bin($key);
                    $ciphertext = base64_decode($response);
                    $ivlen = openssl_cipher_iv_length($cipher);
                    $iv = substr($ciphertext, 0, $ivlen);
                    $ciphertext = substr($ciphertext, $ivlen);
                    $decrypted = openssl_decrypt($ciphertext, $cipher, $secretKeyHexbytes, OPENSSL_RAW_DATA, $iv);
                    
                    // return json_encode($decrypted);
                    $output['code'] = '200';
                    $output['status'] = 'Success';
                    $output['message'] = 'Fund Transfer';
                    $output['details'] = array(
                                                    'url'=> $url,
                                                    'InputJson' => $json_string,
                                                    'header' => $headers,
                                                    'encRequest'=> $reqbody,
                                                    'encResponse' => $response,
                                                    'decResponse' => $decrypted
                                                );
                    
                }
                else
                {
                    $output['code'] = '400';
                    $output['status'] = 'Error';
                    $output['message'] = 'Required parameters not found';
                    $output['details'] = array();
                    
                }   
            }
            else
            {
                $output['code'] = '400';
                    $output['status'] = 'Error';
                    $output['message'] = 'Invalid Json';
                    $output['details'] = array();
            }
        }    
        else
        {
            $output['code'] = '400';
            $output['status'] = 'Error';
            $output['message'] = 'Only Post methods are allowed';
            $output['details'] = array();
        } 
        ignore_user_abort(true);
        header("Content-type: text/json; charset=utf-8");
        header('Connection: close');
        header("Access-Control-Allow-Origin:*");
        echo json_encode($output);
        flush();
    }
}
?>
