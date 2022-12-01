<?php
    session_start();
    include '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
    <?php include "./assets/main.css" ?>
    </style>
</head>
<body>
    <div class="main">
        <?php include 'Header.php';?>
        <div class="content-body">
            <div class="content-top">
                Thêm khóa học
            </div>
            <div class="content-main">
                <div class="content-wrap">
                    <div class="add-exam">
                        <h3 class="exam-heading">Thêm khóa Học</h3>
                        <form action="" method="post" class="form">
                            <div class="form-group">
                                <label for="examname" class="form-control-label">Khóa học</label>
                                <input type="text" placeholder=""  required name="examname" class="form-input">
                            </div>
                            <button class="btn">Thêm</button>
                        </form>
                    </div>
                    <div class="exam-category">
                        <h3 class="exam-heading">Danh sách khóa học</h3>
                        <div class="exam-title">
                            <div class="exam-id">
                                #
                            </div>
                            <div class="exam-name">
                                Tên Khóa học
                            </div>
                            <div >
                                Chỉnh Sửa
                            </div>
                            <div>
                                Xóa
                            </div>
                        </div>
                        <?php
                            $count = 0;
                            $id = $_GET['course_id'];
                            $spl = "SELECT * FROM exam_courseContent where course_id = $id";
                            $result = mysqli_query($connect , $spl);
                            while ($row = mysqli_fetch_array($result)) {
                                $count++;
                               ?>
                                    <div class="exam-title">
                                    <div class="id">
                                        <?php echo $count?>
                                    </div>
                                    <div class="course">
                                        <?php echo $row["name"];?>
                                    </div>
                                    <a class="exam-edit" href="edit_content.php?course_id=<?php echo $id;?>&&content_id=<?php echo $row["id"];?>">
                                    Cập nhật
                                    </a>
                                    <a class="exam-delete" href="delete_content.php?course_id=<?php echo $id;?>&&content_id=<?php echo $row["id"];?>">
                                        Xóa
                                    </a>
                                </div>
                               <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    error_reporting(0);
    session_start();
    if(!empty($_POST))
    { 
        $sloop =0;
        $examname = $_POST['examname'];
        // $spl = "INSERT INTO exam_category VALUES(NULL , '$examname' , '$examtime', '')";
        // $result = mysqli_query($connect , $spl);
        // if($connect->connect_error){
        //     var_dump($connect->connect_error);
        //     die();
        // }
        $spl = "INSERT INTO exam_courseContent (id,name,course_id) VALUES(null,'$examname','$id')";
        $result = mysqli_query($connect , $spl);
        ?>
            <script type="text/javascript">
                window.location.href = window.location.href
            </script>
        <?php                        
    }
?>
</body>
</html>