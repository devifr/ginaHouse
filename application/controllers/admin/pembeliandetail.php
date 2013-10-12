<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PembelianDetail extends CI_Controller {

	public function __construct()
       {
        parent::__construct();
        $this->auth->cekBelumLogin();
    }
	public function index()
	{
		$this->load->model('pembeliandetail_model','pembeliandetail');
		$this->load->library('pagination');
		$jumlah_data = $this->pembeliandetail->get_all()->num_rows();
		$config['base_url'] = base_url('index.php/admin/pembeliandetail/index/');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination'] = $this->pagination->create_links();
		$data['pembeliandetail']=$this->pembeliandetail->get_all_limit($config['per_page'],$page);
		
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('pembeliandetail/view_all',$data);
		$this->load->view('admin/footer');
	}
	
	public function input()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('pembeliandetail/input');
		$this->load->view('admin/footer');

	}
	
	public function edit($id)
	{
		$this->load->model('pembeliandetail_model','detail');
		$data['rows']=$this->detail->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('pembeliandetail/edit',$data);
		$this->load->view('admin/footer');
	}

	public function view($id)
	{
		$this->load->model('pembeliandetail_model','pembeliandetail');
		$data['rows']=$this->pembeliandetail->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('pembeliandetail/view_detail',$data);
		$this->load->view('admin/footer');
	}
	
	
	public function insert_data()
	{
		$this->load->model('pembeliandetail_model','pembeliandetail');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_transaksi', 'No Transaksi','required');
		$this->form_validation->set_rules('product_id', 'Product Id','required');
		$this->form_validation->set_rules('sub_total', 'Sub Total','required');
		$this->form_validation->set_rules('quantity', 'Quantity','required');
		$this->form_validation->set_rules('costumer_id', 'costumer Id','required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/pembeliandetail/input/');			
		}else{
		$no_transaksi = $this->input->post('no_transaksi');
		$product_id = $this->input->post('product_id');
		$sub_total = $this->input->post('sub_total');
		$quantity = $this->input->post('quantity');
		$costumer_id = $this->input->post('costumer_id');
		$data = array('no_transaksi'=>$no_transaksi,'product_id'=>$product_id,'sub_total'=>$sub_total,'quantity'=>$quantity, 'costumer_id'=>$costumer_id);
		$simpan = $this->pembeliandetail->save_data($data);
		if($simpan){
			$this->session->set_flashdata('msg','Data Sukses DiMasukan');
				redirect('admin/pembeliandetail/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiMasukan');
				redirect('admin/pembeliandetail/input/');
		}	
	}
	
			}
	public function update_data($id)
	{
		$this->load->model('pembeliandetail_model','pembeliandetail');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_transaksi', 'No Transaksi','required');
		$this->form_validation->set_rules('product_id', 'Product Id','required');
		$this->form_validation->set_rules('sub_total', 'Sub Total','required');
		$this->form_validation->set_rules('quantity', 'Quantity','required');
		$this->form_validation->set_rules('costumer_id', 'costumer Id','required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('admin/pembeliandetail/edit/'.$id);			
		}else{
		$no_transaksi = $this->input->post('no_transaksi');
		$product_id = $this->input->post('product_id');
		$sub_total = $this->input->post('sub_total');
		$quantity = $this->input->post('quantity');
		$costumer_id = $this->input->post('costumer_id');
		$data = array('no_transaksi'=>$no_transaksi,'product_id'=>$product_id,'sub_total'=>$sub_total,'quantity'=>$quantity, 'costumer_id'=>$costumer_id);
		$simpan = $this->pembeliandetail->change_data($id,$data);
		if($simpan){
			$this->session->set_flashdata('msg','Data Sukses DiEdit');
			redirect('admin/pembeliandetail/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiEdit');
				redirect('admin/pembeliandetail/edit/'.$id);
		}	
	}
		}
	public function delete($id)
	{
		$this->load->model('pembeliandetail_model','pembelian');
		$hapus = $this->pembeliandetail->delete_data($id);
		if($hapus){
		$this->session->set_flashdata('msg','Data Sukses DiHapus');
			redirect('admin/pembeliandetail/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiHapus');
				redirect('admin/pembeliandetai/hapus/');
		}	
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */