<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_admin extends CI_Controller {


	public function index()
	{
		$this->auth->cekSudahLogin();
		$this->load->view('admin/login');
	}

	public function home()
	{
		$this->auth->cekBelumLogin();
		$this->load->model('costumer_model','costumer');
		$this->load->model('pembelian_model','pembelian');
		$date_join_costumer = $this->costumer->get_all_date();
		if($date_join_costumer->num_rows()>0){
		 $i = 1;
         foreach ($date_join_costumer->result() as $key => $date_join) {
			$data['date_join'][$key] = $date_join->date_join_costumer;
			$data['konsumen'][$key] = $this->costumer->get_all_by_date($date_join->date_join_costumer)->num_rows();
			$i += 1;
		 }
		 $data['jml_data'] = $i;	
		}
		$date_order = $this->pembelian->get_all_date();
		if($date_order->num_rows()>0){
		 $j = 1;
         foreach ($date_order->result() as $key => $date) {
			$data['date_order'][$key] = $date->date_order;
			$data['order'][$key] = $this->pembelian->get_all_by_date($date->date_order)->num_rows();
			$j += 1;
		 }
		 $data['jml_data_order'] = $j;	
		}
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('admin/home',$data);
		$this->load->view('admin/footer');
	}
	
	public function edit($id)
	{
		$this->load->model('admin_model','admin');
		$data['rows']=$this->admin->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('admin/edit',$data);
		$this->load->view('admin/footer');
	}
	public function doLogin()
	{
		$this->load->model('admin_model','admin');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username','required');
		$this->form_validation->set_rules('password', 'Password','required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/login_admin/');			
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password = md5($password);
			$simpan = $this->admin->cek_login($username,$password);
			if($simpan->num_rows()>0){
				$admin = $simpan->row();
				$newdata = array(
                   'username_admin'  => $admin->username_admin,
                   'email_admin'     => $admin->email_admin,
                   'nama_admin' => $admin->nama_admin);

			$this->session->set_userdata($newdata);
				$this->session->set_flashdata('msg','Login Berhasil');
				redirect('admin/login_admin/home/');
			}else{
				$this->session->set_flashdata('msg','Login Gagal');
				redirect('admin/login_admin/');
			}	
		}
	}

	
	public function update_data($id)
	{
		$this->load->model('admin_model','admin');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username_admin', 'Username Admin','required');
		$this->form_validation->set_rules('nama_admin', 'Nama Admin','required');
		$this->form_validation->set_rules('email_admin', 'Email Admin','required|valid_email');
		$this->form_validation->set_rules('password_admin', 'Password Admin','required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/login_admin/edit/'.$id);			
		}else{
		$nama_admin = $this->input->post('nama_admin');
		$email_admin = $this->input->post('email_admin');
		$username_admin = $this->input->post('username_admin');
		$password_admin = $this->input->post('password_admin');
		$password_admin = md5($password_admin);
		$data = array('nama_admin'=>$nama_admin,'email_admin'=>$email_admin, 'username_admin'=>$username_admin,'password_admin'=>$password_admin);
		$simpan = $this->admin->change_data($id,$data);
		if($simpan){
			$this->session->set_flashdata('msg','Data Sukses Diedit');
				redirect('admin/login_admin/edit/'.$id);
			}else{
				$this->session->set_flashdata('msg','Data Gagal Diedit');
				redirect('admin/login_admin/edit/'.$id);
			}		
		}
	}
	public function doLogout()
	{
		$this->session->sess_destroy();
		redirect('admin/login_admin/');
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */