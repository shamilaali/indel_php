<?php if ( ! defined('BASEPATH')) exit('Access denied. Stop the script access');
class Bill_pay_request extends CI_Controller 
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
                $billFetchRequestID =  $object["billFetchRequestID"];

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
                    $plainText = '<?xml version="1.0" encoding="UTF-8"?><billPaymentRequest><agentId>CC01CC01513515340681</agentId><billerAdhoc>true</billerAdhoc><agentDeviceInfo><ip>192.168.2.73</ip><initChannel>AGT</initChannel><mac>01-23-45-67-89-ab</mac></agentDeviceInfo><customerInfo><customerMobile>9898990084</customerMobile><customerEmail></customerEmail><customerAdhaar></customerAdhaar><customerPan></customerPan></customerInfo><billerId>OTME00005XXZ43</billerId><inputParams><input><paramName>a</paramName><paramValue>10</paramValue></input><input><paramName>a b</paramName><paramValue>20</paramValue></input><input><paramName>a b c</paramName><paramValue>30</paramValue></input><input><paramName>a b c d</paramName><paramValue>40</paramValue></input><input><paramName>a b c d e</paramName><paramValue>50</paramValue></input></inputParams><billerResponse><billAmount>100000</billAmount><billDate>2015-06-14</billDate><billNumber>12303</billNumber><billPeriod>june</billPeriod><customerName>BBPS</customerName><dueDate>2015-06-20</dueDate><amountOptions><option><amountName>Late Payment Fee</amountName><amountValue>40</amountValue></option><option><amountName>Fixed Charges</amountName><amountValue>50</amountValue></option><option><amountName>Additional Charges</amountName><amountValue>60</amountValue></option></amountOptions></billerResponse><additionalInfo><info><infoName>a</infoName><infoValue>10</infoValue></info><info><infoName>a b</infoName><infoValue>20</infoValue></info><info><infoName>a b c</infoName><infoValue>30</infoValue></info><info><infoName>a b c d</infoName><infoValue>40</infoValue></info></additionalInfo><amountInfo><amount>100000</amount><currency>356</currency><custConvFee>0</custConvFee><amountTags></amountTags></amountInfo><paymentMethod><paymentMode>Cash</paymentMode><quickPay>N</quickPay><splitPay>N</splitPay></paymentMethod><paymentInfo><info><infoName>Remarks</infoName><infoValue>Received</infoValue></info></paymentInfo></billPaymentRequest>';
                    $key = "43A55AF88A1BF58F73E36C791784FADC";
                    $encrypt_xml_data = encrypt($plainText, $key);
                    $data['accessCode'] = "AVMT56UX61KE89CKUW";
                    // $data['requestId'] = generateRandomString();
                    $data['requestId'] = $billFetchRequestID;
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
                        $output['message'] = 'Bill validated succesfully';
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
                        $error = 'Biller info not found';
                        $output['message'] = 'Biller info not found';
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