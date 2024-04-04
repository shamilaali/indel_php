<?php
#[\AllowDynamicProperties]
class Account
{
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function isUserType($userType = 'admin')
	{
		if ($this->ci->session->userdata('userType') == $userType)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	function isLoggedIn($redirect = TRUE)
	{
		if($this->ci->session->userdata('isLoggedIn') === TRUE)
		{
			return TRUE;
		}
		else
		{
			if ($redirect === TRUE)
			{
				redirect(base_url().'login');
			}
			else
			{

				return FALSE;
			}
		}
	}
}