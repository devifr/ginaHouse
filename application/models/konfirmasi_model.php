<?php
class konfirmasi_model extends CI_Model{

	public function get_all(){
		return $this->db->get('konfirmasi');
		//select * from konfirmasi_product
	}
	public function get_all_limit($limit,$start){
		return $this->db->get('konfirmasi',$limit,$start);
		//select * from konfirmasi_product LIMIT $limit,$start
	}

	public function get_by_id($id){
		$this->db->where('id_konfirmasi',$id);
		return $this->db->get('konfirmasi');
		//select * from konfirmasi_product where id_konfirmasi='$id';
	}
	
	public function save_data($data){
		return $this->db->insert('konfirmasi',$data);
	}
	
	public function change_data($id,$data){
		$this->db->where('id_konfirmasi',$id);
		return $this->db->update('konfirmasi',$data);
	}
	
	public function delete_data($id){
		$this->db->where('id_konfirmasi',$id);
		return $this->db->delete('konfirmasi');
	}
}
