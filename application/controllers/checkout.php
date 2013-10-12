<?php

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');
		$this->load->model('costumer_model','customer');
		$this->load->model('product_model','product');
		$this->load->model('pembeliandetail_model','pembeliandetail');
		$this->load->model('pembelian_model','pembelian');
		$this->load->model('pengiriman_model','pengiriman');
		$this->load->model('kurir_model','kurir');
		$this->load->model('news_model','news');
		$this->load->library('pagination');
		// $this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->auth->cekBelumLoginCustomer();
		if($cart=$this->cart->contents()){
		
			$this->load->model('kategori_model','kategori');
			$data2['kategori']=$this->kategori->get_all_limit('5','0');
			
			$data2['kategori_all']=$this->kategori->get_all();

			//Promotions Product
			$data2['promotions'] = $this->product->get_promotions_limit('5','0');
			//get min max
			$min = $this->product->get_by_min_max('0')->row()->harga_product;
			$max = $this->product->get_by_min_max('1')->row()->harga_product;
			$range = 9999;
			for ($m=$max; $m >= $min; $m--) {
				$cek_price = $this->product->get_by_price($m)->num_rows();
				if($cek_price==0){
	             $m -=$range; 
				 continue;
				}
				$m2 = $m - $range;
	            if($m2 <= 1) $m2 = 0; 
	            $data2['range'][$m] = $m.' - '.$m2;
	            $m -=$range; 
	        }
			//news
		    $news = $this->news_ginahouse();
		    $data2['lists'] = $news['lists'];
		    $data2['pagination_news'] = $news['pagination'];

			$data['customer'] = $this->customer->get_by_id($this->session->userdata('id_customer'));
			$provinsi = $this->kurir->get_all_provinsi();
			$isi_provinsi = "";
			if($provinsi->num_rows()>0)
				$isi_provinsi = $provinsi->result();
			$data['provinsi'] = $isi_provinsi; 

			$this->load->view('home/head');	
			$this->load->view('home/header');	
			$this->load->view('home/menu');
			$this->load->view('checkout/index',$data);	
			$this->load->view('home/right_content',$data2);	
			$this->load->view('home/footer');	
		}else{
			redirect('cart');
		}

	}

	public function do_checkout()
	{
		$this->auth->cekBelumLoginCustomer();
		if($this->check_item()==true){
			$alamat = $this->input->post('alamat');
			$provinsi = $this->input->post('provinsi');
			$kota = $this->input->post('kota');
			$kdpos = $this->input->post('kdpos');
			$total = $this->input->post('total');
			$cara_pembayaran = $this->input->post('cara_pembayaran');
			$cara_pengiriman = $this->input->post('cara_pengiriman');
			if($cara_pembayaran!='COD'){	
				$cara_pembayaran .= ' '.$this->input->post('transfer_bank');
				$type_kur=$this->input->post('pengiriman_kurir')
				$type = "";
				if($type_kur=='0') $type = "YES";
				else if($type_kur=='1') $type = "Reguler";
				else if($type_kur=='2') $type = "RPX";
				$cara_pengiriman .= ' ('.$type.')';
			}
			$status = 'pending';
			$alamat_full = $alamat.'|'.$provinsi.'|'.$kota.'|'.$kdpos;
			$data = array('alamat'=>$alamat_full,'total'=>$total,'cara_pengiriman'=>$cara_pengiriman,'status'=>$status,
				'cara_pembayaran'=>$cara_pembayaran);
			$this->min_item();
			$this->save_pemesanan($data);
			redirect('checkout/finish/');
		}else{
			redirect('checkout/');
		}

	}

	public function finish()
	{
			$this->load->model('kategori_model','kategori');
			$this->cart->destroy();
			$data2['kategori']=$this->kategori->get_all_limit('5','0');
			
			$data2['kategori_all']=$this->kategori->get_all();

			$data2['promotions'] = $this->product->get_promotions_limit('5','0');

			$data['rows'] = $this->pengiriman->get_data_finish($this->session->userdata('id_customer'));
			//get min max
			$min = $this->product->get_by_min_max('0')->row()->harga_product;
			$max = $this->product->get_by_min_max('1')->row()->harga_product;
			$range = 9999;
			for ($m=$max; $m >= $min; $m--) {
				$cek_price = $this->product->get_by_price($m)->num_rows();
				if($cek_price==0){
	             $m -=$range; 
				 continue;
				}
				$m2 = $m - $range;
	            if($m2 <= 1) $m2 = 0; 
	            $data2['range'][$m] = $m.' - '.$m2;
	            $m -=$range; 
	        }
		
			//news
		    $news = $this->news_ginahouse();
		    $data2['lists'] = $news['lists'];
		    $data2['pagination_news'] = $news['pagination'];

			$this->load->view('home/head');	
			$this->load->view('home/header');	
			$this->load->view('home/menu');
			$this->load->view('checkout/finish',$data);	
			$this->load->view('home/right_content',$data2);	
			$this->load->view('home/footer');
	}

	private function save_pemesanan($data_post)
	{
		$id_customer = $this->session->userdata('id_customer');
		$date_order = date('Y-m-d');
		$no = $this->pembelian->get_all()->num_rows();
		$cart=$this->cart->contents();
		foreach ($cart as $key => $c) {
			$notrans = date('HisYmd').$no;
			$data = array('no_transaksi'=>$notrans,'product_id'=>$c['id'],'sub_total'=>$c['subtotal'],
				'quantity'=>$c['qty'],'costumer_id'=>$id_customer);
			$this->pembeliandetail->save_data($data);
		}
			$data_pembelian = array('total'=>$data_post['total'],'quantity'=>$c['qty'],'no_transaksi'=>$notrans,'status'=>$data_post['status'],
				'jenis_pembayaran'=>$data_post['cara_pembayaran'],'date_order'=>$date_order);
			$this->pembelian->save_data($data_pembelian);
			
			$data_pengiriman = array('no_transaksi'=>$notrans,'alamat_pengiriman'=>$data_post['alamat'],'costumer_id'=>$id_customer,'jenis_pengiriman'=>$data_post['cara_pengiriman']);
			$this->pengiriman->save_data($data_pengiriman);	
	}
 
	private function min_item()
	{
		$cart=$this->cart->contents();

		foreach ($cart as $key => $c) {
			$id = $c['id'];
			$prod = $this->product->get_by_id($id);
			$p = $prod->row();	
			$sisa = $p->stok_product - $c['qty'];	
			$data = array('stok_product'=>$sisa);
			$this->product->change_data($id,$data); 
		}
	}

	private function check_item(){
		$cart=$this->cart->contents();
		foreach ($cart as $key => $c) {
			$id = $c['id'];
			$prod = $this->product->get_by_id($id);
			if($prod->num_rows()>0){
				$p = $prod->row();	
				$sisa = $p->stok_product - $c['qty'];
				if($sisa<1){
					return false;
				}else{
					return true;
				}	
			}else{
				return false;
			} 
		}
	}
	private function news_ginahouse($page=NULL){

    if($page == NULL){
        $page = 0;
    }

    $jumlah = $this->news->get_all()->num_rows();
    $this->load->library('pagination');
    $config['base_url'] = base_url('index.php/home/getNews/');
    $config['total_rows'] = $jumlah;
    $config['per_page'] = 1;
    $config['uri_segment'] = 3;
    // $config['num_links'] = 3;
    $config['num_tag_open'] = '<li class="pagination-page"> ';
    $config['num_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li> ';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li> ';
    $config['last_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li> ';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li> ';
    $config['prev_tag_close'] = '</li>';
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['next_link'] = '&gt;';
    $config['prev_link'] = '&lt;';
    $config['cur_tag_open'] = '<li><b>';
    $config['cur_tag_close'] = '</b></li>';
    $config['is_ajax_paging']      =  TRUE; // default FALSE
    $config['paging_function'] = 'ajax_paging'; // Your jQuery paging
    
    $this->pagination->initialize($config);
    // $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

    $data_news['lists'] = $this->news->get_all_limit($config['per_page'],$page);
    $data_news['pagination'] = $this->pagination->create_links();
    return $data_news;
  }

  public function getNews(){
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $news = $this->news_ginahouse($page);
    $lists = $news['lists'];
    $pagination = $news['pagination'];
    foreach ($lists->result() as $key_list => $list) {
	  	echo "<h3>$list->judul_news</h2>";
	    echo substr($list->description_news, 0,10);
	    if(strlen($list->description_news)>=10){
	      echo anchor('home/news_detail/'.$list->id_news, ' Read More', '');
	    }
	} 
	echo "<form id='myform'><div id='garis'>".$pagination."</div></form>";
  }
}