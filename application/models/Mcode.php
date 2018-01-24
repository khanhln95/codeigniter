<?php
class Mcode extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    // Hàm mã hóa tạo mật khẩu, password từ text đưa vào
    public function hash($text) {
        $str=sha1(md5(sha1($text)));
        return $str;
    }

    //Hàm lọc dấu tiếng việt
    public function stripUnicode($str) {
        if(!$str) return false;
        $str=strip_tags($str);
        $unicode=array('a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ','d' => 'đ','e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ','i' => 'í|ì|ỉ|ĩ|ị','o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ','u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự','y' => 'ý|ỳ|ỷ|ỹ|ỵ','A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ','D' => 'Đ','E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ','I' => 'Í|Ì|Ỉ|Ĩ|Ị','O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ','U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự','Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',);
        foreach($unicode as $nonUnicode => $uni) {
            $str=preg_replace("/($uni)/i",$nonUnicode,$str);
        }
        return $str;
    }

    //Hàm tạo tên username từ text
    public function generate_username_from_text($strText) {
        $strText=preg_replace('/[^A-Za-z0-9-]/',' ',$strText);
        $strText=preg_replace('/ +/',' ',$strText);
        $strText=trim($strText);
        $strText=str_replace(' ','',$strText);
        $strText=preg_replace('/-+/','',$strText);
        $strText=preg_replace("/-$/","",$strText);
        return $strText;
    }    
    public function username($strText) {
        return  strtolower($this->generate_username_from_text($this->stripUnicode($strText)));
    }  

//kiểm tra nếu tồn tại session user admin thì nhảy về trang chính admin, khỏi phải hiện giao diện đăng nhập
// Hàm admin_login kiểm tra đúng nếu tồn tại user và pass trùng khớp thì khởi tạo session 
    public function admin_login($user,$pass) {
        $username=$this->mcode->hash($user);
        $password=$this->mcode->hash($pass);
        $query=$this->db->query("select * from users where user_token='$username' and pass_token='$password' and hide=1");
        $item=$query->row();
        if($query->num_rows()>0 && $username==$item->user_token && $password==$item->pass_token) {        
            $this->session->set_userdata(array(
                'admin_name'=> $item->name,
                'admin_user'=> $item->username,
                'admin_id' => $item->id,
                'group_id' => $item->group_id,
            ));
            return true;
        }
        else {
            return false;
        }
    }
    // Hàm admin_logged_in kiểm tra có tồn tại session hay chưa, để kiểm tra đã đăng nhập hay chưa đăng nhập
    public function admin_logged_in() {
        if($this->session->has_userdata('admin_user') && $this->session->has_userdata('admin_id')) {
            return true;
        }
        else {
            return false;
        }
    }
    // Hàm admin_logout() có tác dụng xóa các session đã tạo.
    public function admin_logout() {
        $this->session->unset_userdata(array('admin_name','admin_user','admin_id','group_id'));
    }

    public function display(){
        $query = $this->db->get('products');
        return $query->result_array();
    }
}
?>
