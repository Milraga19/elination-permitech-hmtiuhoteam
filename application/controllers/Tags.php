<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tags extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        // echo "CONTOH CONTROLLER";
        $data['title'] = 'Tag List - TIE Forum Web App';

        $data['id'] = $this->db->get('tags')->result();
        $data['name'] = $this->db->get('tags')->result();

        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('tag_list', $data);
        $this->load->view('footer', $data);
    }

    public function viewData()
    {
        $this->db->get('tags')->result();
    }

    public function tambah_tag()
    {
        $data['id'] = $this->db->get('tags')->result();
        $data['name'] = $this->db->get('tags')->result();

        $this->form_validation->set_rules('name', 'Tag Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('header', $data);
            $this->load->view('sidebar', $data);
            $this->load->view('tag_list', $data);
            $this->load->view('footer', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name', true)
            );
            $this->db->insert('tags', $data);
            $this->session->set_flashdata("insert", "<div class='alert alert-success' role='alert'>
			Tag Baru telah ditambahkan.
		  </div>");
            redirect('tags');
        }
    }

    public function hapus_tag($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('tags');
        $this->session->set_flashdata('delete', "<div class='alert alert-success' role='alert'>
        Tag sudah dihapus.
      </div>");
        redirect('tags');
    }

    public function edit_tag($id)
    {
        $data['id'] = $this->db->get('tags')->result();
        $data['name'] = $this->db->get('tags')->result();
        $this->form_validation->set_rules('name', 'Tag Name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('header', $data);
            $this->load->view('sidebar', $data);
            $this->load->view('tag_list', $data);
            $this->load->view('footer', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name', true)
            );
            $where = array('id' => $id);
            $this->db->where($where);
            $this->db->update('tags', $data, $where);
            $this->session->set_flashdata("update", "<div class='alert alert-success' role='alert'>
			Tag telah diupdate.
		  </div>");
            redirect('tags');
        }
    }
}
