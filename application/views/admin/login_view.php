<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lOGIN</title>
</head>
<body>
<div class="container">
    <div class="login-form">
        <?php if($this->session->message!='') {?>
        <div class="show_error">
            <?=$this->session->message?>
        </div>
        <?php } ?>
        <?php echo form_open('',array('id'=>'form-plogin'));?>
        <div class="form-group">
            <div class="input-group"> 
                <div class="input-group-addon"> <i class="entypo-user"></i></div> 
                <input type="text" class="form-control" name="username" id="username" data-error="Nhập tài khoản" placeholder="Tài khoản" autocomplete="off"> 
            </div>
        </div>
        <div class="form-group">
            <div class="input-group"> 
                <div class="input-group-addon"> <i class="entypo-key"></i> </div> 
                <input type="password" class="form-control" name="password" id="password" data-error="Nhập mật khẩu" placeholder="Mật khẩu" autocomplete="off"> 
            </div>
        </div>
        <div class="form-group"> 
            <button type="submit" class="btn btn-primary btn-block"><i class="entypo-login"></i>Đăng nhập</button> 
        </div>
        <?php echo form_close();?>
    </div>
</div>
</body>
</html>