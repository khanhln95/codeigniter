<div class="container">
    <h1 class="text-center">Phần giao diện admin</h1>
    <h3>Chào <?=$this->session->admin_name;?></h3>    
    <br>
    <a href="<?=site_url('admin/productcontroller');?>">Quản lý sản phẩm</a>
    <p><a href="<?=site_url('admin/checklogincontroller/logout');?>" title="Đăng xuất">Đăng xuất</a></p>
</div>