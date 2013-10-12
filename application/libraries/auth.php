<?php 

class Auth{
	public function cekBelumLogin(){
		$CI =& get_instance(); 
		if($CI->session->userdata('username_admin') == ''){
			redirect('admin/login_admin/');
		}
	}

	public function cekSudahLogin(){
		$CI =& get_instance(); 
		if($CI->session->userdata('username_admin') != ''){
			redirect('admin/login_admin/home/');
		}
	}

	public function cekBelumLoginCustomer(){
		$CI =& get_instance(); 
		if($CI->session->userdata('username') == ''){
			redirect('customer/login');
		}
	}

	public function cekSudahLoginCustomer(){
		$CI =& get_instance(); 
		if($CI->session->userdata('username') != ''){
			redirect('customer');
		}
	}
}