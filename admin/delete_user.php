<?php
        session_start();
        include '../connect.php';
        $id = $_GET['id'];
        $spl = "DELETE FROM users WHERE id = '$id'";
        $result = mysqli_query($connect , $spl);  
        header('Location: manage_users.php');                    
?>

