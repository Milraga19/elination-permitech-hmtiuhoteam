<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Discuss extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(["Discuss_model"]));
    }
    public function index()
    {
        // echo "CONTOH CONTROLLER";
        $data['title'] = 'Discuss Topic List - TIE Forum Web App';

        $data['id'] = $this->db->get('tags')->result();
        $data['name'] = $this->db->get('tags')->result();
        $data['rows'] = $this->Discuss_model->getDiscuss()->result();
        // var_dump($data);
        // die;
        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('discuss_list', $data);
        $this->load->view('footer', $data);
    }

    public function viewData()
    {
        $this->db->get('discuss')->result();
    }

    public function tambah_discuss()
    {
        $data['id'] = $this->db->get('tags')->result();
        $data['name'] = $this->db->get('tags')->result();
        $data['rows'] = $this->Discuss_model->getDiscuss()->result();

        $this->form_validation->set_rules('user_id', 'User Id', 'required');
        $this->form_validation->set_rules('discuss_topic', 'Discuss Topic', 'required');
        $this->form_validation->set_rules('tag_id', 'Tag Id', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('header', $data);
            $this->load->view('sidebar', $data);
            $this->load->view('discuss_list', $data);
            $this->load->view('footer', $data);
        } else {
            $data = array(
                'user_id' => $this->input->post('user_id', true),
                'discuss_topic' => $this->input->post('discuss_topic', true),
                'tag_id' => $this->input->post('tag_id', true),
                'status' => $this->input->post('status', true),
            );
            $this->db->insert('discuss', $data);
            $this->session->set_flashdata("insert", "<div class='alert alert-success' role='alert'>
			Topik Baru telah ditambahkan.
		  </div>");
            redirect('discuss');
        }
    }

    public function hapus_discuss($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('discuss');
        $this->session->set_flashdata('delete', "<div class='alert alert-success' role='alert'>
        Topik diskusi sudah dihapus.
      </div>");
        redirect('discuss');
    }
}
