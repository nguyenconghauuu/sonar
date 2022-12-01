<?php
    session_start();
    include '../connect.php';
    $id = $_GET['id'];
    $category_id = $_GET['category_id'];
    $content_id = $_GET['content_id'];
    $question = "";
        $option1 = "";
        $option2 = "";
        $option3 = "";
        $option4 = "";
        $option5 = "";
        $option6 = "";
        $answer = "";
    $spl = "SELECT * FROM questions WHERE id = '$id' && content_id='$content_id'";
    $result = mysqli_query($connect , $spl);
    while ($row = mysqli_fetch_array($result)) {
        $question = $row['question'];
        $image = $row['image'];
        $option1 = $row['option1'];
        $option2 = $row['option2'];
        $option3 = $row['option3'];
        $option4 = $row['option4'];
        $option5 = $row['option5'];
        $option6 = $row['option6'];
        $answer = $row['answer'];
        $level = $row['level'];
        $exam_type = $row['exam_type'];
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
    <style>
    <?php include "./assets/main.css" ?>
    </style>
</head>
<body>
    <div class="main">
    <?php include 'Header.php';?>
        <div class="content-body">
            <div class="content-top">
                Cập Nhật Câu Hỏi
            </div>
            <div class="content-main">
            <div class="content-wrap">
                    <div class="add-exam">
                        <h3 class="exam-heading">Cập Nhật Câu Hỏi</h3>
                        <form action="" method="post" class="form">
                            <div class="form-group">
                                <label for="examname" class="form-control-label">Thêm câu hỏi</label>
                                <input type="text" placeholder="Add question" value="<?php echo $question;?>"   name="question" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examname" class="form-control-label">Thêm Ảnh</label>
                                <input type="file" placeholder="Add Image" name="image" value="<?php echo $image;?>" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Add Option 1</label>
                                <input type="text" placeholder="Add option1"  value="<?php echo $option1;?>"  name="option1" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Add Option 2</label>
                                <input type="text" placeholder="Add option2"  value="<?php echo $option2;?>"  name="option2" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Add Option 3</label>
                                <input type="text" placeholder="Add option3" value="<?php echo $option3;?>"  name="option3" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Add Option 4</label>
                                <input type="text" placeholder="Add option4" value="<?php echo $option4;?>"  name="option4" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Add Option 5</label>
                                <input type="text" placeholder="Add option4" value="<?php echo $option5;?>"  name="option5" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Add Option 6</label>
                                <input type="text" placeholder="Add option4" value="<?php echo $option6;?>"  name="option6" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="examtime" class="form-control-label">Add Answer</label>
                                <input type="text" placeholder="Add Answer" value="<?php echo $answer;?>"  name="answer" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="level" class="form-control-label">Add level</label>                               
                                <select name="level" class="form-input">
                                    <option value="1" <?php if($level === "1")echo "selected";?>>Mức độ dễ</option>
                                    <option value="2" <?php if($level === "2")echo "selected";?>>Mức độ Trung bình </option>
                                    <option value="3" <?php if($level === "3")echo "selected";?>>Mức độ Khó</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type" class="form-control-label">Add Type</label>                               
                                <select name="type" class="form-input">
                                    <option value="mr" <?php if($exam_type === "mr")echo "selected";?>>Câu hỏi chọn một đáp án</option>
                                    <option value="mc" <?php if($exam_type === "mc")echo "selected";?>>Câu hỏi chọn nhiều đáp án</option>
                                    <option value="ftb" <?php if($exam_type === "ftb")echo "selected";?>>Câu hỏi điền vào ô trống</option>
                                </select>
                            </div>
                            <button class="btn">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(!empty($_POST))
        {
            if($_POST["image"] === ""){
                $_POST["image"] = $image;
            }
           mysqli_query( $connect, "UPDATE questions SET question = '$_POST[question]' , image = '$_POST[image]', option1 = '$_POST[option1]', option2 = '$_POST[option2]' , option3 = '$_POST[option3]' , option4 = '$_POST[option4]' , option5 = '$_POST[option5]' , option6 = '$_POST[option6]' , answer = '$_POST[answer]' , exam_type = '$_POST[type]' , level = '$_POST[level]' WHERE id = '$id'");   
            ?>
                <script type="text/javascript">
                    window.location = "edit_add_question.php?category_id=<?php echo $category_id;?>&& content_id=<?php echo $content_id;?>"
                </script>
            <?php   
        }
        
    ?>
</body>
</html>