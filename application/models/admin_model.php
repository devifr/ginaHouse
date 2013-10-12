<?php
class Admin_model extends CI_Model{

	public function cek_login($username,$password){
		$this->db->where('username_admin',$username);
		$this->db->where('password_admin',$password);
		return $this->db->get('admin');
	}	
	
	public function get_by_id($id){
		$this->db->where('id_admin',$id);
		return $this->db->get('admin');
		//select * from costumer_product where id_costumer='$id';
	}
	
	public function save_data($data){
		return $this->db->insert('admin',$data);
	}
	
	public function change_data($id,$data){
		$this->db->where('id_admin',$id);
		return $this->db->update('admin',$data);
	}
	
	public function delete_data($id){
		$this->db->where('id_admin',$id);
		return $this->db->delete('admin');
	}
}
