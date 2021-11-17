<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin', 'admin');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'User Management - TIE Forum Web App';
        $data['user'] = $this->admin->getUser();
        $this->load->view('template/header', $data);
        $this->load->view('users/data', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {

        $data['title'] = 'Add User - TIE Forum Web App';
        $data['user'] = $this->admin->getUser();
        $this->load->view('template/header', $data);
        $this->load->view('users/add', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['dt'] = $this->admin->getUserEdit($where, 'users')->result();
        $data['title'] = 'Edit User';
        $data['user'] = $this->admin->getUser();
        $this->load->view('template/header', $data);
        $this->load->view('users/edit', $data);
        $this->load->view('template/footer');
    }

    public function add_user()
    {
        $this->form_validation->set_rules("username", "Username", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required|min_length[2]");
        $this->form_validation->set_rules("conf_password", "Password Confirm", "trim|required|matches[password]");
        if ($this->form_validation->run()) {
            $data = array(
                'username' => $_POST['username'],
                'password' => $_POST['password']
            );
            if ($this->db->insert('users', $data)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Berhasil Ditambahkan!
			</div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Data Gagal Ditambahkan!
			</div>');
            }
            redirect('users');
        } else {
            $this->add();
        }
    }

    public function edit_user()
    {
        $data = array(
            'id' => $_POST['id'],
            'username' => $_POST['username']
        );
        $this->db->where('id', $_POST['id']);
        if ($this->db->update('users', $data)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Berhasil Diubah!
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Data Gagal Diubah!
			</div>');
        }
        redirect('users');
    }

    public function delete_user($id)
    {
        $where = array('id' => $id);
        $hapus = $this->admin->delete_user($where, 'users');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
		Data Berhasil Dihapus!
		</div>');
        redirect('users');
    }
}
