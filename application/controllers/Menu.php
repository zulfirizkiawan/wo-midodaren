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


   public function submenu()
   {

      $data['title'] = 'Submenu Management';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();

      //Alias
      $this->load->model('Menu_model', 'menu');
      $data['subMenu'] = $this->menu->getSubMenu();
      // $data['subMenu'] = $this->db->get('user_sub_menu')->result_array();
      $data['menu'] = $this->db->get('user_menu')->result_array();

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('menu', 'Menu', 'required');
      $this->form_validation->set_rules('url', 'URL', 'required');
      $this->form_validation->set_rules('icon', 'Icon', 'required');

      if($this->form_validation->run() == false){
         $this->load->view('templates/header_ad', $data);
         $this->load->view('templates/sidebar_ad', $data);
         $this->load->view('templates/topbar_ad', $data);
         $this->load->view('menu/submenu', $data);
         $this->load->view('templates/footer_ad');

      }
   }
}
