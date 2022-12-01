<?php
        session_start();
        include '../connect.php';
        $category = $_GET['category'];
        $id = $_GET['content_id'];
        mysqli_query($connect, "DELETE FROM `exam_category`  WHERE id = '$category' && content_id = $id");    
 
?>
                <script type="text/javascript">
                    window.location = "exam_category.php?content_id=<?php echo $id;?>"
                </script>

