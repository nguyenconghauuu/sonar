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
                Thêm nội dung
            </div>
            <div class="content-main">
                <div class="content-wrap">
                    <div class="add-exam">
                        <h3 class="exam-heading">Thêm nội dung</h3>
                        <form action="" method="post" class="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="examname" class="form-control-label">Tên bài thi</label>
                                <input type="text" placeholder=""  required name="examname" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Thời gian làm bài thi</label>
                                <input type="text" placeholder=""  required name="examtime" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Tài liệu</label>
                                <input type="file" placeholder=""  name="fileToUpload" class="form-input">
                            </div>
                            <button class="btn">Thêm</button>
                        </form>
                    </div>
                    <div class="exam-category">
                        <h3 class="exam-heading">Danh Sách Bài Thi</h3>
                        <div class="exam-title">
                            <div class="exam-id">
                                #
                            </div>
                            <div class="exam-name">
                                Tên Bài Thi
                            </div>
                            <div class="exam-time">
                                Thời Gian
                            </div>
                            <div>
                                File
                            </div>
                            <div>
                                Chỉnh Sửa
                            </div>
                            <div>
                                Xóa
                            </div>
                        </div>
                        <?php
                            $count = 0;
                            $content_id = $_GET['content_id'];
                            $spl = "SELECT * FROM exam_category where content_id = $content_id";
                            $result = mysqli_query($connect , $spl);
                            while ($row = mysqli_fetch_array($result)) {
                                $count++;
                               ?>
                                    <div class="exam-title">
                                    <div class="exam-id">
                                        <?php echo $count?>
                                    </div>
                                    <div class="exam-name">
                                        <?php echo $row["category"];?>
                                    </div>
                                    <div class="exam-time">
                                        <?php echo $row["exam_time"];?>
                                    </div>
                                    <div class="exam-time">
                                        <?php echo $row["File"];?>
                                    </div>
                                    <a class="exam-edit" href="edit_exam.php?category=<?php echo $row["id"];?>&&content_id=<?php echo $content_id?>">
                                    Cập nhật
                                    </a>
                                    <a class="exam-delete" href="delete_exam.php?category=<?php echo $row["id"];?>&&content_id=<?php echo $content_id?>">
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
        $file = basename($_FILES["fileToUpload"]["name"]);
        $target_dir = "../uploads/";
        $target_file = $target_dir . $file;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo 'thêm file  thành côg';
        }
        else{
            echo 'thêm file khong thành côg';
        }
        $sloop =0;
        $examname = $_POST['examname'];
        $examtime = $_POST['examtime'];
        // $spl = "INSERT INTO exam_category VALUES(NULL , '$examname' , '$examtime', '')";
        // $result = mysqli_query($connect , $spl);
        // if($connect->connect_error){
        //     var_dump($connect->connect_error);
        //     die();
        // }
        $spl = "INSERT INTO exam_category (id,category,exam_time ,File,content_id) VALUES(null,'$examname' , '$examtime' ,'$file','$content_id')";
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