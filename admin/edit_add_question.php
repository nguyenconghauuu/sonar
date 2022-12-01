<?php
    session_start();
    include '../connect.php';
    $category_id = $_GET["category_id"];
    $content_id = $_GET["content_id"];
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
    <style>
    <?php include "./assets/main.css" ?>
    </style>
</head>
<body>
    <div class="main">
    <?php include 'Header.php';?>
        <div class="content-body">
            <div class="content-top">
                Thêm Bài Thi Trong 
                <span style="color:var(--primary-color); margin-left: 5px;">
                <?php 
                $result = mysqli_query($connect , 
                "SELECT * FROM  exam_category where id = '$category_id'");
                while($row = mysqli_fetch_array($result)) {
                    $exam_category =$row["category"]; 
                    echo $row["category"];      
                };
                echo " - ";
                $result = mysqli_query($connect , 
                "SELECT * FROM  exam_courseContent where id = '$content_id'");
                while($row = mysqli_fetch_array($result)) {
                    echo $row["name"];      
                };
                ?>
                </span>
            </div>
            <div class="content-main">
            <div class="content-wrap">
                    <div class="add-exam">
                        <h3 class="exam-heading">Thêm câu hỏi</h3>
                        <form  method="post" 
                        class="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="examname" class="form-control-label">Nội dung câu hỏi</label>
                                <input type="text" placeholder="" required   name="question" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examname" class="form-control-label"> Ảnh</label>
                                <input type="file" placeholder=""  name="image" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Câu trả lời 1</label>
                                <input type="text" placeholder="" required   name="option1" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Câu trả lời 2</label>
                                <input type="text" placeholder=""  required  name="option2" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Câu trả lờin 3</label>
                                <input type="text" placeholder=""   name="option3" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Câu trả lời 4</label>
                                <input type="text" placeholder=""    name="option4" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Câu trả lời 5</label>
                                <input type="text" placeholder=""   name="option5" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Câu trả lời 6</label>
                                <input type="text" placeholder=""   name="option6" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Đáp án</label>
                                <input type="text" placeholder="" required   name="answer" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="level" class="form-control-label">Mức độ</label>                               
                                <select name="level" class="form-input">
                                    <option value="1">Mức độ dễ</option>
                                    <option value="2">Mức độ Trung bình </option>
                                    <option value="3">Mức độ Khó</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type" class="form-control-label">Thể loại câu hỏi</label>                               
                                <select name="type" class="form-input">
                                    <option value="mr">Câu hỏi chọn một đáp án</option>
                                    <option value="mc">Câu hỏi chọn nhiều đáp án</option>
                                    <option value="ftb">Câu hỏi điền vào ô trống</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="level" class="form-control-label">Add level</label>
                                <input type="text" placeholder="Add level" required   name="level" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="level" class="form-control-label">Add Type</label>
                                <input type="text" placeholder="Add type"  required  name="type" class="form-input">
                            </div> -->
                            <button class="btn" name="submit" type="submit">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-main">
            <div class="content-wrap col-12">
                    <div class="exam-category">
                        <h3 class="exam-heading">Danh sách câu hỏi</h3>
                        <div class="exam-title col-7">
                            <div class="exam-id">
                                Số
                            </div>
                            <div class="exam-name">
                                Câu hỏi
                            </div>
                            <div>
                                Ảnh
                            </div>
                            <div>
                                Câu trả lời 1
                            </div>
                            <div>
                            Câu trả lời 2
                            </div>
                            <div>
                            Câu trả lời 3
                            </div>
                            <div>
                                Hoạt động
                            </div>
                        </div>
                        <?php
                            $count = 0;
                            $spl = "SELECT * FROM questions WHERE category_id = '$category_id' && content_id='$content_id' ORDER BY question_nb ASC";
                            $result = mysqli_query($connect , $spl);
                            while ($row = mysqli_fetch_array($result)) {
                               ?>
                               <div class="exam-title col-7">
                                    <div class="exam-id">
                                        <?php echo $row["question_nb"];?>
                                    </div>
                                        <xmp class="exam-name"><?php echo $row["question"];?></xmp>
                                        <img src='../uploads/<?php echo $row["image"]?>' style="width: 100px; height: 50px; text-align: center ;margin: 0 auto;" alt="">
                                        <xmp><?php echo $row["option1"];?></xmp>
                                        <xmp><?php echo $row["option2"];?></xmp>

                                        <xmp><?php echo $row["option3"];?></xmp>

                                        <!-- <xmp><?php echo $row["option4"];?></xmp> -->

                                    <a class="exam-delete" href="edit_option.php?id=<?php echo $row["id"];?>&category_id=<?php echo $category_id;?>&& content_id=<?php echo $content_id;?>">
                                        Cập nhật
                                    </a>
                                    <a class="exam-delete" href="delete_option.php?id=<?php echo $row["id"];?>&category_id=<?php echo $category_id;?>&& content_id=<?php echo $content_id;?>">
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
    if(isset($_POST['submit']))
    {
        $category_id = $_GET["category_id"];
        $content_id = $_GET["content_id"];
        $image = basename($_FILES["image"]["name"]);
        $loop =0;
        $spl = "SELECT * FROM questions WHERE category_id = '$category_id' ORDER BY id ASC";
        $result = mysqli_query($connect , $spl);
        if($connect->connect_error){
            var_dump($connect->connect_error);
            die();
        }
        if($result->num_rows > 0){
            while($rows = mysqli_fetch_array($result)){
                $loop++; // loop
                mysqli_query($connect , "UPDATE questions set question_nb ='$loop' WHERE id = $rows[id]");
            }
        }
        $loop++;
        mysqli_query($connect , "INSERT INTO questions VALUES(NULL ,$loop , '$_POST[question]' ,'$image', 
        '$_POST[option1]', '$_POST[option2]', '$_POST[option3]', '$_POST[option4]', '$_POST[option5]', 
        '$_POST[option6]', '$_POST[answer]' , '$_POST[type]','$_POST[level]','$content_id','$category_id')") 
        or die(mysqli_error($connect));

        $target_dir = "../uploads/";
        $target_file = $target_dir . $image;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo 'thêm hinh anh thành côg';
        }
        else{
            echo 'thêm hinh anh khong thành côg';
        }
        ?>
            <script type="text/javascript">
                alert('thêm câu hỏi thành côg')
                window.location.href = window.location.href
            </script>
        <?php                        
    }
?>
</body>
</html>