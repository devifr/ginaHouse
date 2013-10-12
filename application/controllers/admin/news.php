<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
       {
        parent::__construct();
        $this->auth->cekBelumLogin();
		$this->load->model('news_model','news');
    }

	public function index()
	{
		$this->load->library('pagination');
		$jumlah_data = $this->news->get_all()->num_rows();
		$config['base_url'] = base_url('index.php/admin/news/index/');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination'] = $this->pagination->create_links();
		$data['news']=$this->news->get_all_limit($config['per_page'],$page);
		
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('news/view_all',$data);
		$this->load->view('admin/footer');
	}
	
	public function input()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('news/input');
		$this->load->view('admin/footer');
	}
	
	public function edit($id)
	{
		$data['rows']=$this->news->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->model('news_model','news');
		$this->load->view('news/edit',$data);
		$this->load->view('admin/footer');
	}
		public function view($id)
	{

		$data['rows']=$this->news->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('news/view_detail',$data);
		$this->load->view('admin/footer');
	}
	
	public function insert_data()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul_news', 'Title News', 'required');
		$this->form_validation->set_rules('deskripsi', 'Description', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/news/input/');			
		}else{
			$judul_news = $this->input->post('judul_news');
			$deskripsi = $this->input->post('deskripsi');
			$status = $this->input->post('status');
			$date = date('Y-m-d');
			$data = array('judul_news'=>$judul_news,'description_news'=>$deskripsi,'date_news'=>$date,'status_news'=>$status); 
			$simpan = $this->news->save_data($data);
			if($simpan){
				$this->session->set_flashdata('msg','Data Sukses DiMasukan');
				redirect('admin/news/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiMasukan');
				redirect('admin/news/input/');
			}
	  	}	
	}
	
	public function update_data($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul_news', 'Title News', 'required');
		$this->form_validation->set_rules('deskripsi', 'Description', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/news/edit/'.$id);			
		}else{
			$judul_news = $this->input->post('judul_news');
			$deskripsi = $this->input->post('deskripsi');
			$status = $this->input->post('status');
			$date = date('Y-m-d');
			$data = array('judul_news'=>$judul_news,'description_news'=>$deskripsi,'date_news'=>$date,'status_news'=>$status); 
			$simpan = $this->news->change_data($id,$data);
			if($simpan){
				$this->session->set_flashdata('msg','Data Sukses Diubah');
				redirect('admin/news/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal Diubah');
				redirect('admin/news/edit/'.$id);		
			}	
		}
	}
	
	public function delete($id)
	{
		$hapus = $this->news->delete_data($id);
		if($hapus){
			$this->session->set_flashdata('msg','Data Sukses Di Hapus');
			redirect('admin/news/');
		}else{
			$this->session->set_flashdata('msg','Data Gagal Di Hapus');
			redirect('admin/news/');
		}	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */