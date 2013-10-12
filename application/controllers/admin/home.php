<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function search()
	{

		$this->load->model('product_model','product');
		$this->load->model('kategori_model','kategori');
		$this->load->model('costumer_model','costumer');
		// $this->load->model('news_model','news');
		$search = $this->input->post('search');
		$pilihan = $this->input->post('pilihan');
		if($pilihan == 0){
			$data['list_product'] = $this->product->get_by_name($search);
			$data['list_kategori'] = $this->kategori->get_by_name($search);
			$data['list_customer'] = $this->costumer->get_by_name($search);
		}else if($pilihan == 1){
			$data['list_product'] = $this->product->get_by_name($search);
		}
		$data['kata']= $search;
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('home/search',$data);
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