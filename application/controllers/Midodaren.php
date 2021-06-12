<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Midodaren extends CI_Controller
{
    public function __construct()
	{	
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('keranjang_model');
	}
 
    public function index()
    {
        $data['judul'] = 'Home';
        $this->load->view('templates/header', $data);
        $this->load->view('midodaren/index');
        $this->load->view('templates/footer');
    }
    public function layanan()
    {
        $data['judul'] = 'Layanan';
        $this->load->view('templates/header', $data);
        $this->load->view('midodaren/layanan');
        $this->load->view('templates/footer');
    }
    public function galeri()
    {
        $data['judul'] = 'Galeri';
        $this->load->view('templates/header', $data);
        $this->load->view('midodaren/galeri');
        $this->load->view('templates/footer');
    }
    public function tentang()
    {
        $data['judul'] = 'Tentang Kami';
        $this->load->view('templates/header', $data);
        $this->load->view('midodaren/tentang');
        $this->load->view('templates/footer');
    }
    public function hubungi()
    {
        $data['judul'] = 'Hubungi Kami';
        $this->load->view('templates/header', $data);
        $this->load->view('midodaren/hubungi');
        $this->load->view('templates/footer');
    }

    public function paketrumah()
    {

        $kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['produk'] = $this->keranjang_model->get_produk_kategori($kategori);
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
  
        $data['judul'] = 'Paket Wedding Rumah';
        $this->load->view('templates/header', $data);
        $this->load->view('midodaren/paketrumah');
        $this->load->view('templates/footer');
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

    public function pakethotel()
    {
        $data['judul'] = 'Paket Wedding Rumah';
        $this->load->view('templates/header', $data);
        $this->load->view('midodaren/pakethotel');
        $this->load->view('templates/footer');
    }
}
