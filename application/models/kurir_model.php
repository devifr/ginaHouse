<?php
class Kurir_model extends CI_Model{

	
	public function get_all(){
		return $this->db->get('kurir');
		//select * from kurir LIMIT $limit,$start
	}

	public function get_all_limit($limit,$start){
		return $this->db->get('kurir',$limit,$start);
		//select * from kurir LIMIT $limit,$start
	}

	public function get_all_provinsi(){
		$this->db->select('provinsi_kurir');
		$this->db->distinct();
		return $this->db->get('kurir',5);
		//select * from kurir LIMIT $limit,$start
	}
	
	public function get_kota($provisi){
		$this->db->select('kota_kurir');
		$this->db->where('provinsi_kurir',$provisi);
		return $this->db->get('kurir');
	}

	public function get_type($kota){
		$this->db->select('lama_kurir');
		$this->db->where('kota_kurir',$kota);
		return $this->db->get('kurir');
	}

	public function get_biaya($kota){
		$this->db->select('biaya_kurir');
		// $this->db->where('provinsi_kurir',$provisi);
		$this->db->where('kota_kurir',$kota);
		return $this->db->get('kurir');
	}

	public function get_biaya_by_type($kota,$type){
		$this->db->select('biaya_kurir');
		// $this->db->where('provinsi_kurir',$provisi);
		$this->db->where('kota_kurir',$kota);
		$this->db->where('lama_kurir',$type);
		return $this->db->get('kurir');
	}

	public function get_by_id($id){
		$this->db->where('id_kurir',$id);
		return $this->db->get('kurir');
		//select * from kurir where id_kategori='$id';
	}
	
	public function save_data($data){
		return $this->db->insert('kurir',$data);
	}
	
	public function change_data($id,$data){
		$this->db->where('id_kurir',$id);
		return $this->db->update('kurir',$data);
	}
	
	public function delete_data($id){
		$this->db->where('id_kurir',$id);
		return $this->db->delete('kurir');
	}
}
