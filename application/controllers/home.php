<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('news_model','news');
		$this->load->model('product_model','product');
		$this->load->model('kategori_model','kategori');
		
		// $this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->load->library('pagination');
		//featured Product
		$jumlah_data = $this->product->get_featured_limit()->num_rows();
		$config['base_url'] = base_url('index.php/home/index/');
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination_featured'] = $this->pagination->create_links();
		$data['featured'] = $this->product->get_featured_limit($config['per_page'],$page);

		//new Product
		$date = date('Y-m-d');
		$jumlah_data2 = $this->product->get_new_limit()->num_rows();
		$config2['base_url'] = base_url('index.php/home/index/');
		$config2['total_rows'] = $jumlah_data2;
		$config2['per_page'] = 10;
		$config2['uri_segment'] = 4; 
		$this->pagination->initialize($config2); 
		$page2 = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination_new'] = $this->pagination->create_links();
		$data['new_products'] = $this->product->get_new_limit($config2['per_page'],$page2,$date);

		//Kategori Product
		$data2['kategori']=$this->kategori->get_all_limit('10','0');
		
		$data2['kategori_all']=$this->kategori->get_all();

		//Promotions Product
		$data2['promotions'] = $this->product->get_promotions_limit('10','0');
		
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
		$this->load->view('home/index',$data);	
		$this->load->view('home/right_content',$data2);	
		$this->load->view('home/footer');	
	}	

	public function search()
	{
		$this->load->library('pagination');
		$this->load->model('product_model','product');
		$search = $this->input->post('search');
		$pilihan = $this->input->post('pilihan');
		$data['list_product'] = $this->product->get_by_kate($search,$pilihan);
		$data['kata']= $search;

		//Kategori Product
		$data2['kategori']=$this->kategori->get_all_limit('10','0');
		
		$data2['kategori_all']=$this->kategori->get_all();

		//Promotions Product
		$data2['promotions'] = $this->product->get_promotions_limit('10','0');
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
		$this->load->view('home/search_front',$data);
		$this->load->view('home/right_content',$data2);	
		$this->load->view('home/footer');
	}

	public function news_detail($id_news)
	{
		$this->load->model('news_model','news');
		$data['news'] = $this->news->get_by_id($id_news);
		//Kategori Product
		$data2['kategori']=$this->kategori->get_all_limit('10','0');	
		$data2['kategori_all']=$this->kategori->get_all();

		//Promotions Product
		$data2['promotions'] = $this->product->get_promotions_limit('10','0');
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
	    $news = $this->news_ginahouse2();
	    $data2['lists'] = $news['lists'];
	    $data2['pagination_news'] = $news['pagination'];

		$this->load->view('home/head');	
		$this->load->view('home/header');	
		$this->load->view('home/menu');	
		$this->load->view('news/detail',$data);	
		$this->load->view('home/right_content',$data2);	
		$this->load->view('home/footer');
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

  private function news_ginahouse2($page=NULL){

    if($page == NULL){
        $page = 0;
    }

    $jumlah = $this->news->get_all()->num_rows();
    $this->load->library('pagination');
    $config['base_url'] = base_url('index.php/home/getNews2/');
    $config['total_rows'] = $jumlah;
    $config['per_page'] = 1;
    $config['uri_segment'] = 4;
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

  public function getNews2(){
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
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

/* End of file home.php */
/* Location: ./application/controllers/home.php */