<?php
class Konfirmasi extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfirmasi_model','konfirmasi');
		$this->load->model('pembelian_model','pembelian');
		$this->load->model('pembeliandetail_model','pembeliandetail');
		$this->load->model('kategori_model','kategori');
		$this->load->model('product_model','product');
    $this->load->model('news_model','news');
		$this->auth->cekBelumLoginCustomer();
	}

	public function index($no_transaksi='')
	{
		$this->load->helper('captcha');
		$vals = array(
      		'img_path'   => './captcha/',
      		'img_url'  => ''.base_url().'captcha/'
      	);
	    $cap = create_captcha($vals);
	    $isi = array(
	        'captcha_time'  => $cap['time'],
	        'ip_address'  => $this->input->ip_address(),
	        'word'   => $cap['word']
	        );
	    $query = $this->db->insert_string('captcha', $isi);
	    $this->db->query($query);
	    $data['captcha'] = $cap['image'];
    $data['no_transaksi'] = $no_transaksi;
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
		$this->load->view('konfirmasi/index',$data);	
		$this->load->view('home/right_content',$data2);	
		$this->load->view('home/footer');
	}

  public function save_konfirmasi(){
  	$this->load->library('form_validation');
    $this->form_validation->set_rules('no_pesan', 'no_pesan', 'required');
    $this->form_validation->set_rules('no_tlp', 'no_tlp', 'required');
    $this->form_validation->set_rules('tgl', 'tgl', 'required');
    $this->form_validation->set_rules('bln', 'bln', 'required');
    $this->form_validation->set_rules('thn', 'thn', 'thn');
    $this->form_validation->set_rules('jum_bayar', 'jum_bayar', 'required');
    $this->form_validation->set_rules('dari_bank', 'dari_bank', 'required');
    $this->form_validation->set_rules('no_rek', 'no_rek', 'required');
    if ($this->form_validation->run() == FALSE)
    {
      echo "<script>alert('Terdapat Data yang belum Terisi')</script>";
      $this->index;
    }
    else
    {
      // First, delete old captchas
      $expiration = time()-7200; // Two hour limit
      $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);  

      // Then see if a captcha exists:
      $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
      $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
      $query = $this->db->query($sql, $binds);
      $row = $query->row();
      if ($row->count == 0)
      {
      	  $this->session->set_flashdata('msg', 'Captcha Yang Anda Masukkan Salah');
          redirect('konfirmasi');
      }
      else{
        $cek_nopesan = $this->pembelian->cek_nopesan($no_pesan);
        if($cek_nopesan->num_rows()<1){
          $this->session->set_flashdata('msg', 'No Transaksi Tidak Ada, Cek Kembali No Transaksi Anda');
          redirect('konfirmasi');   
        }else{
          $pesan = $cek_nopesan->row();
        }
        if($pesan->costumer_id!=$this->session->userdata('id_customer')){
          $this->session->set_flashdata('msg', 'Harap Konfirmasi Dengan Customer Yang Memesan Barang');
          redirect('konfirmasi');
        }
        if($pesan->status!='pending'){
          $this->session->set_flashdata('msg', 'Order Telah Dikonfirmasi');
          redirect('konfirmasi');
        }
      $no_pesan = $this->input->post('no_pesan');
      $tgl_pesan = $this->input->post('tgl_pesan');
      $customer_id = $this->session->userdata('id_customer');;
      $no_tlp = $this->input->post('no_tlp');
      $tgl_pembayaran = $this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
      $jum_bayar = $this->input->post('jum_bayar');
      $dari_bank = $this->input->post('dari_bank');
      $no_rek = $this->input->post('no_rek');
      $catatan = $this->input->post('catatan');
      $nama = $this->session->userdata('nama_customer');
      $email_cust = $this->session->userdata('email_customer');
      $data_simpan = array('no_transaksi'=>$no_pesan,'costumer_id'=>$customer_id,'nama_bank'=>$dari_bank,'no_rekening'=>$no_rek,'tanggal_konfirmasi'=>$tgl_pesan,'telepon_transfer'=>$no_tlp,'tanggal_transfer'=>$tgl_pembayaran,'catatan'=>$catatan);
      if($this->konfirmasi->save_data($data_simpan)){
      $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 587,
        'smtp_user' => 'ctugas10@gmail.com',
        'smtp_pass' => 'zxcvbnzxcvbn',
      );
      $this->load->library('email', $config);
      $email  = "ctugas10@gmail.com";
      $this->email->initialize($config);     
      $this->email->to($email);
      $this->email->subject("Konfirmasi Pembayaran No Order $_POST[no_pesan]");
      $this->email->message("
       <!DOCTYPE html>
        <html>
        <head>
        <title>Konfirmasi Pembayaran $_POST[no_pesan]</title>
        </head>
        <body>
            <p>Saya $nama Telah Membayar Pada $_POST[tgl_pesan] Dengan Isian Sebagai Berikut Ini :</p> 
            <ul>
             <li>No Order : $_POST[no_pesan]</li>
             <li>Nama Lengkap : $nama </li>
             <li>Alamat Email : $email_cust </li>
             <li>No Telepon : $_POST[no_tlp]</li>
             <li>Tanggal Transfer Pembayaran : $_POST[tgl]-$_POST[bln]-$_POST[thn]</li>
             <li>Tanggal Konfirmasi : $_POST[tgl_pesan]</li>
             <li>No. Rekening : $no_rek</li>
             <li>Jumlah Pembayaran : $_POST[jum_bayar]</li>
             <li>Pembayaran Dari Bank : $_POST[dari_bank]</li>
             <li>$_POST[catatan]</li>
            </ul>
        </body>
      </html>");                                         
     $this->email->from($email_cust, $nama);
     $mail = $this->email->send();
    $this->session->set_flashdata('msg', 'Data Berhasil Diterima');
    redirect('customer');
  }
  else{
    $this->session->set_flashdata('msg', 'Data Gagal Dimasukkan');
    redirect('konfirmasi');
	}
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