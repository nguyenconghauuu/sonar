<?php
    session_start();
        include '../connect.php';
        $course_id = $_GET['course_id'];
        $id = $_GET['content_id'];
        $spl = "SELECT * FROM  exam_courseContent WHERE id = '$id' && course_id='$course_id'";
        $result = mysqli_query($connect , $spl);
        while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/main.css">
</head>
<body>
    <div class="main">
    <?php include 'Header.php';?>
        <div class="content-body">
            <div class="content-top">
                Cập nhật khóa học
            </div>
            <div class="content-main">
                <div class="content-wrap">
                    <div class="add-exam">
                        <h3 class="exam-heading">Cập nhật khóa học</h3>
                        <form action="" method="post" class="form">
                            <div class="form-group">
                                <label for="examname" class="form-control-label">Tên khóa học</label>
                                <input type="text" placeholder="Add Exam Category" value="<?php echo $name;?>"  required name="examname" class="form-input">
                            </div>
                            <button class="btn">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(!empty($_POST))
        {
            $examname = $_POST['examname'];
            $spl = "UPDATE  exam_courseContent set name = '$examname' WHERE course_id = '$course_id' && id='$id'";
            $result = mysqli_query($connect , $spl);
            if($connect->connect_error){
                var_dump($connect->connect_error);
                die();
            }
            ?>
                <script type="text/javascript">
                    window.location = "exam_course-content.php?course_id=<?php echo $course_id;?>";
                </script>
            <?php                        
        }

?>
</body>
</html>