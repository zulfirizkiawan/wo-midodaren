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
        // echo 'selamat datang ' . $data['user']['name'];
        $data['pesanans'] = $this->Admin_model->pesanan()->result_array();
        // $data['pesanan'] = $this->db->get('tbl_detail_order')->result_array();
        //  $this->form_validation->set_rules('index', 'Admin', 'required');

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

    // public function transaksi()
    // {
    //     $data['title'] = 'ManajemenK';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();


    //     $this->load->view('templates/header_ad', $data);
    //     $this->load->view('templates/sidebar_ad', $data);
    //     $this->load->view('templates/topbar_ad', $data);
    //     $this->load->view('admin/transaksi', $data);
    //     $this->load->view('templates/footer_ad',);
    // }

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
}
