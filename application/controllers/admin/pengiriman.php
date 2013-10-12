<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	public function __construct()
       {
        parent::__construct();
        $this->auth->cekBelumLogin();
    }

	public function index()
	{
		$this->load->model('pengiriman_model','pengiriman');
		$this->load->library('pagination');
		$jumlah_data = $this->pengiriman->get_all()->num_rows();
		$config['base_url'] = base_url('index.php/admin/pengiriman/index/');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination'] = $this->pagination->create_links();
		$data['pengiriman']=$this->pengiriman->get_all_limit($config['per_page'],$page);
		

		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('pengiriman/view_all',$data);
		$this->load->view('admin/footer');
	}
	
	public function input()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('pengiriman/input');
		$this->load->view('admin/footer');
	}
	
	public function edit($id)
	{
		$this->load->model('pengiriman_model','pengiriman');
		$data['rows']=$this->pengiriman->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('pengiriman/edit',$data);
		$this->load->view('admin/footer');
	}
	public function view($id)
	{
		$this->load->model('pengiriman_model','pengiriman');
		$data['rows']=$this->pengiriman->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('pengiriman/view_detail',$data);
		$this->load->view('admin/footer');
	}
	
	public function insert_data()
	{
		$this->load->model('pengiriman_model','pengiriman');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_transaksi', 'No Transaksi','required');
		$this->form_validation->set_rules('costumer_id', 'Costumer Id','required');
		$this->form_validation->set_rules('alamat Pengiriman', 'Alamat Pengiriman');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/pengiriman/edit/'.$id);			
		}else{
		$no_transaksi = $this->input->post('no_transaksi');
		$costumer_id = $this->input->post('costumer_id');
		$alamat_pengiriman = $this->input->post('alamat_pengiriman');
		$data = array('no_transaksi'=>$no_transaksi,'costumer_id'=>$costumer_id,'alamat_pengiriman'=>$alamat_pengiriman);
		$simpan = $this->pengiriman->save_data($data);
		if($simpan){
			$this->session->set_flashdata('msg','Data Sukses DiMasukan');
				redirect('admin/pengiriman/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiMasukan');
				redirect('admin/pengiriman/edit/'.$id);
			}
		}	
	}
	
	public function update_data($id)
	{
		$this->load->model('pengiriman_model','pengiriman');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_transaksi', 'No Transaksi','required');
		$this->form_validation->set_rules('costumer_id', 'Costumer Id','required');
		$this->form_validation->set_rules('alamat_pengiriman', 'Alamat Pengiriman');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/pengiriman/edit/'.$id);			
		}else{
		$no_transaksi = $this->input->post('no_transaksi');
		$costumer_id = $this->input->post('costumer_id');
		$alamat_pengiriman = $this->input->post('alamat_pengiriman');
		$data = array('no_transaksi'=>$no_transaksi,'costumer_id'=>$costumer_id,'alamat_pengiriman'=>$alamat_pengiriman);
		$simpan = $this->pengiriman->change_data($id,$data);
		if($simpan){
			$this->session->set_flashdata('msg','Data Sukses Diedit');
				redirect('admin/pengiriman/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal Diedit');
				redirect('admin/pengiriman/edit/'.$id);
			}
		}	
	}
	
	public function delete($id)
	{
		$this->load->model('pengiriman_model','pengiriman');
		$hapus = $this->pengiriman->delete_data($id);
		if($hapus){
		$this->session->set_flashdata('msg','Data Sukses Diedit');
				redirect('admin/pengiriman/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal Diedit');
				redirect('admin/pengiriman/edit/'.$id);
		}	
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */