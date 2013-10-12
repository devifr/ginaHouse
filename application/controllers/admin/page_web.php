<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_web extends CI_Controller {

	public function __construct()
       {
        parent::__construct();
        $this->auth->cekBelumLogin();
		$this->load->model('page_web_model','page_web');
    }

	public function index()
	{
		$this->load->library('pagination');
		$jumlah_data = $this->page_web->get_all()->num_rows();
		$config['base_url'] = base_url('index.php/admin/page_web/index/');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination'] = $this->pagination->create_links();
		$data['page_web']=$this->page_web->get_all_limit($config['per_page'],$page);
		
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('page_web/view_all',$data);
		$this->load->view('admin/footer');
	}
	
	public function input()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('page_web/input');
		$this->load->view('admin/footer');
	}
	
	public function edit($id)
	{
		$data['rows']=$this->page_web->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->model('page_web_model','page_web');
		$this->load->view('page_web/edit',$data);
		$this->load->view('admin/footer');
	}
		public function view($id)
	{

		$data['rows']=$this->page_web->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('page_web/view_detail',$data);
		$this->load->view('admin/footer');
	}
	
	public function insert_data()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul_page', 'Title Page', 'required');
		$this->form_validation->set_rules('deskripsi', 'Description', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/page_web/input/');			
		}else{
			$judul_page = $this->input->post('judul_page');
			$deskripsi = $this->input->post('deskripsi');
			$status = $this->input->post('status');
			$data = array('judul_page'=>$judul_page,'deskripsi_page'=>$deskripsi,'status_page'=>$status); 
			$simpan = $this->page_web->save_data($data);
			if($simpan){
				$this->session->set_flashdata('msg','Data Sukses DiMasukan');
				redirect('admin/page_web/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiMasukan');
				redirect('admin/page_web/input/');
			}
	  	}	
	}
	
	public function update_data($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul_page', 'Title Page', 'required');
		$this->form_validation->set_rules('deskripsi', 'Description', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/page_web/edit/'.$id);			
		}else{
			$judul_page = $this->input->post('judul_page');
			$deskripsi = $this->input->post('deskripsi');
			$status = $this->input->post('status');
			$data = array('judul_page'=>$judul_page,'deskripsi_page'=>$deskripsi,'status_page'=>$status); 
			$simpan = $this->page_web->change_data($id,$data);
			if($simpan){
				$this->session->set_flashdata('msg','Data Sukses Diubah');
				redirect('admin/page_web/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal Diubah');
				redirect('admin/page_web/edit/'.$id);		
			}	
		}
	}
	
	public function delete($id)
	{
		$hapus = $this->page_web->delete_data($id);
		if($hapus){
			$this->session->set_flashdata('msg','Data Sukses Di Hapus');
			redirect('admin/page_web/');
		}else{
			$this->session->set_flashdata('msg','Data Gagal Di Hapus');
			redirect('admin/page_web/');
		}	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */