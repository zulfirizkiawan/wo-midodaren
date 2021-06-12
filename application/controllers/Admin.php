<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['jumlah_transaksi'] = $this->Admin_model->jumlah_transaksi();
        $data['jumlah_customer'] = $this->Admin_model->jumlah_customer();
        // $data['jumlah_paket_rumah'] = $this->Admin_model->jumlah_paket_rumah();
        // $data['jumlah_paket_hotel'] = $this->Admin_model->jumlah_paket_hotel();

        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer_ad');
    }

    public function paket()
    {
        $data['title'] = 'paket';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'selamat datang ' . $data['user']['name'];

        $data['userp'] = $this->db->get('tbl_produk')->result_array();

        $this->form_validation->set_rules('paket', 'User', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_ad', $data);
            $this->load->view('templates/sidebar_ad', $data);
            $this->load->view('templates/topbar_ad', $data);
            $this->load->view('admin/paket', $data);
            $this->load->view('templates/footer_ad',);
        } else {
            $this->db->insert('tbl_paket', ['userp' => $this->input->post('paket')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Menu Added! </div>');
            redirect('admin/paket');
        }
    }

    public function transaksi()
    {
        $data['title'] = 'DaftarPemesan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pesanans'] = $this->Admin_model->pesanan()->result_array();
        
        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('admin/transaksi', $data);
        
    }
    
    public function karyawan()
    {
        $data['title'] = 'Data karyawan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['karyawans'] = $this->Admin_model->karyawans()->result_array();
        
        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('admin/karyawan', $data);
        $this->load->view('templates/footer_ad',);
    }

    public function regis()
    {
                    
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registerd'

        ]);
        // is_unique[user.email]
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password to short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pendaftaran Midodaren';
            $this->load->view('templates/auth_header_2', $data);
            $this->load->view('admin/regis');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Mendaftar</div>');
            redirect('admin/karyawan');
        }
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'selamat datang ' . $data['user']['name'];


        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer_ad');
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        // $data['user'] = $this->user->getUserData();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        // $data['role'] = $this->admin->getUserRoleById($role_id);
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();


        $this->db->where('id !=', 1);
        // $data['menu'] = $this->menu->getUserMenuAll();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer_ad');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Access Changed! </div>');
    }

    public function editrole($role_id)
    {
        $data['title'] = 'Edit Role';
        $data['user'] = $this->user->getUserData();
        $data['role'] = $this->admin->getUserRoleById($role_id);;

        $this->form_validation->set_rules('role', 'Role Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-role', $data);
            $this->load->view('templates/footer');
        } else {
            $role_name = $this->input->post('role');
            $user_role = $this->db->get_where('user_role', ['role' => $role_name]);
            if ($user_role->num_rows() < 1) {
                $this->db->set('role', $role_name);
                $this->db->where('id', $role_id);
                $this->db->update('user_role');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Role Success!</div>');
                redirect('admin/role/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This role name is exist or same!</div>');
                redirect('admin/editrole/' . $role_id);
            }
        }
    }

    public function deleterole($role_id)
    {
        $role = $this->admin->getUserRoleById($role_id);

        $this->db->delete('user_role', ['id' => $role_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $role['role'] . ' role is deleted!</div>');
        redirect('admin/role');
    }

    public function submenu()
   {

      $data['title'] = 'Submenu Management';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();

      //Alias
    //   $this->load->model('Admin_model');
    //   $data['subMenu'] = $this->admin->getSubMenu();
      // $data['subMenu'] = $this->db->get('user_sub_menu')->result_array();
      $data['kategori'] = $this->db->get('tbl_kategori')->result_array();

    //   $this->form_validation->set_rules('title', 'Title', 'required');
    //   $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    //   $this->form_validation->set_rules('url', 'URL', 'required');
    //   $this->form_validation->set_rules('icon', 'icon', 'required');

    //   if ($this->form_validation->run() == false) {
         $this->load->view('templates/header_ad', $data);
         $this->load->view('templates/sidebar_ad', $data);
         $this->load->view('templates/topbar_ad', $data);
         $this->load->view('admin/paket', $data);
         $this->load->view('templates/footer_ad');
    //   } else {
    //      $data = [
    //         'title' => $this->input->post('title'),
    //         'menu_id' => $this->input->post('menu_id'),
    //         'url  ' => $this->input->post('url'),
    //         'icon' => $this->input->post('icon'),
    //         'is_active' => $this->input->post('is_active')
    //      ];
    //      $this->db->insert('user_sub_menu', $data);
    //      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Submenu Added! </div>');
    //      redirect('menu/submenu');
    //   }
   }

}
