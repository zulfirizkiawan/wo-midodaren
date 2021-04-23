<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'selamat datang ' . $data['user']['name'];

        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer_ad',);
    }

    public function paket()
   {
      $data['title'] = 'paket';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
      // echo 'selamat datang ' . $data['user']['name'];

      $data['userp'] = $this->db->get('paket')->result_array();

      $this->form_validation->set_rules('paket', 'User', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header_ad', $data);
         $this->load->view('templates/sidebar_ad', $data);
         $this->load->view('templates/topbar_ad', $data);
         $this->load->view('user/paket', $data);
         $this->load->view('templates/footer_ad',);
      } else {
         $this->db->insert('paket', ['userp' => $this->input->post('paket')]);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Menu Added! </div>');
         redirect('user/paket');
      }
   }

}
