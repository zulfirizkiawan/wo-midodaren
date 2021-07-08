<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('Keranjang_model');
	}

	public function index()
	{

		$data['title'] = 'Pemesanan paket';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		// echo 'selamat datang ' . $data['user']['name'];

		$kategori = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data['produk'] = $this->Keranjang_model->get_produk_kategori($kategori);
		$data['kategori'] = $this->Keranjang_model->get_kategori_all();
		

	

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header_ad', $data);
			$this->load->view('templates/sidebar_ad', $data);
			$this->load->view('templates/topbar_ad', $data);
			$this->load->view('pemesanan/list_produk', $data);
			$this->load->view('templates/footer_ad');
		} else {
			redirect('pemesanan');
		}
	}



	public function tampil_cart()
	{
		$data['title'] = 'Pemesanan paket';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kategori'] = $this->Keranjang_model->get_kategori_all();
		$this->load->view('templates/header_ad', $data);
		$this->load->view('templates/sidebar_ad', $data);
		$this->load->view('templates/topbar_ad', $data);
		$this->load->view('pemesanan/tampil_cart', $data);
		$this->load->view('templates/footer_ad');
	}

	public function check_out()
	{
		$data['title'] = 'Pemesanan paket';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kategori'] = $this->Keranjang_model->get_kategori_all();
		$this->load->view('templates/header_ad', $data);
		$this->load->view('templates/sidebar_ad', $data);
		$this->load->view('templates/topbar_ad', $data);
		$this->load->view('pemesanan/check_out', $data);
		$this->load->view('templates/footer_ad');
	}

	public function detail_produk()
	{
		$data['title'] = 'Pemesanan paket';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['kategori'] = $this->Keranjang_model->get_kategori_all();
		$data['detail'] = $this->Keranjang_model->get_produk_id($id)->row_array();
		$this->load->view('templates/header_ad', $data);
		$this->load->view('templates/sidebar_ad', $data);
		$this->load->view('templates/topbar_ad', $data);
		$this->load->view('pemesanan/detail_produk', $data);
		$this->load->view('templates/footer_ad');
	}


	function tambah()
	{
		$data_produk = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('nama'),
			'price' => $this->input->post('harga'),
			'gambar' => $this->input->post('gambar'),
			'qty' => $this->input->post('qty')
		);
		$this->cart->insert($data_produk);
		redirect('pemesanan');
	}

	function hapus($rowid)
	{
		if ($rowid == "all") {
			$this->cart->destroy();
		} else {
			$data = array(
				'rowid' => $rowid,
				'qty' => 0
			);
			$this->cart->update($data);
		}
		redirect('pemesanan/tampil_cart');
	}

	function ubah_cart()
	{
		$data['title'] = 'Pemesanan paket';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$cart_info = $_POST['cart'];
		foreach ($cart_info as $id => $cart) {
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$gambar = $cart['gambar'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array(
				'rowid' => $rowid,
				'price' => $price,
				'gambar' => $gambar,
				'amount' => $amount,
				'qty' => $qty
			);
			$this->cart->update($data);
		}
		redirect('pemesanan/tampil_cart');
	}

	public function proses_order()
	{
		$data['title'] = 'Pemesanan paket';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		//-------------------------Input data pelanggan--------------------------
		$data_pelanggan = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp')
		);
		$id_pelanggan = $this->Keranjang_model->tambah_pelanggan($data_pelanggan);
		//-------------------------Input data order------------------------------
		$data_order = array(
			'tanggal' => date('Y-m-d'),
			'pelanggan' => $id_pelanggan
		);
		$id_order = $this->Keranjang_model->tambah_order($data_order);
		//-------------------------Input data detail order-----------------------		
		if ($cart = $this->cart->contents()) {
			foreach ($cart as $item) {
				$data_detail = array(
					'order_id' => $id_order,
					'produk' => $item['id'],
					'qty' => $item['qty'],
					'harga' => $item['price']
				);
				$proses = $this->Keranjang_model->tambah_detail_order($data_detail);
			}
		}
		//-------------------------Hapus shopping cart--------------------------		
		$this->cart->destroy();
		$data['kategori'] = $this->Keranjang_model->get_kategori_all();
		$this->load->view('templates/header_ad', $data);
		$this->load->view('templates/sidebar_ad', $data);
		$this->load->view('templates/topbar_ad', $data);
		$this->load->view('pemesanan/sukses', $data);
		$this->load->view('templates/footer_ad');
	}

	public function pembayaran()
	{
		$data['title'] = 'Pembayaran';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header_ad', $data);
		$this->load->view('templates/sidebar_ad', $data);
		$this->load->view('templates/topbar_ad', $data);
		$this->load->view('pemesanan/pembayaran', $data);
		$this->load->view('templates/footer_ad');
	}


	public function konfirmasi_pembayaran()
	{
		$this->form_validation->set_rules('tanggal_bayar', 'tanggal_bayar', 'required');  // tanggal_bayar
		$this->form_validation->set_rules('bank_anda', 'bank_anda', 'required'); // bank_anda
		$this->form_validation->set_rules('no_rekening_anda', 'no_rekening_anda', 'required'); // no_rekening_anda
		$this->form_validation->set_rules('nama_rekening_anda', 'nama_rekening_anda', 'required'); // nama_rekening_anda
		$this->form_validation->set_rules('bank_midodaren', 'bank_midodaren', 'required'); // bank_midodaren
		$this->form_validation->set_rules('nominal_ditransfer', 'nominal_ditransfer', 'required'); // nominal_ditransfer
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required'); // keterangan
		// foto

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Pembayaran';
			$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$this->load->view('templates/header_ad', $data);
			$this->load->view('templates/sidebar_ad', $data);
			$this->load->view('templates/topbar_ad', $data);
			$this->load->view('pemesanan/pembayaran', $data);
			$this->load->view('templates/footer_ad');
		} else {
			$config['upload_path']      = './assets/img/bukti/';
			$config['allowed_types']    = 'gif|jpg|png|jpeg';
			$config['max_width']        = 5120;
			$config['max_height']       = 5300;
			$config['max_size']         = 5300;
			$this->upload->initialize($config);
			$this->load->library('upload', $config);

			
			$id_user = $this->input->post('id_user');
			$tanggal_bayar = $this->input->post('tanggal_bayar');
			$bank_anda = $this->input->post('bank_anda');
			$no_rekening_anda = $this->input->post('no_rekening_anda');
			$nama_rekening_anda = $this->input->post('nama_rekening_anda');
			$bank_midodaren = $this->input->post('bank_midodaren');
			$nominal_ditransfer = $this->input->post('nominal_ditransfer');
			$keterangan = $this->input->post('keterangan');

			// var_dump($id_user, $tanggal_bayar, $bank_anda, 
			// $no_rekening_anda, $nama_rekening_anda, $bank_midodaren, 
			// $nominal_ditransfer, $keterangan);
			// die;

			if (!$this->upload->do_upload('foto')) { //sesuai dengan name pada form 
				// if (empty($_FILES['gambar']['name'])) {
				$this->form_validation->set_rules('foto', 'foto', 'required');                            // 9
				echo "gagal upload";
			} else {

				$file = $this->upload->data();
				$foto = $file['file_name'];

				$data = [
					'id_user' => $id_user,
					'tanggal_bayar' => $tanggal_bayar,
					'bank_anda' => $bank_anda,
					'no_rekening_anda' => $no_rekening_anda,
					'nama_rekening_anda' => $nama_rekening_anda,
					'bank_midodaren' => $bank_midodaren,
					'nominal_ditransfer' => $nominal_ditransfer,
					'keterangan' => $keterangan,
					'foto' => $foto,
				];

				$this->db->insert('pembayaran', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bukti Pembayaran Terkirim!</div>');
				redirect('pemesanan/pembayaran');
			}
		}
	}

	public function bukti()
	{
		$data['title'] = 'Bukti Pembayaran';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		// $this->Keranjang_model->bukti_pembayaran($data['user']);
		$data['mbukti'] = $this->Keranjang_model->bukti_pembayaran($data['user'])->result_array();
		
		

		$this->load->view('templates/header_ad', $data);
		$this->load->view('templates/sidebar_ad', $data);
		$this->load->view('templates/topbar_ad', $data);
		$this->load->view('pemesanan/bukti', $data);
		$this->load->view('templates/footer_ad');
	}

} // akhir
