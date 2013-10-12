<?php
class Pembeliandetail_model extends CI_Model{

	public function get_all(){
		return $this->db->get('pembeliandetail');
		//select * from pembeliandetail_product
	}
	
	public function get_all_limit($limit,$start){
		return $this->db->get('pembeliandetail',$limit,$start);
		//select * from pembeliandetail_product
	}
	
	public function get_by_id($id){
		$this->db->where('id_pembeliandetail',$id);
		return $this->db->get('pembeliandetail');
		//select * from pembeliandetail_product where id_costumer='$id';
	}

	public function get_notrans_by_id($id){
		$this->db->join('pembeliandetail','pembeliandetail.no_transaksi=pembelian.no_transaksi');
		$this->db->join('costumer','costumer.id_costumer=pembeliandetail.costumer_id');
		$this->db->where('id_pembelian',$id);
		return $this->db->get('pembelian');
		//select * from pembelian where id_pembelian='$id';
	}
	
	public function save_data($data){
		return $this->db->insert('pembeliandetail',$data);
	}
	
	public function change_data($id,$data){
		$this->db->where('id_pembeliandetail',$id);
		return $this->db->update('pembeliandetail',$data);
	}
	
	public function delete_data($id){
		$this->db->where('id_pembeliandetail',$id);
		return $this->db->delete('pembeliandetai');
	}
}
