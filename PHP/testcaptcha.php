<?php
/**
 * Created by PhpStorm.
 * User: Fun
 * Date: 2019/4/7
 * Time: 20:29
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DataBaseManager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/xlsx.full.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <style>
        #Login,#Register,#Import_TB{
            top: 33%;
            left: 33%;
            position: fixed;
            width: 400px;
            display: none;
            margin: auto;
        }
        #Mask_Layer{
            height: 100%;
            width: 100%;
            position: absolute;
            overflow: visible;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#Login_Button").click(function(){
                $("#Register").hide();
                $("#Login").fadeIn("slow");
            });
        });
        $(document).ready(function(){
            $("#Register_Button").click(function(){
                $("#Login").hide();
                $("#Register").fadeIn("slow");
            });
        });
        function Form_Login_Ajax() {
            $("#Login_Form").ajaxForm({
                url:'PHP/LoginPage.php',
                data_type:String,
                success:function (response) {
                    alert(response);
                }
            })
        }
    </script>
</head>
<body>
<img src="<?php echo $builder->inline(); ?>" />
<div id="Mask_Layer">
    <div class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Open Lab</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link text-white" id = "Login_Button">登录</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" id = "Register_Button">注册</a>
            </li>
        </ul>
    </div>
    <br>
    <div id="Login" class="container">
        <form id="Login_Form" action="PHP/LoginPage.php" method="post">
            <div class="form-group">
                <label for="Login_name">姓名：</label>
                <input type="text" class="form-control" placeholder="请输入姓名" id="Login_name" name="name">
                <label for="Login_name">密码：</label>
                <input type="password" class="form-control" placeholder="请输入密码" id="Login_password" name="password">
                <label><input type="radio" name = "optradio" value = "0">学生</label>
                <label><input type="radio" name = "optradio" value = "1">老师</label>
            </div>
            <button class="btn btn-primary"  type="submit" value="enter" name = "submit" onclick="return Form_Login_Ajax()">确认</button>
            <button class="btn btn-primary"  type="submit" value="cancel" name ="submit" onclick="return Form_Login_Ajax()">取消</button>
        </form>
    </div>
    <div id="Register" class="container">
        <form action="PHP/captcha.php" method="post" id="Form_Register">
            <div class="form-group">
                <label for="Register_name">姓名：</label>
                <input type="text" class="form-control" placeholder="请输入姓名或学号" id="Register_name" name="Register_name">
                <label for="Register_password">密码：</label>
                <input type="password" class="form-control" placeholder="请输入密码" id="Register_password" name="Register_password">
                <input type="password" class="form-control" placeholder="请再次输入密码" id="Register_password1" name="Register_password1">
                <label><input type="radio" name = "optradio" id = "IsStudent">学生</label>
                <label><input type="radio" name = "optradio" name = "IsTeacher">老师</label>
            </div>
            <button type="submit" class="btn btn-primary" id="Register_Enter">确认</button>
        </form>
    </div>
    <div id="Import_TB" class="container">
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile" name="filename">
            <label class="custom-file-label" for="customFile">选择文件</label>
        </div>
    </div>
</div>
</body>
</html>

