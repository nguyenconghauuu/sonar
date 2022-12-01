<?php
        session_start();
        include '../connect.php';
        $course_id = $_GET['course_id'];
        $id = $_GET['content_id'];
        mysqli_query($connect, "DELETE FROM `exam_courseContent` WHERE id = '$id' && course_id = '$course_id'");    
?>
<script type="text/javascript">
    window.location = "exam_course-content.php?course_id=<?php echo $course_id;?>"
</script>

