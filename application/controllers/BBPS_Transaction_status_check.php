<?php if ( ! defined('BASEPATH')) exit('Access denied. Stop the script access');
class Transaction_status_check extends CI_Controller 
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
                // $billerID = $object["billerID"];
                $trackType = $object["trackType"];
                $trackValue = $object["trackValue"];
                $fromDate = $object["fromDate"];
                $toDate = $object["toDate"];
                if (! empty($trackType) && ! empty($trackValue))
                {
                    
                    if($trackType != "MOBILE_NO")
                    {
                        $plainText = '<?xml version="1.0" encoding="UTF-8"?><transactionStatusReq><trackType>'.$trackType.'</trackType><trackValue>'.$trackValue.'</trackValue></transactionStatusReq>';
                    
                    }
                    else{
                        $plainText = '<?xml version="1.0" encoding="UTF-8"?><transactionStatusReq><trackType>'.$trackType.'</trackType><trackValue>'.$trackValue.'</trackValue><fromDate>'.$fromDate.'</fromDate><toDate>'.$toDate.'</toDate></transactionStatusReq>';
                    
                    }
                    $key = "43A55AF88A1BF58F73E36C791784FADC";
                    $encrypt_xml_data = encrypt($plainText, $key);
                    $data['accessCode'] = "AVMT56UX61KE89CKUW";
                    $data['requestId'] = generateRandomString();
                    $data['ver'] = "1.0";
                    $data['instituteId'] = "IM66";
                    $data['encRequest'] = $encrypt_xml_data;

                    $parameters = http_build_query($data);
                    $url = "https://stgapi.billavenue.com/billpay/transactionStatus/fetchInfo/xml?" . $parameters;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    // curl_setopt($ch, CURLOPT_POSTFIELDS, $encrypt_xml_data);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                    $result = curl_exec($ch);
                    // echo 'Encrypted Response: ' . $result . "<br><br>";
                    $response = decrypt($result, $key);
                    // echo "<pre>";
                    // echo htmlentities($response);
                    // exit;      
                    if(! empty($response))
                    {
                        $output['code'] = '200';
                        $output['status'] = 'Success';
                        $output['message'] = 'Transaction Status Fetched Succesfully';
                        $output['details'] = array(
                                                    'url'=> $url,
                                                    'parameters'=> $data,
                                                    'InputXML' => $plainText,
                                                    'encRequest'=> $encrypt_xml_data,
                                                    'encResponse' => $result,
                                                    'decResponse' => htmlentities($response)
                                                );
                    }
                    else
                    {
                        $output['code'] = '400';
                        $output['status'] = 'FAILURE';
                        $error = 'Transaction details not found';
                        $output['message'] = 'Transaction details not found';
                        $output['details'] = array(
                            'url'=> $url,
                            'InputXML' => $plainText,
                            'encRequest'=> $encrypt_xml_data,
                            'encResponse' => $result,
                            'decResponse' => ""
                        );
                    }
                        
                }
                else
                {
                    $output['code'] = '400';
                    $output['status'] = 'FAILURE';
                    $output['message'] = 'Required parameters not found';
                    $error = 'Required parameters not found';
                        
                }   
            }
        }    
        else
        {
            $output['code'] = '405';
            $output['status'] = 'FAILURE';
            $output['message'] = 'Only POST Methods are allowed';
            $error = 'Only POST Methods are allowed';
                
        } 

        ignore_user_abort(true);
        header("Content-type: text/json; charset=utf-8");
        header('Connection: close');
        header("Access-Control-Allow-Origin:*");
        echo json_encode($output);
        flush();
	}
}