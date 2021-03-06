<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['registeruser'])) {
        $studentid = mysqli_real_escape_string($conn, $_POST['student_id']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password']);
        $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
        $nametitle = mysqli_real_escape_string($conn, $_POST['nametitle']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $surname = mysqli_real_escape_string($conn, $_POST['surname']);
        $birth = mysqli_real_escape_string($conn, $_POST['birth']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $blood = mysqli_real_escape_string($conn, $_POST['blood']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phonenum = mysqli_real_escape_string($conn, $_POST['phonenum']);
        $facalty = mysqli_real_escape_string($conn, $_POST['facalty']);
        $branch = mysqli_real_escape_string($conn, $_POST['branch']);

        if (empty($studentid)) {
            array_push($errors, "กรุณาใส่รหัสนักศึกษา");
            $_SESSION['error'] = "กรุณาใส่รหัสนักศึกษา";
        }
        if (empty($password1)) {
            array_push($errors, "กรุณาใส่รหัสผ่าน");
            $_SESSION['error'] = "กรุณาใส่รหัสผ่าน";
        }
        if ($password1 != $password2) {
            array_push($errors, "รหัสผ่านไม่ตรงกัน");
            $_SESSION['error'] = "รหัสผ่านไม่ตรงกัน";
        }

        $user_check_query = "SELECT * FROM user WHERE studentid = '$studentid' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            if ($result['studentid'] === $studentid) {
                array_push($errors, "เลขประจำตัวนักศึกษานี้ได้เป็นสมาชิกอยู่แล้ว");
            }
        }

        if (count($errors) == 0) {
            $password = $password1;

            $sql = "INSERT INTO user (nametitle, name, surname, dateofbirth, age, blood, address, email, phone, studentid, password, facalty, branch) VALUES ('$nametitle', '$name', '$surname', '$birth', '$age', '$blood', '$address', '$email', '$phonenum', '$studentid', '$password', '$facalty', '$branch')";
            mysqli_query($conn, $sql);
            $_SESSION['studentid'] = $studentid;
            $_SESSION['success'] = "ลงทะเบียนเรียบร้อย";
            header('location: index.php');
        } else {
            array_push($errors, "เกิดข้อผิดพลาด! กรุณากรอกข้อมูลใหม่");
            $_SESSION['error'] = "เกิดข้อผิดพลาด! กรุณากรอกข้อมูลใหม่";
            header("location: regis.php");
        }
    }

?>