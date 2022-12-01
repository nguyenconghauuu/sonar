<?php
    $connect = new mysqli("localhost","root", "" , "k69_nhom14");
    mysqli_set_charset($connect, "utf8");
    if($connect->connect_error){
        var_dump($connect->connect_error);
        die();
    }
?>