<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['loginuser2'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "กรุณาใส่เลขประจำตัวนักศึกษา");
        }

        if (empty($password)) {
            array_push($errors, "กรุณาใส่รหัสผ่าน");
        }

        if (count($errors) == 0) {
            $query = "SELECT * FROM guard WHERE username = '$username' AND pass = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "เข้าสู่ระบบแล้ว";
                header("location: random.php");
            } else {
                array_push($errors, "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
                $_SESSION['error'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
                header("location: login2.php");
            }
        } else {
            array_push($errors, "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
            $_SESSION['error'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
            header("location: login2.php");
        }
    }

?>