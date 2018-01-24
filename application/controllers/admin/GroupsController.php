<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GroupsController extends Admin_Controller {
    function __construct() {
        parent:: __construct();
    //load thu vien upload 
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['remove_spaces'] = true;
        $config['file_ext_tolower'] = true;
        $this -> load -> library('upload', $config);
    }
    public function create() {
        $this -> data['button_title'] = 'Thêm nhóm';
    //upload hinh
        $pic_name = '';
        if ($this -> upload -> do_upload('picture')) {
            $pic_name = $this -> upload -> file_name;
        }
        if ($this -> input -> post()) {
            $model = [
                'title' => $this -> input -> post('title'),
                'picture' => $pic_name,
                'hide' => $this -> input -> post('hide'),
                'create_at' => time(),
            ];
            if ($this -> db -> insert('groups', $model)) {
                redirect('admin/groupscontroller/', 'refresh');
            }
            else {
                echo $this -> db -> error();
            }
        }
        else {
            $this -> render('admin/groups/create');
        }
    }
//ham sua thong tin
    public function edit($id = NULL) {
        $this -> data['button_title'] = 'Sửa nhóm';
        if ($this -> input -> post()) {
        //upload hinh                    
            $images = $this -> db -> query("select * from groups where id='$id'") -> row();
            $pic_name = $images -> picture;
            if ($this -> upload -> do_upload('picture')) {
                $pic_name = $this -> upload -> file_name;
                if (is_file('./uploads/'.$images -> picture)) {
                    unlink('./uploads/'.$images -> picture);
                }
            }
            $model = [
                'title' => $this -> input -> post('title'),
                'picture' => $pic_name,
                'hide' => $this -> input -> post('hide'),
                'update_at' => time(),
            ];
            if ($this -> db -> update('groups', $model, array('id' => $id))) {
                redirect('admin/groupscontroller', 'refresh');
            }
            else {
                echo $this -> db -> error();
            }
        }
        else {
            $this -> data['items'] = $this -> db -> query("select * from groups where id='$id'") -> row();
            $this -> render('admin/groups/edit');
        }
    }
//ham xoa du lieu
    public function delete ($id = NULL) {
        $query = $this -> db -> query("select * from groups where id = '$id'") -> row();
    //xoa hinh
        if (is_file('./uploads/'.$query -> picture)) {
            unlink('./uploads/'.$query -> picture);
        }
        $this -> db -> delete ('groups', array('id' => $id));
        redirect('admin/groupscontroller', 'refresh');
    }


    public function index() {
        $this -> data['model'] = $this -> db -> query("select * from groups order by id asc") -> result();
        $this -> render('admin/groups/list');
    }
}