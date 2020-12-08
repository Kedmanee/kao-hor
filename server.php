<?php
    $svname = "localhost";
    $username = "id15621348_praew";
    $password = "FttmX6l\%P)5Y{p)";
    $dbname = "id15621348_kaohor";

    $conn = mysqli_connect($svname, $username, $password, $dbname, 3306);
    if (!$conn){
        die('Failed to connect to MySQL: '.mysqli_connect_error());
    }
?>
