<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['submitpass'])) {
        $pass = mysqli_real_escape_string($conn, $_POST['enterpass']);

        if (empty($pass)) {
            array_push($errors, "กรุณาใส่เลขประจำตัวนักศึกษา");
        }

        if (count($errors) == 0) {
            $query = "SELECT * FROM enter WHERE pass = '$pass'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                header("location: success.html");
            } else {
                array_push($errors, "รหัสสำหรับเข้าหอไม่ถูกต้อง");
                $_SESSION['error'] = "รหัสสำหรับเข้าหอไม่ถูกต้อง";
                header("location: index.php");
            }
        } else {
            array_push($errors, "กรุณาใส่รหัสสำหรับเข้าหอ");
            $_SESSION['error'] = "กรุณาใส่รหัสสำหรับเข้าหอ";
            header("location: index.php");
        }
    }

?>