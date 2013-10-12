<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
       {
        parent::__construct();
    }

	public function getKota()
	{
		$this->load->model('kurir_model','kurir');
		$result = "";
		// $result = "<select name='kota' id='kota'>";
		$result .= "<option value='-'>-Pilih Kota-</option>";
		$nama = $this->input->post('name');
		$kota = $this->kurir->get_kota($nama)->result();
		foreach ($kota as $key => $kot) {
			$result .= "<option>".$kot->kota_kurir."</option>";
		}
		// $result .= "</select>";
		echo $result;
	}

	public function getBiaya()
	{
		$this->load->model('kurir_model','kurir');
		$nama = $this->input->post('name');
		// $nama2 = $this->input->post('name2');
		$biaya = $this->kurir->get_biaya($nama);
		$result = "";
		if($biaya->num_rows()>0){
			$result = $biaya->row()->biaya_kurir;
		}
		echo $result;
	}

	public function getBiayaPengiriman()
	{
		$this->load->model('kurir_model','kurir');
		$type = $this->input->post('type');
		$kota = $this->input->post('kota');
		$biaya = $this->kurir->get_biaya_by_type($kota,$type);
		$result = 0;
		if($biaya->num_rows()>0){
			$result = $biaya->row()->biaya_kurir;
		}
		echo $result;
	}
	
	public function getType()
	{
		$this->load->model('kurir_model','kurir');
		$result = "";
		// $result = "<select name='kota' id='kota'>";
		$result .= "<option value='-'>-Pilih Kota-</option>";
		$nama = $this->input->post('name');
		$kota = $this->kurir->get_type($nama)->result();
		foreach ($kota as $key => $kot) {
			$type = "";
			if($kot->lama_kurir=='0') $type = "YES";
			else if($kot->lama_kurir=='1') $type = "Reguler";
			else if($kot->lama_kurir=='2') $type = "RPX";
			$result .= "<option value='".$kot->lama_kurir."'>".$type."</option>";
		}
		// $result .= "</select>";
		echo $result;
	}

}