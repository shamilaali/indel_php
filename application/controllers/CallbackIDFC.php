<?php if ( ! defined('BASEPATH')) exit('Access denied. Stop the script access');
class CallbackIDFC extends CI_Controller 
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
                
                $OperationName = $object["OperationName"] ?? "";
                $TxnId = $object["TxnId"] ?? "";
                $TxnType = $object["TxnType"] ?? "";
                $OrgTxnId = $object["OrgTxnId"] ?? "";
                $OrgCustRefId = $object["OrgCustRefId"] ?? "";
                $OrgTxnRefId = $object["OrgTxnRefId"] ?? "";
                $OrgTxnTimeStamp = $object["OrgTxnTimeStamp"] ?? "";
                $PayerMobileNumber = $object["PayerMobileNumber"] ?? "";
                $PayeeMobileNumber = $object["PayeeMobileNumber"] ?? "";
                $PayerVirAddr = $object["PayerVirAddr"] ?? "";
                $PayeeVirAddr = $object["PayeeVirAddr"] ?? "";
                $statusUpdateRetryCount = $object["statusUpdateRetryCount"] ?? "";
                $Amount = $object["Amount"] ?? "";
                $Remarks = $object["Remarks"] ?? "";
                $ResCode = $object["ResCode"] ?? "";
                $ResDesc = $object["ResDesc"] ?? "";
                $TimeStamp = $object["TimeStamp"] ?? "";
                $MerchantID = $object["MerchantID"] ?? "";
                $SubMerchantID = $object["SubMerchantID"] ?? "";
                $TerminalID = $object["TerminalID"] ?? "";
                $MerchantCredential = $object["MerchantCredential"] ?? "";
                $HMAC = $object["HMAC"] ?? "";

                if (! empty($PayerMobileNumber))
                {
                    $url = "http://65.0.3.90:8000/v1/callbacks/IDFC_callback";
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                    $result = curl_exec($ch);
                    if(! empty($result))
                    {
                        $output = $result;
                    }
                    else
                    {
                        $output['code'] = '400';
                        $output['status'] = 'FAILURE';
                        $output['message'] = 'Something went wrong';
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
            else
            {
                $output['code'] = '400';
                $output['status'] = 'FAILURE';
                $output['message'] = 'Something went wrong';
            }
        }    
        else
        {
            $output['code'] = '405';
            $output['status'] = 'FAILURE';
            $output['message'] = 'Only POST Methods are allowed';
            $error = 'Only POST Methods are allowed';
                
        } 
        $method = $this->input->method();
        $url = current_url();
        $request = $this->input->post(); // Adjust based on your request handling
        $response = $output; // Adjust based on your response handling

        $this->load->helper('source_helper');
        log_api_call($method, $url, $request, $response);
        ignore_user_abort(true);
        header("Content-type: text/json; charset=utf-8");
        header('Connection: close');
        header("Access-Control-Allow-Origin:*");
        echo $output;
        flush();
	}
}