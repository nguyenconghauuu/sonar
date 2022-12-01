<?php
    session_start();
    include '../connect.php';
    $id = $_GET['id'];
    $category_id = $_GET['category_id'];
    $content_id = $_GET['content_id'];
    mysqli_query($connect, "DELETE FROM questions WHERE id =$id");     
?>
<script type="text/javascript">
    window.location = "edit_add_question.php?category_id=<?php echo $category_id;?>&&content_id=<?php echo $content_id;?>"
</script>