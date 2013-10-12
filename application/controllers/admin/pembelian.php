<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->auth->cekBelumLogin();
    }

	public function index()
	{
		$this->load->model('pembelian_model','pembelian');
		$this->load->library('pagination');
		$jumlah_data = $this->pembelian->get_all()->num_rows();
		$config['base_url'] = base_url('index.php/admin/pembelian/index/');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination'] = $this->pagination->create_links();
		$data['pembelian']=$this->pembelian->get_all_limit($config['per_page'],$page);
	

		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('pembelian/view_all',$data);
		$this->load->view('admin/footer');
	}
	
	public function input()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('pembelian/input');
		$this->load->view('admin/footer');
	}
	public function edit($id)
	{
		$this->load->model('pembelian_model','pembelian');
		$data['rows']=$this->pembelian->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('pembelian/edit',$data);
		$this->load->view('admin/footer');
	}
	public function view($id)
	{
		$this->load->model('pembelian_model','pembelian');
		$this->load->model('pembeliandetail_model','pembeliandetail');
		$data['rows']=$this->pembelian->get_by_id($id);
		$data['pembeliandetail']=$this->pembeliandetail->get_notrans_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('pembelian/view_detail',$data);
		$this->load->view('admin/footer');
	}
	
	public function insert_data()
	{
		$this->load->model('pembelian_model','pembelian');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('total', 'total', 'required');
		$this->form_validation->set_rules('quantity', 'quantity', 'required');
		$this->form_validation->set_rules('no_transaksi', 'no transaksi', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/pembelian/input/');			
		}else{
		$total = $this->input->post('total');
		$quantity = $this->input->post('quantity');
		$no_transaksi = $this->input->post('no_transaksi');
		$data = array('total'=>$total,'quantity'=>$quantity,'no_transaksi'=>$no_transaksi);
		$simpan = $this->pembelian->save_data($data);
		if($simpan){
			$this->session->set_flashdata('msg','Data Sukses DiMasukan');
				redirect('admin/pembelian/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiMasukan');
				redirect('admin/pembelian/input/');
			}	
		}	
	}
	
	public function update_data($id,$data)
	{
		$this->load->model('pembelian_model','pembelian');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('total', 'total','required');
		$this->form_validation->set_rules('quantity', 'Quantity','required');
		$this->form_validation->set_rules('no_transaksi', 'no transaksi','required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/pembelian/input/');			
		}else{
		$total = $this->input->post('total');
		$quantity = $this->input->post('quantity');
		$no_transaksi = $this->input->post('no_transaksi');
		$data = array('total'=>$total,'quantity'=>$quantity,'no_transaksi'=>$no_transaksi);
		$simpan = $this->pembelian->change_data($id,$data);
		if($simpan){
			$this->session->set_flashdata('msg','Data Sukses DiEdit');
				redirect('admin/pembelian/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiEdit');
				redirect('admin/pembelian/edit/'.$id);
			}	
		}	
	}
	
	public function delete($id)
	{
		$this->load->model('pembelian_model','pembelian');
		$hapus = $this->pembelian->delete_data($id);
		if($hapus){
			$this->session->set_flashdata('msg','Data Sukses DiHapuskan');
				redirect('admin/pembelian/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiHapuskan');
				redirect('admin/pembelian/hapus/');
			}	
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */