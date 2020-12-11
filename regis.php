<?php
    session_start();
    include('server.php');
?>
<html>
  <head>
    <title>สมัครสมาชิก</title>
    <link rel="icon" type="image/png" href="icon.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <style>@import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');</style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
    <body style="font-family: 'Kanit', sans-serif; background-color:rgb(237,228,184)">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(227, 119, 80);">
            <a class="navbar-brand" href="index.php">
                <img src="nav.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">KaoHor
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">เข้าสู่หอพัก</a>
                    </li>
                    <li class="nav-item  active">
                        <a class="nav-link" href="regis.php">ลงทะเบียน<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">ข้อมูลผู้ใช้</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div style="margin-top: 3%;" class="container shadow p-3 mb-5 bg-white rounded">
            <form action="regis_db.php" method="post">
            <?php include('errors.php'); ?>
            <?php if (isset($_SESSION['error'])) : ?>
                <center>
                <div class="error shadow rounded d-inline-flex" style="background-color: rgb(255, 77, 77); color: white;">
                    <p style="margin:10px">
                        <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </p> 
                </div>
                </center>
            <?php endif ?>
                <div class="container">
                    <h3 class="text-bold text-center">สมัครสมาชิกหอพัก</h3>
                    <hr style="background-color:rgb(237, 228, 184); border: 2px solid rgb(237, 228, 184);">
                                        <div class="form-group bmd-form-group label-floating is-empty">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="nametitle">คำนำหน้า </label>
                                                        <select id="nametitle" name="nametitle" class="form-control">
                                                        <option selected>เลือก...</option>
                                                        <option>นาย </option>
                                                        <option>นาง </option>
                                                        <option>นางสาว </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="name">ชื่อ <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="name" placeholder="ชื่อ ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="surname">นามสกุล <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="surname" placeholder="นามสกุล ">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-7">
                                                        <label for="birth">วัน/เดือน/ปีเกิด <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="birth" placeholder="xx/xx/xxxx ">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="age">อายุ</label>
                                                        <input type="text" class="form-control" name="age" placeholder="อายุ ">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="blood">หมู่เลือด </label>
                                                        <select id="blood" name="blood" class="form-control">
                                                        <option selected>เลือก...</option>
                                                        <option>A</option>
                                                        <option>B</option>
                                                        <option>O</option>
                                                        <option>AB</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="Address">ที่อยู่ตามทะเบียนบ้าน <span class="text-danger">*</span></label></label>
                                                        <input type="text" class="form-control" id="address" name="address" placeholder="บ้านเลขที่ หมู่บ้าน ตำบล...  ">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label" for="email">อีเมล <span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" name="email" class="form-control" id="idComment" placeholder="xxxx@email.com ">  
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label" for="phonenum">หมายเลขโทรศัพท์ </label>
                                                        <input type="text" class="form-control" name="phonenum" class="form-control" id="phonenumber" placeholder="หมายเลขโทรศัพท์ ">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label" for="student_id">เลขประจำตัวนักศึกษา <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="student_id" class="form-control" id="idComment" placeholder="เลขประจำตัวนักศึกษา ">  
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="inputAddress2">รหัสผ่าน <span class="text-danger">*</span></label></label>
                                                        <input type="password" class="form-control" name="password" id="inputpassword1" placeholder="รหัสผ่าน ">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="inputAddress2">ยืนยันรหัสผ่าน <span class="text-danger">*</span></label></label>
                                                        <input type="password" class="form-control" name="password2" id="inputpassword2" placeholder="ยืนยันรหัสผ่าน ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="facalty">คณะ <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="facalty" class="form-control" placeholder="คณะ ">  
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="branch">สาขา <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="branch" class="form-control" placeholder="สาขา ">  
                                                    </div>
                                                    <div class="form-group col-md-12 hidden" id="boxResponse">
                                                        <span class="serverResponse text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-12 elem-mt elem-mb-mini">
                                                        <button class="btn" style="background-color: rgb(235,191,123); color: white;" type="submit" name="registeruser">สมัครบัญชี </button>
                                                    </div>
                                                    <div class="form-group col-md-12 elem-my-mini hidden-xs hidden-sm">
                                                        <div class="text-center">
                                                            <span class="text-darken">มีบัญชีอยู่แล้ว </span>
                                                            <a href="login.php" class="text-blue" style="text-decoration: underline;">เข้าสู่ระบบที่นี่ </a>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                </div>
            </form>

        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
