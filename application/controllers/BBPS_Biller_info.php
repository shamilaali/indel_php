<?php if ( ! defined('BASEPATH')) exit('Access denied. Stop the script access');
class Biller_info extends CI_Controller 
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
                
                if (! empty($billerID))
                {
                            
                    /* * ************************************************************ */
                    /* * ************************************************************ */
                    /* * ************************************************************ */
                    if (isset($object["billerID"]) && is_array($object["billerID"])) {
                        // Initialize an empty string to hold multiple biller IDs in XML format
                        $billerIDsXml = '';
                        
                        // Iterate through each biller ID in the array
                        foreach ($object["billerID"] as $billerID) {
                            // Append each biller ID in the XML format
                            $billerIDsXml .= '<billerId>' . htmlspecialchars($billerID, ENT_XML1, 'UTF-8') . '</billerId>';
                        }
                        
                        // Create the plain text XML with all the biller IDs
                        $plainText = '<?xml version="1.0" encoding="UTF-8"?><billerInfoRequest>' . $billerIDsXml . '</billerInfoRequest>';
                    } 
                    else {
                        // If $billerID is not an array, handle as a single ID
                        if (isset($object["billerID"])) {
                            $billerID = htmlspecialchars($object["billerID"], ENT_XML1, 'UTF-8');
                            $plainText = '<?xml version="1.0" encoding="UTF-8"?><billerInfoRequest><billerId>' . $billerID . '</billerId></billerInfoRequest>';
                        } else {
                            // If $object["billerID"] is not set or is empty, set $plainText to null
                            $plainText = null;
                        }
                    }
                    
                    $key = $this->config->item('key');
                    $encrypt_xml_data = encrypt($plainText, $key);
                    $data['accessCode'] = $this->config->item('accessCode');
                    $data['requestId'] = generateRandomString();
                    $data['ver'] = "1.0";
                    $data['instituteId'] = $this->config->item('instituteId');

                    $parameters = http_build_query($data);
                    $url = $this->config->item('Biller_MDM_URL') . $parameters;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $encrypt_xml_data);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                    $result = curl_exec($ch);
                    $response = decrypt($result, $key); 
                    if(! empty($response))
                    {
                        $output['code'] = '200';
                        $output['status'] = 'Success';
                        $output['message'] = 'Biller Info fetched succesfully';
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