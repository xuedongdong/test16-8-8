<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>系统后台登录</title>
    <link rel="stylesheet" href="/learn/tp1625/Public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/learn/tp1625/Public/bootstrap/css/bootstrap-theme.min.css">
    <script src="/learn/tp1625/Public/bootstrap/js/jquery-1.11.0.min.js"></script>
    <script src="/learn/tp1625/Public/bootstrap/js/bootstrap.min.js"></script>
    <style>
        body {
            width: 100%;
            background: url("/learn/tp1625/Public/images/bg.jpg") no-repeat;
            background-size: 100%;
        }
        .col-center-block {
            float: none;
            margin: 0 auto;
            border: 1px solid blue;
            padding: 20px;
            border-radius: 10px;
            margin-top: 200px;
        }
        .footer {
            height: 46px;
            line-height: 46px;
            color: #fff;
            font-size: 12px;
            font-family: tahoma, Arial;
            background-color: #426374;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            border-top: 1px solid #e8e8e8;
            padding: 15px 0;
            text-align: center;
        }
        #open_reg {
            position: relative;
            top: 50%;
            right: -80px;
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="col-xs-6 col-md-4 col-center-block">
    <h2 style="text-align: center">系统后台登录</h2>
    <hr/>
    <form action="/learn/tp1625/index.php/Home/Index/do_login" method="post">
        <div class="form-group">
            <label for="input_username">用户名</label>
            <input type="text" class="form-control" id="input_username" name="user_name" placeholder="用户名">
        </div>
        <div class="form-group">
            <label for="input_password">密码</label>
            <input type="password" class="form-control" id="input_password" name="password" placeholder="密码">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">登录</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="reset" class="btn btn-default">重置</button>
            &nbsp;&nbsp;
            <a id="open_reg" href="" data-toggle="modal" data-target="#myModal">点击这里,立即注册</a>
        </div>
    </form>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">用户注册</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="user_name">用户名</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="请输入用户名">
                </div>
                <div class="form-group">
                    <label for="password">密&nbsp;码</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
                </div>
                <div class="form-group">
                    <label for="re_password">重复密码</label>
                    <input type="password" class="form-control" id="re_password" name="re_password" placeholder="请重复密码">
                </div>
            </div>
            <div class="modal-footer">
                <label style="color: red;position: absolute;left: 10px;" id="tip"></label>
                <button type="button" id="modal_submit" class="btn btn-primary">提交</button>
                <button type="button" id="modal_reset" class="btn btn-default">重置</button>
            </div>
        </div>
    </div>
</div>
<div class="footer">Copyright&nbsp;tp1625.com&nbsp;&nbsp;&nbsp;&nbsp;by admin</div>
<script>
    $(document).ready(function(){
        $('#modal_reset').click(function(){
            $('#user_name').val('');
            $('#password').val('');
            $('#re_password').val('');
            $('#reg_tip').html('');
        });
        $('#modal_submit').click(function(){
            if($('#user_name').val().length==0){
                $('#reg_tip').html('用户名必填！');
                return false;
            }
            if($('#password').val().length==0){
                $('#reg_tip').html('密码必填！');
                return false;
            }
            if($('#re_password').val().length==0){
                $('#reg_tip').html('请重输密码！');
                return false;
            }
            if($('#password').val()!==$('#re_password').val()){
                $('#reg_tip').html('两次输入的密码不一样！');
                return false;
            }
            $.ajax({
                url: "/learn/tp1625/index.php/Home/Index/doRegister",
                type: 'post',
                data: {user_name: $('#user_name').val(), password: $('#password').val()},
                dataType: 'JSON',
                success: function (res) {
                    if (res.info == 'success') {
                        $('#reg_tip').html('恭喜您注册成功，请登录！');
                    }
                },
                error: function () {
                    alert(arguments[1]);
                }
            });
        });
    });
</script>
</body>
</html>