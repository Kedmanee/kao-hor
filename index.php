<?php 
    include('server.php');
    session_start();
    if (!isset($_SESSION['studentid'])) {
        $_SESSION['msg'] = "กรุณาเข้าสู่ระบบ";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['studentid']);
        header('location: login.php');
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <title>เข้าสู่หอพัก</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
  </head>
  <body style="font-family: 'Kanit', sans-serif; background-color:rgb(237, 228, 184)">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(227, 119, 80);">
      <a class="navbar-brand" href="index.php">
        <img src="nav.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        KaoHor
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">เข้าสู่หอพัก<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="regis.php">ลงทะเบียน</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">ข้อมูลผู้ใช้</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?logout='1'">ออกจากระบบ</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container shadow p-3 mb-5 bg-white rounded" style="margin-top: 3%;">
        <?php if (isset($_SESSION['success'])) {?>
          <center>
          <div class="error shadow rounded d-inline-flex" style="background-color: rgb(51, 204, 51); color: white;">
            <p style="margin:10px">
              <?php 
                echo $_SESSION['success'];
                unset($_SESSION['sucess']);
              ?>
            </p> 
          </div>
          </center>
        <?php } ?>
      <center><img src="nav.png" style="width: 50%; height: auto;"></center>
      <form action="enter_check.php" style="margin-top: 1%" method="post">
          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Password</label>
            <input type="text" class="form-control" name="enterpass" placeholder="รหัสสำหรับเข้าหอ">
          </div>
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
        <center><button type="submit" name="submitpass" class="btn" style="background-color: rgb(235, 191, 123); color: white; margin-top: 15px;">ยืนยัน</button></center>
      </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>
