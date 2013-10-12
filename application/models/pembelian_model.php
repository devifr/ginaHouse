<?php
class pembelian_model extends CI_Model{

	public function get_all(){
		return $this->db->get('pembelian');
		//select * from pembelian_product
	}

	public function get_all_date(){
		$this->db->select('date_order');
		$this->db->distinct();
		return $this->db->get('pembelian');
		//select distinct date_order from pembelian
	}

	public function get_all_by_date($date){
		$this->db->where('date_order',$date);
		return $this->db->get('pembelian');
		//select * from pembelian where date_order='$date'
	}

	public function get_order($id_customer){
		$this->db->join('pembeliandetail','pembeliandetail.no_transaksi=pembelian.no_transaksi');
		$this->db->join('pengiriman','pengiriman.no_transaksi=pembelian.no_transaksi');
		$this->db->where('costumer_id',$id_customer);
		return $this->db->get('pembelian');
		//select * from pembelian_product
	}

	public function cek_nopesan($no_transaksi){
		$this->db->join('pembeliandetail','pembeliandetail.no_transaksi=pembelian.no_transaksi');
		$this->db->where('no_transaksi',$no_transaksi);
		return $this->db->get('pembelian');
		//select * from pembelian_product
	}
	
	public function get_all_limit($limit,$start){
		return $this->db->get('pembelian',$limit,$start);
		//select * from pembelian LIMIT $limit,$start
	}
	
	public function get_by_id($id){
		$this->db->where('id_pembelian',$id);
		return $this->db->get('pembelian');
		//select * from pembelian where id_pembelian='$id';
	}
	
	public function save_data($data){
		return $this->db->insert('pembelian',$data);
	}
	
	public function change_data($id,$data){
		$this->db->where('id_pembelian',$id);
		return $this->db->update('pembelian',$data);
	}
	
	public function delete_data($id){
		$this->db->where('id_pembelian',$id);
		return $this->db->delete('pembelian');
	}
}
