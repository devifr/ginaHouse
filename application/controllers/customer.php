<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');
		$this->load->model('costumer_model','customer');
		$this->load->model('product_model','product');
		$this->load->model('pembelian_model','pembelian');
		$this->load->model('news_model','news');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->auth->cekBelumLoginCustomer();
		$data['account'] = $this->customer->get_by_id($this->session->userdata('id_customer'));
		$data['order'] = $this->pembelian->get_order($this->session->userdata('id_customer'));
		//Kategori Product
		$this->load->model('kategori_model','kategori');
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
		$this->load->view('costumer/account',$data);	
		$this->load->view('home/right_content',$data2);	
		$this->load->view('home/footer');	
	}
	
	public function login()
	{
		$this->auth->cekSudahLoginCustomer();
		//Kategori Product
		$this->load->model('kategori_model','kategori');
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
		$this->load->view('costumer/login');	
		$this->load->view('home/right_content',$data2);	
		$this->load->view('home/footer');	
	}

	public function registrasi(){
		$this->auth->cekSudahLoginCustomer();
		//Kategori Product
		$this->load->model('kategori_model','kategori');
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
		$this->load->view('costumer/register');	
		$this->load->view('home/right_content',$data2);	
		$this->load->view('home/footer');	
	}

	public function do_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username','required');
		$this->form_validation->set_rules('password', 'Password','required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('customer/login');			
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password = md5($password);
			$simpan = $this->customer->cek_login($username,$password);
			if($simpan->num_rows()>0){
				$admin = $simpan->row();
				$newdata = array(
                   'username'  => $admin->user_name,
                   'id_customer'     => $admin->id_costumer,
                   'email_costumer'     => $admin->email_costumer,
                   'nama_customer' => $admin->nama_costumer);

			$this->session->set_userdata($newdata);
				$this->session->set_flashdata('msg','Login Berhasil');
				if($cart=$this->cart->contents()){
					redirect('checkout/');
				}else{
					redirect('customer/');
				}
			}else{
				$this->session->set_flashdata('msg','Login Gagal');
				redirect('customer/login');
			}	
		}
	}

	public function do_registrasi()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_costumer', 'Nama Costumer','required');
		$this->form_validation->set_rules('alamat_costumer', 'Alamat Costumer','required');
		$this->form_validation->set_rules('email_costumer', 'Email Costumer','required|valid_email');
		$this->form_validation->set_rules('user_name', 'User Name','required');
		$this->form_validation->set_rules('password', 'Password','required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',validation_errors());
			redirect('customer/registrasi');			
		}else{
		$nama_costumer = $this->input->post('nama_costumer');
		$alamat_costumer = $this->input->post('alamat_costumer')."|"."|"."|";
		$email_costumer = $this->input->post('email_costumer');
		$user_name = $this->input->post('user_name');
		$password = $this->input->post('password');
		$password = md5($password);
		$date_join = date('Y-m-d');
		
		$data = array('nama_costumer'=>$nama_costumer,'alamat_costumer'=>$alamat_costumer,'email_costumer'=>$email_costumer, 'user_name'=>$user_name,'password'=>$password,'date_join_costumer'=>$date_join);
		$simpan = $this->customer->save_data($data);
		if($simpan){
			$this->session->set_flashdata('msg','Data Sukses DiMasukan');
				redirect('customer');
			}else{
				$this->session->set_flashdata('msg','Data Gagal DiMasukan');
				redirect('customer/registrasi');
			}	
		}
	}

	public function do_logout()
	{
		$this->auth->cekBelumLoginCustomer();
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_customer');
		$this->session->unset_userdata('nama_customer');
		redirect('product');
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