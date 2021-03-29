<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Midodaren extends CI_Controller
{

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
        $data['judul'] = 'Paket Wedding Rumah';
        $this->load->view('templates/header', $data);
        $this->load->view('midodaren/paketrumah');
        $this->load->view('templates/footer');
    }
    public function pakethotel()
    {
        $data['judul'] = 'Paket Wedding Rumah';
        $this->load->view('templates/header', $data);
        $this->load->view('midodaren/pakethotel');
        $this->load->view('templates/footer');
    }
}
