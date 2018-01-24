//kiểm tra nếu tồn tại id tên là form-users thì mới chạy hàm,
//các biến error, url_username, url_email... đễ hiện thông báo lỗi
if($("#form-users").length) {
    var error1=$('#form-users #username').attr('data-error');
    var url_username=$('#form-users #username').attr('data-url');
    var error_username=$('#form-users #username').attr('data-error-1');
    var error2=$('#form-users #password').attr('data-error');
    var error3=$('#form-users #re_password').attr('data-error');
    var error4=$('#form-users #name').attr('data-error');
    var error5=$('#form-users #email').attr('data-error');
    var url_email=$('#form-users #email').attr('data-url');
    var error_email=$('#form-users #email').attr('data-error-1');
    var error6=$('#form-users #phone').attr('data-error');
    var error7=$('#form-users #address').attr('data-error');
    $("#form-users").validate({
        rules: {
            username: {
                required: true,
                //đẩy tới url là biến url_username có giá trị là localhost/ci/admin/users/check_username(duoc khoi tao trong controller Users), và biến id_user
                remote: {
                    url: url_username,
                    type: "post",
                    data: {
                        username: function() {
                            return $('#form-users #username').val();
                        },
                        id_user: function() {
                            return $('#form-users').attr('id_user');
                        },
                    }                    
                }
            },
            password: "required",
            re_password: {
                required: true,
                equalTo: "#password",
            },                
            name: "required",
            email: {
                required: true,
                email: true,
                remote: {
                    url: url_email,
                    type: "post",
                    data: {
                        email: function() {
                            return $('#form-users #email').val();
                        },
                        id_user: function() {
                            return $('#form-users').attr('id_user');
                        },
                    }
                }
            },
            phone: "required",
            address: "required",
            day: "required",    
            month: "required",    
            year: "required",    
            gender: "required",                    
        },
        messages: {
            username: {
                required: error1,
                remote: error_username
            },
            password: error2,
            re_password: {
                required: error2,
                equalTo: error3,
            },
            name: error4,
            email: {
                required: error5,
                email: error5,
                remote: error_email,
            },
            phone: error6,
            address: error7,
            day: '',
            month: '',
            year: '',
            gender: '',
        },
        highlight : function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight : function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
    });    
}