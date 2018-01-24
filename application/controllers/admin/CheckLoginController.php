<!-- quan ly dang nhap -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CheckLoginController extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('mcode');
    }
    public function login() {
        if ($this->mcode->admin_logged_in()) {
            redirect('admin', 'refresh');
        }
        if($this->input->post()) {
            if ($this->mcode->admin_login($this->input->post('username'), $this->input->post('password'))) {
                redirect('admin', 'refresh');
            }
            else {
                $this->session->set_flashdata('message','Sai tài khoản hoặc mật khẩu');
                redirect('admin/checklogincontroller/login', 'refresh');
            }
        }
        $this->load->helper('form');
        $this->render('admin/login_view','master');
    }
    public function logout() {
        $this->mcode->admin_logout();
        redirect('admin/checklogincontroller/login', 'refresh');
    }
}