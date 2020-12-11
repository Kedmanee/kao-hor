<?php
    include('server.php');
    $pass = mt_rand(100000, 999999);


    $del = "DELETE FROM enter WHERE 1";
    mysqli_query($conn, $del);
    $sql = "INSERT INTO enter (pass) VALUES ('$pass')";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 

    session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "กรุณาเข้าสู่ระบบ";
        header('location: login2.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login2.php');
    }
?>
<!doctype html>
<html lang="en">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="300; url=enter_db.php">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
  </head>
  <body style="font-family: 'Kanit', sans-serif; background-color:rgb(237, 228, 184)">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(227, 119, 80);">
      <a class="navbar-brand">
        <img src="nav.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        KaoHor
      </a>
      <ul class="navbar-nav">
        <li class="nav-item active">
              <a class="nav-link">สำหรับเจ้าหน้าที่รักษาความปลอดภัย</a>
        </li>
      </ul>
    </nav>
    <div class="container shadow p-3 mb-5 bg-white rounded" style="margin-top: 3%; text-align:center;">
        <center><img src="nav.png" style="width: 40%; height: auto;"></center>
        <?php 
        ?>
        <h1>รหัสสำหรับเข้าหอ: <strong><?php echo $pass;?></strong></h1>
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

