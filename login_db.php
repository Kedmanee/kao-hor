<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['loginuser'])) {
        $studentid = mysqli_real_escape_string($conn, $_POST['student_id']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($studentid)) {
            array_push($errors, "กรุณาใส่เลขประจำตัวนักศึกษา");
        }

        if (empty($password)) {
            array_push($errors, "กรุณาใส่รหัสผ่าน");
        }

        if (count($errors) == 0) {
            $query = "SELECT * FROM user WHERE studentid = '$studentid' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['studentid'] = $studentid;
                header("location: index.php");
            } else {
                array_push($errors, "เลขประจำตัวนักศึกษาหรือรหัสผ่านไม่ถูกต้อง");
                $_SESSION['error'] = "เลขประจำตัวนักศึกษาหรือรหัสผ่านไม่ถูกต้อง";
                header("location: login.php");
            }
        } else {
            array_push($errors, "เลขประจำตัวนักศึกษาหรือรหัสผ่านไม่ถูกต้อง");
            $_SESSION['error'] = "เลขประจำตัวนักศึกษาหรือรหัสผ่านไม่ถูกต้อง";
            header("location: login.php");
        }
    }

?>