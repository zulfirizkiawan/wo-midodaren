<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('keranjang_model');
	}

	public function index()
	{

		$data['title'] = 'Pemesanan paket';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		// echo 'selamat datang ' . $data['user']['name'];

		$kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['produk'] = $this->keranjang_model->get_produk_kategori($kategori);
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
  
		// $data['menu'] = $this->db->get('Pemesanan')->result_array();
  
		// $this->form_validation->set_rules('menu', 'Menu', 'required');
  
		if ($this->form_validation->run() == false) {
		   $this->load->view('templates/header_ad', $data);
		   $this->load->view('templates/sidebar_ad', $data);
		   $this->load->view('templates/topbar_ad', $data);
		   $this->load->view('pemesanan/list_produk',$data);
		   $this->load->view('templates/footer_ad');
		} else {
		   $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
		   $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Menu Added! </div>');
		   redirect('pemesanan');
		}
	 }



	public function tampil_cart()
	{
		$data['title'] = 'Pemesanan paket';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
		$this->load->view('pemesanan/tampil_cart',$data);
		$this->load->view('templates/footer_ad');
	}
	
	public function check_out()
	{
		$data['title'] = 'Pemesanan paket';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
		$this->load->view('pemesanan/check_out',$data);
		$this->load->view('templates/footer_ad');
	}
	
	public function detail_produk()
	{
		$data['title'] = 'Pemesanan paket';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$id=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$data['detail'] = $this->keranjang_model->get_produk_id($id)->row_array();
		$this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
		$this->load->view('pemesanan/detail_produk',$data);
		$this->load->view('templates/footer_ad');
	}
	
	
	function tambah()
	{
		$data_produk= array('id' => $this->input->post('id'),
							 'name' => $this->input->post('nama'),
							 'price' => $this->input->post('harga'),
							 'gambar' => $this->input->post('gambar'),
							 'qty' =>$this->input->post('qty')
							);
		$this->cart->insert($data_produk);
		redirect('pemesanan');
	}

	function hapus($rowid) 
	{
		if ($rowid=="all")
			{
				$this->cart->destroy();
			}
		else
			{
				$data = array('rowid' => $rowid,
			  				  'qty' =>0);
				$this->cart->update($data);
			}
		redirect('pemesanan/tampil_cart');
	}

	function ubah_cart()
	{
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$gambar = $cart['gambar'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array('rowid' => $rowid,
							'price' => $price,
							'gambar' => $gambar,
							'amount' => $amount,
							'qty' => $qty);
			$this->cart->update($data);
		}
		redirect('pemesanan/tampil_cart');
	}

	public function proses_order()
	{
		//-------------------------Input data pelanggan--------------------------
		$data_pelanggan = array('nama' => $this->input->post('nama'),
							'email' => $this->input->post('email'),
							'alamat' => $this->input->post('alamat'),
							'telp' => $this->input->post('telp'));
		$id_pelanggan = $this->keranjang_model->tambah_pelanggan($data_pelanggan);
		//-------------------------Input data order------------------------------
		$data_order = array('tanggal' => date('Y-m-d'),
					   		'pelanggan' => $id_pelanggan);
		$id_order = $this->keranjang_model->tambah_order($data_order);
		//-------------------------Input data detail order-----------------------		
		if ($cart = $this->cart->contents())
			{
				foreach ($cart as $item)
					{
						$data_detail = array('order_id' =>$id_order,
										'produk' => $item['id'],
										'qty' => $item['qty'],
										'harga' => $item['price']);			
						$proses = $this->keranjang_model->tambah_detail_order($data_detail);
					}
			}
		//-------------------------Hapus shopping cart--------------------------		
		$this->cart->destroy();
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
		$this->load->view('pemesanan/sukses',$data);
		$this->load->view('templates/footer_ad');
	}
}
?>