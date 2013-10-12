<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
       {
        parent::__construct();
        $this->auth->cekBelumLogin();
        // $this->output->enable_profiler(TRUE);
    }

	public function index()
	{
		$this->load->model('product_model','product');
		$this->load->library('pagination');
		$jumlah_data = $this->product->get_all()->num_rows();
		$config['base_url'] = base_url('index.php/admin/product/index/');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination'] = $this->pagination->create_links();
		$data['product']=$this->product->get_all_limit($config['per_page'],$page);

		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('product/view_all',$data);
		$this->load->view('admin/footer');
	}
		
	
	public function input()
	{
		$this->load->model('kategori_model','kategori');
		$this->load->model('product_model','product');
		$data['kategori']=$this->kategori->get_all();
		$data['related']=$this->product->get_all();
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('product/input',$data);
		$this->load->view('admin/footer');
	}
	
	public function edit($id)
	{
		$this->load->model('kategori_model','kategori');
		$this->load->model('product_model','product');
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$data['rows']=$this->kategori->get_by_id($id);
		$data['related']=$this->product->get_all();
		$this->load->view('product/edit',$data);
		$this->load->view('admin/footer');
	}
	public function view($id)
	{
		$this->load->model('product_model','product');
		$data['rows']=$this->product->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('product/view_detail',$data);
		$this->load->view('admin/footer');
	}
	
	
	public function insert_data()
	{
		$this->load->model('product_model','product');
		$nama_product = $this->input->post('nama_product');
		$kategori_id= $this->input->post('kategori_id');
		$harga_product= $this->input->post('harga_product');
		$stok_product= $this->input->post('stok_product');
		$deskripsi_product= $this->input->post('deskripsi_product');
		$diskon_product= $this->input->post('diskon_product');
		$product_star= $this->input->post('product_star');
		$product_finish= $this->input->post('product_finish');
		$featured_product= $this->input->post('featured_product');
		$form_related = $this->input->post('related');
		$related = '';
		if(count($form_related)!=''){
			foreach ($form_related as $key => $rel) {
				$related .= $rel.','; 
			}
		}
		//upload foto
		$config['upload_path'] = './catalog/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload('foto_product');
		$file = $this->upload->data();
		$catalog = $file['file_name'];
		if (!$upload)
		{
			$this->session->set_flashdata('msg',$this->upload->display_errors());
			redirect('admin/product/input/');
		}else{
			$data = array('nama_product'=>$nama_product,'foto_product'=>$catalog,'harga_product'=>$harga_product,'stok_product'=>$stok_product,'deskripsi_product'=>$deskripsi_product,
				'diskon_product'=>$diskon_product,'kategori_id'=>$kategori_id,'product_star'=>$product_star,'product_finish'=>$product_finish,'featured_product'=>$featured_product,
				'related_product'=>$related);
			$simpan = $this->product->save_data($data);
			if($simpan){
				$this->session->set_flashdata('msg','Data Sukses Disimpan');
				redirect('admin/product/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal Disimpan');
				redirect('admin/product/input/');
			}
		}
	}
	
	public function update_data($id)
	{
		$this->load->model('product_model','product');
		$nama_product = $this->input->post('nama_product');
		$harga_product = $this->input->post('harga_product');
		$stok_product= $this->input->post('stok_product');
		$deskripsi_product = $this->input->post('deskripsi_product');
		$diskon_product = $this->input->post('diskon_product');
		$kategori_id = $this->input->post('kategori_id');
		//upload foto
		$config['upload_path'] = './catalog/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload('foto_product');
		$file = $this->upload->data();
		$foto_product = $file['file_name'];
		if (!$upload)
		{
			$foto_product = $this->input->post('foto_product2');
		}
		$data = array('nama_product'=>$nama_product,'foto_product'=>$foto_product,'harga_product'=>$harga_product,'diskon_product'=>$diskon_product, 'stok_product'=>$stok_product,'deskripsi_product'=>$deskripsi_product,'kategori_id'=>$kategori_id);
		$simpan = $this->product->change_data($id,$data);
			if($simpan){
				$this->session->set_flashdata('msg','Data Sukses Diedit');
				redirect('admin/product/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal Diedit');
				redirect('admin/product/edit/'.$id);
			}	
	}
	
	public function delete($id)
	{
		$this->load->model('product_model','product');
		$hapus = $this->product->delete_data($id);
		if($hapus){
		$this->session->set_flashdata('msg','Data Sukses Dihapus');
				redirect('admin/product/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal Dihapus');
				redirect('admin/product/hapus/'.$id);
		}	
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */