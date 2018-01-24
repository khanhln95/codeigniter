<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {
    public $tb_name = "products";
    public $id_pro = "id";
    public function __construct(){
        $this->load->database();
    }

    public function getData(){
        $this->db->from($this->tb_name);
        $this->db->order_by("$this->id_pro asc");
        $query = $this->db->get(); 
        return $query->result();
    }
    public function getSingleData($id){
        $this->db->where($this->id_pro, $id);
        $query = $this->db->get($this->tb_name);
        return $query;
    }
    //thêm sản phẩm mới
    public function create($model){
        $this -> db -> insert($this->tb_name, $model);
    }

    //chỉnh sửa thông tin về sản phẩm
    public function edit($id, $data){
        $this->db->where($this->id_pro, $id);
       $this->db->update($this->tb_name, $data);
   }


public function delete($id=NULL){
    $this->db->where($this->id_pro, $id);
    $this->db->delete($this->tb_name);
}
}
?>