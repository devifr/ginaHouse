<?php
class Kategori_model extends CI_Model{

	public function get_all(){
		return $this->db->get('kategori_product');
		//select * from kategori_product
	}
	
	public function get_all_limit($limit,$start){
		return $this->db->get('kategori_product',$limit,$start);
		//select * from kategori_product LIMIT $limit,$start
	}
	
	public function get_by_id($id){
		$this->db->where('id_kategori',$id);
		return $this->db->get('kategori_product');
		//select * from kategori_product where id_kategori='$id';
	}
	
	public function get_by_name($name){
		$this->db->like('nama_kategori',$name);
		return $this->db->get('kategori_product');
		//select * from kategori_product where id_kategori='$id';
	}
	
	public function save_data($data){
		return $this->db->insert('kategori_product',$data);
	}
	
	public function change_data($id,$data){
		$this->db->where('id_kategori',$id);
		return $this->db->update('kategori_product',$data);
	}
	
	public function delete_data($id){
		$this->db->where('id_kategori',$id);
		return $this->db->delete('kategori_product');
	}
}
