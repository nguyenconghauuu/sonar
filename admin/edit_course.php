<?php
    session_start();
        include '../connect.php';
        $course = $_GET['course'];
        $spl = "SELECT * FROM  exam_course WHERE course = '$course'";
        $result = mysqli_query($connect , $spl);
        while ($row = mysqli_fetch_array($result)) {
            $exam_course = $row['course'];
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
                Cập nhật khối
            </div>
            <div class="content-main">
                <div class="content-wrap">
                    <div class="add-exam">
                        <h3 class="exam-heading">Thêm Khối</h3>
                        <form action="" method="post" class="form">
                            <div class="form-group">
                                <label for="examname" class="form-control-label">Khối</label>
                                <input type="text" placeholder="" value="<?php echo $exam_course;?>"  required name="examname" class="form-input">
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
            $spl = "UPDATE  exam_course set course = '$examname' WHERE course = '$exam_course'";
            $result = mysqli_query($connect , $spl);
            if($connect->connect_error){
                var_dump($connect->connect_error);
                die();
            }
            ?>
                <script type="text/javascript">
                    window.location = "exam_course.php";
                </script>
            <?php                        
        }

?>
</body>
</html>