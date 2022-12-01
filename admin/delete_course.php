<?php
        session_start();
        include '../connect.php';
        $course = $_GET['course'];
        $spl = "DELETE  FROM exam_course WHERE course = '$course'";
        $result = mysqli_query($connect , $spl); 
        header('Location: exam_course.php');                   
?>

