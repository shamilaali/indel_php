<?php if ( ! defined('BASEPATH')) exit('Access denied. Stop the script access');
class BBPS_Bill_pay_request_prepaid extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->config('secrets');
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

                    $inputParamsXml = '';
    
                    // Iterate through each parameter in the billerParamInfo array
                    foreach ($billerParamInfo as $param) {
                        // Check if the array contains both paramName and paramValue
                        if (isset($param['paramName']) && isset($param['paramValue'])) {
                            // Append the XML element for the parameter
                            $inputParamsXml .= '<input><paramName>' . htmlspecialchars($param['paramName'], ENT_XML1, 'UTF-8') . '</paramName><paramValue>' . htmlspecialchars($param['paramValue'], ENT_XML1, 'UTF-8') . '</paramValue></input>';
                        }
                    }
                    $plainText = '<?xml version="1.0" encoding="UTF-8"?><billPaymentRequest><agentId>' . htmlspecialchars($agentID, ENT_XML1, 'UTF-8') . '</agentId><billerAdhoc>true</billerAdhoc><agentDeviceInfo><ip>' . htmlspecialchars($ip, ENT_XML1, 'UTF-8') . '</ip><initChannel>AGT</initChannel><mac>' . htmlspecialchars($mac, ENT_XML1, 'UTF-8') . '</mac></agentDeviceInfo><customerInfo><customerMobile>' . htmlspecialchars($customerMobile, ENT_XML1, 'UTF-8') . '</customerMobile><customerEmail></customerEmail><customerAdhaar></customerAdhaar><customerPan></customerPan></customerInfo><billerId>' . htmlspecialchars($billerID, ENT_XML1, 'UTF-8') . '</billerId><inputParams>' . $inputParamsXml . '</inputParams>'.  htmlspecialchars($billFetchBillerResponse, ENT_XML1, 'UTF-8'). htmlspecialchars($additionalInfo, ENT_XML1, 'UTF-8').'<amountInfo><amount>'.$amount.'</amount><currency>356</currency><custConvFee>0</custConvFee><amountTags></amountTags></amountInfo><paymentMethod><paymentMode>Cash</paymentMode><quickPay>Y</quickPay><splitPay>N</splitPay></paymentMethod><paymentInfo><info><infoName>Remarks</infoName><infoValue>Received</infoValue></info></paymentInfo></billPaymentRequest>';
                    $key = $this->config->item('key');
                    $encrypt_xml_data = encrypt($plainText, $key);
                    $data['accessCode'] = $this->config->item('accessCode');
                    $data['requestId'] = generateRandomString();
                    $data['ver'] = "1.0";
                    $data['instituteId'] = $this->config->item('instituteId');
                    $data['encRequest'] = $encrypt_xml_data;

                    $parameters = http_build_query($data);
                    $url = $this->config->item('Bill_Payment_URL') . $parameters;
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