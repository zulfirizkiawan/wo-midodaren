<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
   public function index()
   {
      $data['title'] = 'Menu Management';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
      // echo 'selamat datang ' . $data['user']['name'];

      $data['menu'] = $this->db->get('user_menu')->result_array();

      $this->form_validation->set_rules('menu', 'Menu', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header_ad', $data);
         $this->load->view('templates/sidebar_ad', $data);
         $this->load->view('templates/topbar_ad', $data);
         $this->load->view('menu/index', $data);
         $this->load->view('templates/footer_ad',);
      } else {
         $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Menu Added! </div>');
         redirect('menu');
      }
   }


   // public function addMenu()
   // {


   // }
}
