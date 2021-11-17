<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $data['title'] = 'Home - TIE Forum Web App';
        $this->load->view('webuser/header', $data);
        // $this->load->view('sidebar', $data);
        $this->load->view('webuser/home', $data);
        $this->load->view('webuser/footer', $data);
    }
}
