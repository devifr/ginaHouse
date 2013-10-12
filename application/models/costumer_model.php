<?php
class costumer_model extends CI_Model{

	public function get_all(){
		return $this->db->get('costumer');
		//select * from costumer_product
	}

	public function get_all_date(){
		$this->db->select('date_join_costumer');
		$this->db->distinct();
		return $this->db->get('costumer');
		//select distinct date_join_costumer from costumer
	}

	public function get_all_by_date($date){
		$this->db->where('date_join_costumer',$date);
		return $this->db->get('costumer');
		//select * from costumer where date_join_costumer='$date'
	}
	
	public function get_all_limit($limit,$start){
		return $this->db->get('costumer',$limit,$start);
		//select * from costumer_product
	}
	
	public function get_by_id($id){
		$this->db->where('id_costumer',$id);
		return $this->db->get('costumer');
		//select * from costumer_product where id_costumer='$id';
	}

	public function get_by_name($name){
		$this->db->like('nama_costumer',$name);
		return $this->db->get('costumer');
		//select * from costumer_product where id_costumer='$id';
	}

	public function cek_login($us,$pass){
		$this->db->where('user_name',$us);
		$this->db->where('password',$pass);
		return $this->db->get('costumer');
		//select * from costumer_product where id_costumer='$id';
	}
	
	public function save_data($data){
		return $this->db->insert('costumer',$data);
	}
	
	public function change_data($id,$data){
		$this->db->where('id_costumer',$id);
		return $this->db->update('costumer',$data);
	}
	
	public function delete_data($id){
		$this->db->where('id_costumer',$id);
		return $this->db->delete('costumer');
	}
}
