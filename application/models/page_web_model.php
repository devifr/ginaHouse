<?php
class Page_web_model extends CI_Model{

	
	public function get_all(){
		return $this->db->get('page_web');
		//select * from page_web LIMIT $limit,$start
	}

	public function get_all_limit($limit,$start){
		return $this->db->get('page_web',$limit,$start);
		//select * from page_web LIMIT $limit,$start
	}

	public function get_by_id($id){
		$this->db->where('id_page',$id);
		return $this->db->get('page_web');
		//select * from page_web where id_kategori='$id';
	}

	public function get_by_id_aktif($id){
		$this->db->where('status','1');
		$this->db->where('id_page',$id);
		return $this->db->get('page_web');
		//select * from page_web where id_kategori='$id';
	}
	
	public function save_data($data){
		return $this->db->insert('page_web',$data);
	}
	
	public function change_data($id,$data){
		$this->db->where('id_page',$id);
		return $this->db->update('page_web',$data);
	}
	
	public function delete_data($id){
		$this->db->where('id_page',$id);
		return $this->db->delete('page_web');
	}
}
