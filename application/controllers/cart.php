<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('news_model','news');
		// $this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->load->library('pagination');
		$this->load->model('product_model','product');
		$this->load->model('kategori_model','kategori');
		//Kategori Product
		$jumlah_data3 = $this->kategori->get_all()->num_rows();
		$config3['base_url'] = base_url('index.php/home/index/');
		$config3['total_rows'] = $jumlah_data3;
		$config3['per_page'] = 10;
		$config3['uri_segment'] = 4; 
		$this->pagination->initialize($config3); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data2['pagination_kategori'] = $this->pagination->create_links();
		$data2['kategori']=$this->kategori->get_all_limit($config3['per_page'],$page);
		
		$data2['kategori_all']=$this->kategori->get_all();

		//Promotions Product
		$jumlah_data4 = $this->product->get_promotions_limit()->num_rows();
		$config4['base_url'] = base_url('index.php/home/index/');
		$config4['total_rows'] = $jumlah_data4;
		$config4['per_page'] = 10;
		$config4['uri_segment'] = 4; 
		$this->pagination->initialize($config4); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data2['pagination_promotions'] = $this->pagination->create_links();
		$data2['promotions'] = $this->product->get_promotions_limit($config4['per_page'],$page);
		//get min max
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
		$this->load->view('home/cart');	
		$this->load->view('home/right_content',$data2);	
		$this->load->view('home/footer');	
	}
	
	public function insert_cart($id)
	{
		$this->load->model('product_model','product');
		$isi_cart = $this->product->get_by_id($id)->row();
		$qty = 1;
		if($cart=$this->cart->contents()){
			foreach($cart as $item){
                if($item['id'] == $id)     //if the item we're adding is in cart add up those two quantities
                {
                    $rowid = $item['rowid'];
                    $qty = $item['qty'] + $qty;
                    $data = array(
              					 'rowid' => $rowid,
               					 'qty'   => $qty
            					);
               		$this->cart->update($data);
                }
            }
        }
			$data = array(
				'id'      => $isi_cart->id_product,
				'qty'     => $qty,
				'price'   => $isi_cart->harga_product,
				'name'    => $isi_cart->nama_product,			
				'options' => array('image' => $isi_cart->foto_product)
				);

		$this->cart->insert($data);
	redirect('cart');
	}

	public function update_qty(){
		$qty = $this->input->post('qty');
		foreach ($qty as $key => $q) {
			$rowid = $this->input->post("rowid[0]");
			$data = array(
               'rowid' => $key,
               'qty'   => $q
            );
		$this->cart->update($data);
		}
		redirect('cart');		
	}

	public function remove_item($id)
	{
		$data = array(
               'rowid' => $id,
               'qty'   => 0
            );

		$this->cart->update($data);
		redirect('cart');

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

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */