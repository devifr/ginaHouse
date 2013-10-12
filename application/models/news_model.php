<?php
class News_model extends CI_Model{

	
	public function get_all(){
		return $this->db->get('news');
		//select * from news LIMIT $limit,$start
	}

	public function get_all_limit($limit,$start){
		return $this->db->get('news',$limit,$start);
		//select * from news LIMIT $limit,$start
	}

	public function get_by_id($id){
		$this->db->where('id_news',$id);
		return $this->db->get('news');
		//select * from news where id_kategori='$id';
	}

	public function get_by_id_aktif($id){
		$this->db->where('status','1');
		$this->db->where('id_news',$id);
		return $this->db->get('news');
		//select * from news where id_kategori='$id';
	}
	
	public function save_data($data){
		return $this->db->insert('news',$data);
	}
	
	public function change_data($id,$data){
		$this->db->where('id_news',$id);
		return $this->db->update('news',$data);
	}
	
	public function delete_data($id){
		$this->db->where('id_news',$id);
		return $this->db->delete('news');
	}
}
