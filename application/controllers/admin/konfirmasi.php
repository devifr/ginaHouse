<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {

	public function __construct()
       {
        parent::__construct();
        $this->auth->cekBelumLogin();
    }

	public function index()
	{
		$this->load->model('konfirmasi_model','konfirmasi');
		$this->load->library('pagination');
		$jumlah_data = $this->konfirmasi->get_all()->num_rows();
		$config['base_url'] = base_url('index.php/admin/konfirmasi/index/');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination'] = $this->pagination->create_links();
		$data['konfirmasi']=$this->konfirmasi->get_all_limit($config['per_page'],$page);
	
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('konfirmasi/view_all',$data);
		$this->load->view('admin/footer');
	}
	
	public function input()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('konfirmasi/input');
		$this->load->view('admin/footer');
	}
	
	public function edit($id)
	{
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->model('konfirmasi_model','konfirmasi');
		$data['rows']=$this->konfirmasi->get_by_id($id);
		$this->load->view('konfirmasi/edit',$data);
		$this->load->view('admin/footer');
	}
	public function view($id)
	{
		$this->load->model('konfirmasi_model','konfirmasi');
		$data['rows']=$this->konfirmasi->get_by_id($id);
		$this->load->view('admin/head');
		$this->load->view('admin/header');
		$this->load->view('konfirmasi/view_detail',$data);
		$this->load->view('admin/footer');
	}
	
	public function insert_data()
	{
		$this->load->model('konfirmasi_model','konfirmasi');
		$id_konfirmasi = $this->input->post('id_konfirmasi');
		$no_transaksi = $this->input->post('no_transaksi');
		$costumer_id = $this->input->post('costumer_id');
		$nama_bank = $this->input->post('nama_bank');
		$no_rekening = $this->input->post('no_rekening');
		$data = array('id_konfirmasi'=>$id_konfirmasi,'no_transaksi'=>$no_transaksi,'costumer_id'=>$costumer_id, 'nama_bank'=>$nama_bank,'no_rekening'=>$no_rekening);
		$simpan = $this->konfirmasi->save_data($data);
		if($simpan){
			echo "Sukses";
		}else{
			echo "Gagal";
		}	
	}
	
	public function update_data($id)
	{
		$this->load->model('konfirmasi_model','konfirmasi');
		$id_konfirmasi = $this->input->post('id_konfirmasi');
		$no_transaksi = $this->input->post('no_transaksi');
		$costumer_id = $this->input->post('costumer_id');
		$nama_bank = $this->input->post('nama_bank');
		$no_rekening = $this->input->post('no_rekening');
		$data = array('id_konfirmasi'=>$id_konfirmasi,'no_transaksi'=>$no_transaksi,'costumer_id'=>$costumer_id, 'nama_bank'=>$nama_bank,'no_rekening'=>$no_rekening);
		$simpan = $this->konfirmasi->change_data($id,$data);
		if($simpan){
		$this->session->set_flashdata('msg','Data Sukses Diedit');
				redirect('admin/konfirmasi/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal Diedit');
				redirect('admin/konfirmasi/edit/'.$id);
			}
		}
	public function delete($id)
	{
		$this->load->model('konfirmasi_model','konfirmasi');
		$hapus = $this->konfirmasi->delete_data($id);
		if($hapus){
			$this->session->set_flashdata('msg','Data Sukses Dihapus');
				redirect('admin/konfirmasi/');
			}else{
				$this->session->set_flashdata('msg','Data Gagal Dihapus');
				redirect('admin/konfirmasi/edit/'.$id);
				}	
				}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
