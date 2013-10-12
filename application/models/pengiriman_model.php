<?php
class pengiriman_model extends CI_Model{

	public function get_all(){
		return $this->db->get('pengiriman');
		//select * from pengiriman
	}

	public function get_all_limit($limit,$start){
		return $this->db->get('pengiriman',$limit,$start);
		//select * from pengiriman
	}
	
	public function get_by_id($id){
		$this->db->where('id_pengiriman',$id);
		return $this->db->get('pengiriman');
		//select * from pengiriman_product where id_costumer='$id';
	}
	
	public function get_data_finish($id_costumer)
	{
		$this->db->order_by('id_pengiriman','desc');
		$this->db->join('pembelian','pembelian.no_transaksi=pengiriman.no_transaksi');
		$this->db->where('costumer_id',$id_costumer);
		return $this->db->get('pengiriman');
	}

	public function save_data($data){
		return $this->db->insert('pengiriman',$data);
	}
	
	public function change_data($id,$data){
		$this->db->where('id_pengiriman',$id);
		return $this->db->update('pengiriman',$data);
	}
	
	public function delete_data($id){
		$this->db->where('id_pengiriman',$id);
		return $this->db->delete('pengiriman');
	}
}
