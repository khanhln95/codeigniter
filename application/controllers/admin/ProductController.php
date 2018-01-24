<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProductController extends Admin_Controller {
    function __construct() {
        parent:: __construct();
        $config['upload_path'] = './uploads/';//chon duong dan
        $config['allowed_types'] = 'gif|jpg|png';//dinh dang file cho phep upload
        $config['remove_spaces'] = true;
        $config['file_ext_tolower'] = true;
        $this->load->library('upload', $config);
        $this->load->model('products_model');
        $this->load->helper('form', 'url');
    }

    

    public function create() {
        $this->data['button_title'] = 'Thêm Sản phẩm';
        if ($this->input->post()) {
        //upload hinh luu vao trong thu muc upload
            $pic_name = '';
            if ($this -> upload->do_upload('picture')) {
                $pic_name = $this->upload->file_name;
            }
        //$model chứa thông tin về sản phảm
            $data = [
                'picture' => $pic_name,
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
            ];
            $this->products_model->create($data);
            redirect('admin/productcontroller/', 'refresh');
        }
        else {
            $this->data['id_product'] = "";
            $this->render('admin/products/create');
        }
    }

    //hàm chỉnh sửa thông tin sản phẩm
    public function edit($id = NULL) {
        $this->data['button_title'] = 'Xác nhận';

        if($this->input->post()) {
            $pic_name =  $this->products_model->getSingleData($id)->picture;
        //nếu update hình ảnh mới thì thay thế và xoá ảnh cũ trong thư mục uploads
            if($this->upload->do_upload('picture')) {
                $pic_name = $this->upload->file_name;
                if(is_file('./uploads/'.$pic_name)) {
                    unlink('./uploads/'.$pic_name);
                }
            }
            $data = [
               'picture' => $pic_name,
               'name' => $this->input->post('name'),
               'description' => $this->input->post('description'),
               'price' => $this->input->post('price'),
           ];
           $this->products_model->edit($id, $data);               
           redirect('admin/productcontroller','refresh');
       }
       else {
           $this->data['id_product'] = $id;
           $this->data['items'] = $this->products_model->getSingleData($id);
           $this->render('admin/products/edit');
       }
   }

//ham xoa sản phẩm
   public function delete($id = NULL) {
    $pic_name =  $this->products_model->getSingleData($id)->picture;
    if(is_file('./uploads/'.$pic_name)) {
        unlink('./uploads/'.$pic_name);
    }
    $this->products_model->delete($id);
    redirect('admin/productcontroller','refresh');
}

public function index() {
    $this -> data['data'] = $this->products_model->getData();
    $this -> render('admin/products/list');
}
public function display($id=NULL){
   $this->data['result'] = $this->products_model->display($id); 
   $this->load->view('admin/products/layout', $this->data);
}



}
?>