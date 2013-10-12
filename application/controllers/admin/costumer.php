<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Costumer extends CI_Controller {

	public function __construct()
       {
        parent::__construct();
        $this->auth->cekBelumLogin();
    }

	public function index()
	{
		$this->load->model('costumer_model','costumer');
		$this->load->library('pagination');
		$jumlah_data = $this->costumer->get_all()->num_rows();
		$config['base_url'] = base_url('index.php/admin/costumer/index/');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination'] = $this->pagination->create_links();
		$data['costumer']=$this->costumer->get_all_limit($config['per_page'],$page);

		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('costumer/view_all',$data);
		$this->load->view('admin/footer');
	}
	
	public function input()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('costumer/input');
		$this->load->view('admin/footer');
	}
	
	public function edit($id)
	{
		$this->load->model('costumer_model','costumer');
		$data['rows']=$this->costumer->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('costumer/edit',$data);
		$this->load->view('admin/footer');
	}

	public function view($id)
	{
		$this->load->model('costumer_model','costumer');
		$data['rows']=$this->costumer->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('costumer/view_detail',$data);
		$this->load->view('admin/footer');
	}
	
	public function insert_data()
	{
		$this->load->model('costumer_model','costumer');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_costumer', 'Nama Costumer','required');
		$this->form_validation->set_rules('alamat_costumer', 'Alamat Costumer','required');
		$this->form_validation->set_rules('kota_costumer', 'Alamat Costumer','required');
		$this->form_validation->set_rules('email_costumer', 'Email Costumer','required|valid_email');
		$this->form_validation->set_rules('user_name', 'User Name','required');
		$this->form_validation->set_rules('password', 'Password','required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/costumer/input/');			
		}else{
		$nama_costumer = $this->input->post('nama_costumer');
		$alamat_costumer = $this->input->post('alamat_costumer');
		$kota_costumer = $this->input->post('kota_costumer');
		$provinsi_costumer = $this->input->post('provinsi_costumer');
		$kdpos_costumer = $this->input->post('kdpos_costumer');
		$email_costumer = $this->input->post('email_costumer');
		$user_name = $this->input->post('user_name');
		$password = $this->input->post('password');
		$password = md5($password);
		$date_join = date('Y-m-d');
		$alamat = $alamat_costumer.'|'.$provinsi_costumer.'|'.$kota_costumer.'|'.$kdpos_costumer;
		$data = array('nama_costumer'=>$nama_costumer,'alamat_costumer'=>$alamat,'email_costumer'=>$email_costumer, 'user_name'=>$user_name,'password'=>$password,'date_join_costumer'=>$date_join);
		$simpan = $this->costumer->save_data($data);
		if($simpan){
			$this->session->set_flashdata('msg','Data Sukses DiMasukan');
				redirect('admin/costumer/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiMasukan');
				redirect('admin/costumer/input/');
			}	
		}
	}
	
	public function update_data($id)
	{
		$this->load->model('costumer_model','costumer');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_costumer', 'Nama Costumer','required');
		$this->form_validation->set_rules('alamat_costumer', 'Alamat Costumer','required');
		$this->form_validation->set_rules('email_costumer', 'Email Costumer','required|valid_email');
		$this->form_validation->set_rules('user_name', 'User Name','required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/costumer/edit/'.$id);			
		}else{
		$nama_costumer = $this->input->post('nama_costumer');
		$alamat_costumer = $this->input->post('alamat_costumer');
		$kota_costumer = $this->input->post('kota_costumer');
		$provinsi_costumer = $this->input->post('provinsi_costumer');
		$kdpos_costumer = $this->input->post('kdpos_costumer');
		$email_costumer = $this->input->post('email_costumer');
		$user_name = $this->input->post('user_name');
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		if($password==''){
			$password = $password2;
		}
		$password = md5($password);
		$alamat = $alamat_costumer.'|'.$provinsi_costumer.'|'.$kota_costumer.'|'.$kdpos_costumer;
		$data = array('nama_costumer'=>$nama_costumer,'alamat_costumer'=>$alamat,'email_costumer'=>$email_costumer, 'user_name'=>$user_name,'password'=>$password);
		$simpan = $this->costumer->change_data($id,$data);
		if($simpan){
			$this->session->set_flashdata('msg','Data Sukses Diedit');
				redirect('admin/costumer/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal Diedit');
				redirect('admin/costumer/edit/'.$id);
			}		
		}
	}
	public function delete($id)
	{
		$this->load->model('costumer_model','costumer');
		$hapus = $this->costumer->delete_data($id);
		if($hapus){
			$this->session->set_flashdata('msg','Data Sukses Dihapus');
				redirect('admin/costumer/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal Dihapus');
				redirect('admin/costumer/hapus/'.$id);
		}	
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */