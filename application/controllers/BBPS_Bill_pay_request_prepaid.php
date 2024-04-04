<?php if ( ! defined('BASEPATH')) exit('Access denied. Stop the script access');
class Bill_pay_request_prepaid extends CI_Controller 
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
                $billerID = $object["billerID"];
                $agentID = $object["agentID"];
                $ip = $object["ip"];
                $mac = $object["mac"];
                $customerMobile = $object["customerMobile"];
                $billerParamInfo = $object["billerParamInfo"];
                $amount = $object["amount"];

                if (! empty($billerID))
                {
                            
                    /* * ************************************************************ */
                    // $plainText = '<?xml version="1.0" encoding="UTF-8"<billPaymentRequest><agentId>'.$agentID.'</agentId><billerAdhoc>true</billerAdhoc><agentDeviceInfo><ip>'.$ip.'</ip><initChannel>AGT</initChannel><mac>'.$mac.'</mac></agentDeviceInfo><customerInfo><customerMobile>'.$customerMobile.'</customerMobile><customerEmail></customerEmail><customerAdhaar></customerAdhaar><customerPan></customerPan></customerInfo><billerId>'.$billerID.'</billerId><inputParams>';
                    // if(!empty($billerParamInfo))
                    // {
                    //     foreach($billerParamInfo as $params)
                    //     {
                    //         $input = '<input><paramName>'.$params['paramName'].'</paramName><paramValue>'.$params['paramValue'].'</paramValue></input>';
                    //         $plainText = $plainText . $input;     
                    //     }
                    //     $plainText = $plainText.'</inputParams>';
                    // }   
                    // else{
                    //     $plainText = $plainText.'</inputParams>';
                    // }  

                    // $plainText = $plainText.'<amountInfo><amount>'.$amount.'</amount><currency>356</currency><custConvFee>0</custConvFee><amountTags></amountTags></amountInfo><paymentMethod><paymentMode>Cash</paymentMode><quickPay>Y</quickPay><splitPay>N</splitPay></paymentMethod><paymentInfo><info><infoName>Remarks</infoName><infoValue>Received</infoValue></info></paymentInfo>';
                    // $plainText = $plainText.'</billPaymentRequest>';  
                   $plainText = '<?xml version="1.0" encoding="UTF-8"?><billPaymentRequest><agentId>CC01CC01513515340681</agentId><billerAdhoc>true</billerAdhoc><agentDeviceInfo><ip>198.136.54.132</ip><initChannel>AGT</initChannel><mac>ed:37:8d:10:5a:f8</mac></agentDeviceInfo><customerInfo><customerMobile>9876543210</customerMobile><customerEmail></customerEmail><customerAdhaar></customerAdhaar><customerPan></customerPan></customerInfo><billerId>BILAVAIRTEL001</billerId><inputParams><input><paramName>Location</paramName><paramValue>Mumbai</paramValue></input><input><paramName>Mobile Number</paramName><paramValue>9898981000</paramValue></input></inputParams><amountInfo><amount>100000</amount><currency>356</currency><custConvFee>0</custConvFee><amountTags></amountTags></amountInfo><paymentMethod><paymentMode>Cash</paymentMode><quickPay>Y</quickPay><splitPay>N</splitPay></paymentMethod><paymentInfo><info><infoName>Remarks</infoName><infoValue>Received</infoValue></info></paymentInfo></billPaymentRequest>';
                    $key = "43A55AF88A1BF58F73E36C791784FADC";
                    $encrypt_xml_data = encrypt($plainText, $key);
                    $data['accessCode'] = "AVMT56UX61KE89CKUW";
                    $data['requestId'] = generateRandomString();
                    $data['ver'] = "1.0";
                    $data['instituteId'] = "IM66";
                    $data['encRequest'] = $encrypt_xml_data;

                    $parameters = http_build_query($data);
                    $url = "https://stgapi.billavenue.com/billpay/extBillPayCntrl/billPayRequest/xml?" . $parameters;
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
                        $output['message'] = 'Succesfull Prepaid bill payment';
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
                        $error = 'Biller Payment failed';
                        $output['message'] = 'Biller Payment failed';
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