<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
       {
        parent::__construct();
        $this->auth->cekBelumLogin();
    }

	public function index()
	{
		$this->load->model('kategori_model','kategori');
		$this->load->library('pagination');
		$jumlah_data = $this->kategori->get_all()->num_rows();
		$config['base_url'] = base_url('index.php/admin/kategori/index/');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination'] = $this->pagination->create_links();
		$data['kategori']=$this->kategori->get_all_limit($config['per_page'],$page);
		
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('kategori/view_all',$data);
		$this->load->view('admin/footer');
	}
	
	public function input()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('kategori/input');
		$this->load->view('admin/footer');
	}
	
	public function edit($id)
	{
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->model('kategori_model','kategori');
		$data['rows']=$this->kategori->get_by_id($id);
		$this->load->view('kategori/edit',$data);
		$this->load->view('admin/footer');
	}
		public function view($id)
	{

		$this->load->model('kategori_model','kategori');
		$data['rows']=$this->kategori->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('kategori/view_detail',$data);
		$this->load->view('admin/footer');
	}
	
	public function insert_data()
	{
		$this->load->model('kategori_model','kategori');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/kategori/input/');			
		}else{
			$nama_kategori = $this->input->post('nama_kategori');
			$data = array('nama_kategori'=>$nama_kategori); 
			$simpan = $this->kategori->save_data($data);
			if($simpan){
				$this->session->set_flashdata('msg','Data Sukses DiMasukan');
				redirect('admin/kategori/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiMasukan');
				redirect('admin/kategori/input/');
			}
	  	}	
	}
	
	public function update_data($id)
	{
		$this->load->model('kategori_model','kategori');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/kategori/edit/'.$id);			
		}else{
			$nama_kategori = $this->input->post('nama_kategori');
			$data = array('nama_kategori'=>$nama_kategori); 
			$simpan = $this->kategori->change_data($id,$data);
			if($simpan){
				$this->session->set_flashdata('msg','Data Sukses Diubah');
				redirect('admin/kategori/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiMasukan');
				redirect('admin/kategori/edit/'.$id);		
			}	
		}
	}
	
	public function delete($id)
	{
		$this->load->model('kategori_model','kategori');
		$hapus = $this->kategori->delete_data($id);
		if($hapus){
			$this->session->set_flashdata('msg','Data Sukses Di Hapus');
			redirect('admin/kategori/');
		}else{
			$this->session->set_flashdata('msg','Data Gagal Di Hapus');
			redirect('admin/kategori/');
		}	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */