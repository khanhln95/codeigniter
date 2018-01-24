<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {
    public $tb_name = "products";
    public $id_products = "id";
    public function __construct(){
        $this->load->database();
    }
    //lấy thông tin sp trong db và hiển thị lên giao diện quản lý
    public function getData(){
        $this->db->from($this->tb_name);
        $this->db->order_by("$this->id_products asc"); 
        $query = $this->db->get(); 
        return $query->result();
    }

    //lấy thông tin của 1 sản phẩm ra để chỉnh sửa hoặc xoá khỏi db
    public function getSingleData($id){
        $this->db->where($this->id_products, $id);
        $query = $this->db->get($this->tb_name);
        return $query->row();
    }
    //thêm sản phẩm mới
    public function create($model){
        $this -> db -> insert($this->tb_name, $model);
    }

    //chỉnh sửa thông tin về sản phẩm
    public function edit($id, $data){
        $this->db->where($this->id_products, $id);
        $this->db->update($this->tb_name, $data);
    }

    //xoá thông tin sản phẩm
    public function delete($id=NULL){
        $this->db->where($this->id_products, $id);
        $this->db->delete($this->tb_name);
    }

    //đưa sản phẩm ra HTML
    public function display($id){
        $this->db->where($this->id_products, $id);
        $query = $this->db->get($this->tb_name);
        return $query->result();
    }

}
?>