<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    protected $data = array();
    //load sẵn thư viện session và kết nối database.
	function __construct() {
        parent:: __construct();
        $this -> load -> helper('url');
        $this -> load -> library('session');
        $this -> load -> database();
        
    }
    protected function render($the_view = NULL, $template = 'master') {
        if ($template == 'json' || $this -> input -> is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode($this -> data);
        }
        elseif(is_null($template)) {
            $this -> load -> view($the_view, $this -> data);
        }
            else {
            $this -> data['the_view_content'] = (is_null($the_view)) ? '' : $this -> load -> view($the_view, $this -> data, TRUE);
            $this -> load -> view('layout_admin/'.$template, $this -> data);
        }
    }
    protected function view($the_view = NULL, $template = 'master') {
        if ($template == 'json' || $this -> input -> is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode($this -> data);
        }
        elseif(is_null($template)) {
            $this -> load -> view($the_view, $this -> data);
        }
            else {
            $this -> data['the_view_content'] = (is_null($the_view)) ? '' : $this -> load -> view($the_view, $this -> data, TRUE);
            $this -> load -> view('layout_web/'.$template, $this -> data);
        }
    }
}
class Admin_Controller extends MY_Controller {
    function __construct() {
        parent:: __construct();
        $this -> load -> helper('form');//load helper cua CodeIgniter de su dung ham form_open
        $this -> load -> model('mcode');//load thu vien models ten la mcode
        //luon yeu cau dang nhap truoc khi su dung trang
        if (!$this -> mcode -> admin_logged_in()) {
            redirect('admin/checklogincontroller/login', 'refresh');
        }
}
protected function render($the_view = NULL, $template = 'master') {
    parent:: render($the_view, $template);
}
}
class Public_Controller extends MY_Controller {
    function __construct() {
    parent:: __construct();
}
}