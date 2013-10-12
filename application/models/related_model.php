<?php
class Related_model extends CI_Model{

	public function get_all(){
		$this->db->join()('product','related_product.product_id=product.id_product');
		return $this->db->get('related_product');
		//select * from product_product
	}
	
	public function get_all_limit($limit,$start){
		return $this->db->get('product',$limit,$start);
		//select * from product_product
	}
	
	public function get_by_name($name){
		$this->db->like('nama_product',$name);
		return $this->db->get('product');
		//select * from product_product where id_product='$id';
	}

	public function get_featured_limit($limit=NULL,$start=NULL){
		$this->db->where('featured_product','1');
		return $this->db->get('product',$limit,$start);
		//select * from product_product where id_product='$id';
	}
	public function get_promotions_limit($limit=NULL,$start=NULL){
		$this->db->where('diskon_product !=','');
		return $this->db->get('product',$limit,$start);
		//select * from product_product where id_product='$id';
	}
	
	public function get_by_kate($search=NULL,$kate=NULL){
		$this->db->like('nama_product',$search);
		$this->db->where('kategori_id',$kate);
		return $this->db->get('product');
		//select * from product_product where id_product='$id';
	}

	public function get_new_limit($limit=NULL,$start=NULL,$date=NULL){
		if($date!=NULL){
			$this->db->where('product_star <=', $date);
			$this->db->where('product_finish >=', $date);
		}
		return $this->db->get('product',$limit,$start);
		//select * from product_product where id_product='$id';
	}

	public function get_by_id($id){
		$this->db->where('id_product',$id);
		return $this->db->get('product');
		//select * from product_product where id_product='$id';
	}
	
	public function save_data($data){
		return $this->db->insert('product',$data);
	}
	
	public function change_data($id,$data){
		$this->db->where('id_product',$id);
		return $this->db->update('product',$data);
	}
	
	public function delete_data($id){
		$this->db->where('id_product',$id);
		return $this->db->delete('product');
	}
}
