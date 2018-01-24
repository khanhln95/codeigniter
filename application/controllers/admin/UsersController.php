<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UsersController extends Admin_Controller {
    function __construct() {
        parent:: __construct();
        $config['upload_path'] = './uploads/';//chon duong dan
        $config['allowed_types'] = 'gif|jpg|png';//dinh dang file cho phep upload
        $config['remove_spaces'] = true;
        $config['file_ext_tolower'] = true;
        $this -> load -> library('upload', $config);
    }


    public function create() {
        $this -> data['button_title'] = 'Thêm users';
        if ($this -> input -> post()) {
            //upload hinh
            $pic_name = '';
            if ($this -> upload -> do_upload('picture')) {
                $pic_name = $this -> upload -> file_name;
            }
            $model = [
                'hide' => $this -> mcode -> clean($this -> input -> post('hide')),
                'picture' => $pic_name,
                'username' => $this -> mcode -> username($this -> mcode -> clean($this -> input -> post('username'))),
                // user_token và pass_token kiểm tra đăng nhập ta kiểm tra cả tên đăng nhập và mật khẩu 
                // đã mã hóa rồi so sánh với trong database, trành tình trang bị tấn công bằng SQL Injection
                'user_token' => $this -> mcode -> hash($this -> mcode -> clean($this -> input -> post('username'))),
                'pass_token' => $this -> mcode -> hash($this -> mcode -> clean($this -> input -> post('password'))),
                'group_id' => $this -> mcode -> clean($this -> input -> post('group_id')),
                'name' => $this -> mcode -> clean($this -> input -> post('name')),
                'email' => $this -> mcode -> clean($this -> input -> post('email')),
                'phone' => $this -> mcode -> clean($this -> input -> post('phone')),
                'address' => $this -> mcode -> clean($this -> input -> post('address')),
                'birthday' => strtotime($this -> input -> post('day')."-".$this -> input -> post('month')."-".$this -> input -> post('year')),
                'gender' => $this -> mcode -> clean($this -> input -> post('gender')),
                'create_at' => time(),
            ];
            //insert thong tin user vao db
            if ($this -> db -> insert('users', $model)) {
                redirect('admin/userscontroller/', 'refresh');
            }
            else {
                echo $this -> db -> error();
            }
        }
        else {
            // id_user đễ check tên tài khoản, email đã tồn tại hay chưa ở phần dưới
            $this -> data['id_user'] = "";
            //Biến data['list_group'] là liệt kê các nhóm được tạo lấy từ table groups
            $this -> data['list_group'] = $this -> db -> query("select * from groups where hide=1 order by id asc") -> result();
            $this -> render('admin/users/create');
        }
    }
    public function check_username() {
        $id_user = $this->input->post('id_user');
        $username = $this->mcode->username($this->input->post('username'));
        $check  =  $this->db-> query("select id from users where username='$username' and  id !='$id_user'")->num_rows();
        if ($check > 0) {
            echo "false";
        }
        else {
            echo "true";
        }
    }
    public function check_email() { 
        $id_user= $this->input->post('id_user');
        $email = $this->input->post('email');
        $check = $this -> db -> query("select id from users where email='$email' and id!= '$id_user'") -> num_rows();
        if ($check > 0) {
            echo "false";
        }
        else {
            echo "true";
        }
    }

    //ham chinh sua thong tin user
    public function edit($id = NULL) {
        $this->data['button_title'] = 'Sửa users';
        if($this->input->post()) {
            //upload hinh                    
            $query = $this->db->query("select * from users where id='$id'")->row();                
            $pic_name=$query->picture;
            if($this->upload->do_upload('picture')) {
                $pic_name = $this->upload->file_name;
                if(is_file('./uploads/'.$query->picture)) {
                    unlink('./uploads/'.$query->picture);
                }
            }
            $pass_token = $query->pass_token;
            if($this->input->post('password')!=$query->pass_token) {
                $pass_token = $this->mcode->hash($this->mcode->clean($this->input->post('password')));
            }
            $model = [
                'hide' => $this->mcode->clean($this->input->post('hide')),
                'picture' => $pic_name,
                'username' => $this->mcode->username($this->mcode->clean($this->input->post('username'))),
                'user_token' => $this->mcode->hash($this->mcode->clean($this->input->post('username'))),
                'pass_token' => $pass_token,
                'group_id' => $this->mcode->clean($this->input->post('group_id')),
                'name' => $this->mcode->clean($this->input->post('name')),
                'email' => $this->mcode->clean($this->input->post('email')),
                'phone' => $this->mcode->clean($this->input->post('phone')),
                'address' => $this->mcode->clean($this->input->post('address')),
                'birthday' => strtotime($this->input->post('day')."-".$this->input->post('month')."-".$this->input->post('year')),
                'gender' => $this->mcode->clean($this->input->post('gender')),
            ];
            if($this->db->update('users', $model, array('id' => $id))) {
                redirect('admin/userscontroller','refresh');
            }
            else {
                echo $this->db->error();
            }
        }
        else {
            $this->data['id_user'] = $id;
            $this->data['list_group'] = $this->db->query("select * from groups where hide=1 order by id asc")->result();
            $this->data['items'] = $this->db->query("select * from users where id='$id'")->row();
            $this->render('admin/users/edit');
        }
    }

    //ham xoa user
    public function delete($id = NULL) {
        $query = $this->db->query("select * from users where id = '$id'")->row();
        //xoa hinh
        if(is_file('./uploads/'.$query->picture)) {
            unlink('./uploads/'.$query->picture);
        }
        $this->db->delete('users', array('id' => $id));
        redirect('admin/userscontroller','refresh');
    }
    public function index() {
        $this -> data['model'] = $this -> db -> query("select * from users order by id asc") -> result();
        $this -> render('admin/users/list');
    }
   
}
?>