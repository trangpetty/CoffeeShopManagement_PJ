<?php
    include 'toast.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php_tur/QLBH_CF/public/assets/bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/php_tur/QLBH_CF/public/assets/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="/php_tur/QLBH_CF/public/css/style2.css">
    <script src="/php_tur/QLBH_CF/public/assets/bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="/php_tur/QLBH_CF/public/js/jquery-3.6.1.min.js"></script>
    <title>AJAX LESSON</title>
</head>
<body>
<div class="d-flex justify-content-center align-items-center w-100 bg-brown h-100">
        <!----------------------- Login Container -------------------------->
        <div class="row rounded-5 p-3 bg-light shadow-lg">
        <!--------------------------- Left Box ----------------------------->
            <div class="col w-75 px-5 py-3 login-content">
                <form id="login-form">
                    <h2 class="text-brown text-center">Welcome</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>Username</h5>
                            <input type="text" id="username" class="input border-0 w-100 h-100 top-0 start-0 position-absolute p-1">
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i"> 
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div position-relative">
                            <h5>Password</h5>
                            <input type="password" id="password" class="input border-0 w-100 h-100 top-0 start-0 position-absolute p-1">
                            <div id="btn-showhide_pwd" class="position-absolute end-0 top-50"><i class="fa-solid fa-eye" style="color: #724e2c!important;"></i></div>
                        </div>
                    </div>
                    <p class="text-danger error"></p>
                    <input type="submit" class="btn btn-dark" value="Login">
                </form>
            </div> 
            <div class="col w-25 p-0 position-relative" >
                <img src="/php_tur/QLBH_CF/public/images/wave.png" class="w-75 float-end rounded-4">
                <img src="/php_tur/QLBH_CF/public/images/bg.png" class="position-absolute w-50" style="top:25%">
            </div> 
        </div>
    </div>
    <div class="bg top-0 bottom-0 start-0 w-100 h-100 ">
       <div class="spinner-3"></div>
    </div>
    <script>
        const inputs = document.querySelectorAll(".input");
        function addcl(){
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }
        
        function remcl(){
            let parent = this.parentNode.parentNode;
            if(this.value == ""){
                parent.classList.remove("focus");
            }
        }
        
        
        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });


   
        $(document).ready(function () {
            $('.bg').hide();
            $('#login-form').submit(function (e) {
                e.preventDefault();
                let username = $('#username').val();
                let password = $('#password').val();
                if (username != '' && password != '') {
                    $.post('/php_tur/QLBH_CF/Login/login', {
                        username: username,
                        password: password
                    }, (data) => {
                        let result = JSON.parse(data);
                        if (result['message']){                            
                            $('.row').hide();
                            $('.bg').show();
                            setInterval(() => {
                                window.location.href = result['success'];                                            
                            }, 1500);
                            $('#login-form').reset();
                        } else {
                            $('.error').html("<i class='fa-solid fa-circle-exclamation'></i> Username or password error");
                        }
                    })
                } else {
                    $('.error').html("<i class='fa-solid fa-circle-exclamation'></i> Both Feilds are required!!!");
                }
            })

            $('#btn-showhide_pwd').click(function () {
                let password = $('#password');
                let passwordField = password.attr('type');
                if (passwordField == 'password') {
                    password.attr('type', 'text');
                    $(this).html('<i class="fa-sharp fa-solid fa-eye-slash" style="color: #724e2c!important;"></i>');
                } else {
                    password.attr('type', 'password');
                    $(this).html('<i class="fa-solid fa-eye" style="color: #724e2c!important;"></i>');
                }
            })
        })
    </script>
</section>
</body>
</html>