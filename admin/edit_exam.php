<?php
    session_start();
        include '../connect.php';
        $category_id = $_GET['category'];
        $id = $_GET['content_id'];
        $spl = "SELECT * FROM  exam_category WHERE id = '$category_id' && content_id='$id'";
        $result = mysqli_query($connect , $spl);
        while ($row = mysqli_fetch_array($result)) {
            $exam_category = $row['category'];
            $exam_time = $row['exam_time'];
            $File_name = $row['File'];
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
                Cập nhật bài thi
            </div>
            <div class="content-main">
                <div class="content-wrap">
                    <div class="add-exam">
                        <h3 class="exam-heading">Cập nhật bài thi</h3>
                        <form action="" method="post" class="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="examname" class="form-control-label">Tên bài thi</label>
                                <input type="text" placeholder="Add Exam Category" value="<?php echo $exam_category;?>"  required name="examname" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Thời gian làm bài thi</label>
                                <input type="text" placeholder="Exam Time in Minutes"value="<?php echo $exam_time;?>" required name="examtime" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Tài liệu</label>
                                <input type="file" placeholder="Exam Time in Minutes"  name="fileToUpload" class="form-input">
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
            $file = basename($_FILES["fileToUpload"]["name"]);
            $target_dir = "../uploads/";
            $target_file = $target_dir . $file;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo 'thêm file  thành côg';
            }
            else{
                echo 'thêm file khong thành côg';
            }
            if($file === ''){
                $file= $File_name;
            }
            $examname = $_POST['examname'];
            $examtime = $_POST['examtime'];
            $spl = "UPDATE  exam_category set category = '$examname' , exam_time = '$examtime', File='$file' WHERE id = '$category_id' && content_id='$id'";
            $result = mysqli_query($connect , $spl);
            if($connect->connect_error){
                var_dump($connect->connect_error);
                die();
            }
            ?>
                <script type="text/javascript">
                    window.location = "exam_category.php?content_id=<?php echo $id;?>";
                </script>
            <?php                        
        }

?>
</body>
</html>