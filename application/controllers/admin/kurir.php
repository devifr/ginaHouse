<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kurir extends CI_Controller {

	public function __construct()
       {
        parent::__construct();
        $this->auth->cekBelumLogin();
		$this->load->model('kurir_model','kurir');
    }

	public function index()
	{
		$this->load->library('pagination');
		$jumlah_data = $this->kurir->get_all()->num_rows();
		$config['base_url'] = base_url('index.php/admin/kurir/index/');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination'] = $this->pagination->create_links();
		$data['kurir']=$this->kurir->get_all_limit($config['per_page'],$page);
		
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('kurir/view_all',$data);
		$this->load->view('admin/footer');
	}
	
	public function input()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('kurir/input');
		$this->load->view('admin/footer');
	}
	
	public function edit($id)
	{
		$data['rows']=$this->kurir->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->model('kurir_model','kurir');
		$this->load->view('kurir/edit',$data);
		$this->load->view('admin/footer');
	}
		public function view($id)
	{

		$data['rows']=$this->kurir->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('kurir/view_detail',$data);
		$this->load->view('admin/footer');
	}
	
	public function insert_data()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('provinsi_kurir', 'Provinsi Kurir', 'required');
		$this->form_validation->set_rules('kota_kurir', 'Kota Kurir', 'required');
		$this->form_validation->set_rules('biaya_kurir', 'Biaya Kurir', 'required|numeric');
		$this->form_validation->set_rules('lama_kurir', 'Lama Pengiriman Kurir', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/kurir/input/');			
		}else{
			$provinsi_kurir = $this->input->post('provinsi_kurir');
			$kota_kurir = $this->input->post('kota_kurir');
			$biaya_kurir = $this->input->post('biaya_kurir');
			$lama_kurir = $this->input->post('lama_kurir');
			$data = array('provinsi_kurir'=>$provinsi_kurir,'kota_kurir'=>$kota_kurir,'biaya_kurir'=>$biaya_kurir,'lama_kurir'=>$lama_kurir); 
			$simpan = $this->kurir->save_data($data);
			if($simpan){
				$this->session->set_flashdata('msg','Data Sukses DiMasukan');
				redirect('admin/kurir/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiMasukan');
				redirect('admin/kurir/input/');
			}
	  	}	
	}
	
	public function update_data($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('provinsi_kurir', 'Provinsi Kurir', 'required');
		$this->form_validation->set_rules('kota_kurir', 'Kota Kurir', 'required');
		$this->form_validation->set_rules('biaya_kurir', 'Biaya Kurir', 'required|numeric');
		$this->form_validation->set_rules('lama_kurir', 'Lama Pengiriman Kurir', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/kurir/edit/'.$id);			
		}else{
			$provinsi_kurir = $this->input->post('provinsi_kurir');
			$kota_kurir = $this->input->post('kota_kurir');
			$biaya_kurir = $this->input->post('biaya_kurir');
			$lama_kurir = $this->input->post('lama_kurir');
			$data = array('provinsi_kurir'=>$provinsi_kurir,'kota_kurir'=>$kota_kurir,'biaya_kurir'=>$biaya_kurir,'lama_kurir'=>$lama_kurir); 
			$simpan = $this->kurir->change_data($id,$data);
			if($simpan){
				$this->session->set_flashdata('msg','Data Sukses Diubah');
				redirect('admin/kurir/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal Diubah');
				redirect('admin/kurir/edit/'.$id);		
			}	
		}
	}
	
	public function delete($id)
	{
		$hapus = $this->kurir->delete_data($id);
		if($hapus){
			$this->session->set_flashdata('msg','Data Sukses Di Hapus');
			redirect('admin/kurir/');
		}else{
			$this->session->set_flashdata('msg','Data Gagal Di Hapus');
			redirect('admin/kurir/');
		}	
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */