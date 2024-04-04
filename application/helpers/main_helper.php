<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------


if ( ! function_exists('extract_country_code_and_number_ind_mobile'))
{
    function extract_country_code_and_number_ind_mobile($userPhone = NULL) // indian number
    {
        if(! empty($userPhone))
        {
            $numberLength = strlen($userPhone);
            $validNumberFormat = 0;

            if($numberLength > 10 )
            {
                $phoneCode = substr($userPhone, 0, -10);
                $userPhone = substr($userPhone, -10);
                $phoneCodeArray = array('+91','+910','910','91','0');

                if (in_array($phoneCode, $phoneCodeArray, TRUE))
                {
                    return $userPhone;
                }
                else
                {
                    return FALSE;
                }
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }
}
if ( ! function_exists('unique_rand_str'))
{
     function unique_rand_str($length='',$type='') {
        date_default_timezone_set('Asia/Muscat');
        $string = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $string_shuffled = str_shuffle($string);
        $random_string = substr($string_shuffled, 1,3);
        $charset = hash('sha256', date("d/m/Y").microtime());
       
        $result = '';
        $count = strlen($charset);
        for ($i = 0; $i < $length; $i++) {
            $result .= $charset[mt_rand(0, $count - 1)];
        }
        $result = $type.$result.$random_string;
        return $result;
    }
}

if ( ! function_exists('checkTransaction'))
{
    function checkUsermobile($mobile='')
    {
        $ci=& get_instance();
        $ci->db->where('mobile',$mobile);
        $query = $ci->db->get('customers');
        return ($query->result_array())?$query->result_array(): FALSE;
    }
}

if ( ! function_exists('imageUpload'))
{
    function imageUpload($image=[],$type='')
    {
        $ci=& get_instance();
        $config['upload_path'] = './uploads/'.$type;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $ci->load->library('upload');
        $ci->upload->initialize($config);
        if($ci->upload->do_upload()){
            
            $ci->load->library('image_lib');
            $configer['image_library']  = 'gd2';
            $configer['source_image']   = $ci->upload->data('full_path');       
            $configer['create_thumb']   = TRUE;
            $configer['maintain_ratio'] = TRUE;
            $configer['width']          = 80;
            $configer['height']         = 80;
            $configer['new_image']      = './uploads/'.$type; 
            $ci->image_lib->initialize($configer);
            $ci->image_lib->resize();
            $result = array('status'=>1,'imagename'=>$ci->upload->data('file_name'));
        }else{
            $result = array('status'=>0,'imagename'=>'','error'=>$ci->upload->display_errors());
        }
        return $result;
    }
}
if ( ! function_exists('fileUpload'))
{
    function fileUpload($image=[],$type='',$name='')
    {
        $ci=& get_instance();
        $config['upload_path'] = './uploads/'.$type;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $ci->load->library('upload');
        $ci->upload->initialize($config);
        if($ci->upload->do_upload($name)){
            
            $ci->load->library('image_lib');
            $configer['image_library']  = 'gd2';
            $configer['source_image']   = $ci->upload->data('full_path');       
            $configer['create_thumb']   = TRUE;
            $configer['maintain_ratio'] = TRUE;
            $configer['width']          = 80;
            $configer['height']         = 80;
            $configer['new_image']      = './uploads/'.$type; 
            $ci->image_lib->initialize($configer);
            $ci->image_lib->resize();
            $result = array('status'=>1,'imagename'=>$ci->upload->data('file_name'));
        }else{
            $result = array('status'=>0,'imagename'=>'','error'=>$ci->upload->display_errors());
        }
        return $result;
    }
}
// if ( ! function_exists('unique_reference_id'))
// {
//      function unique_reference_id() {
//         date_default_timezone_set('Asia/Muscat');
//         $string = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
//         $string_shuffled = str_shuffle($string);
//         $random_string = substr($string_shuffled, 1,3);
//         $charset = hash('sha256', date("d/m/Y").microtime());
       
//         $result = '';
//         $count = strlen($charset);
//         for ($i = 0; $i < $length; $i++) {
//             $result .= $charset[mt_rand(0, $count - 1)];
//         }
//         $result = 'TRP'.$result.$random_string;
//         return $result;
//     }
// }
// ------------------------------------------------------------------------





























// ------------------------------------------------------------------------






// ------------------------------------------------------------------------
/* End of file status_helper.php */
/* Location: ./application/helpers/status_helper.php */