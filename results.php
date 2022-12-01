<?php
    session_start();
    include 'header.php';
    include './connect.php';
    $date = date('Y-m-d H:i:s');
    $_SESSION["end_time"] = date('Y-m-d H:i:s' , strtotime($date."+$_SESSION[exam_time] minutes"));
    $_SESSION["deline_time"] = date("Y-m-d H:i:s", strtotime($date."+1 minutes"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/images/logost.jpg">
    <title>Hệ Thống học tập trực tuyến</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        <?php include './assets/style.css' ?>
    </style>
</head>
<body>
    <main class="main">
        <div class="header-tit">
            Kết Quả Bài Thi
        </div>
        <section class="section-content width-small">
            <div class="result">
                <?php
                    $correct =0;
                    $wrong =0;
                        
                        for($i =1 ; $i <= count($_SESSION["questions"]["answer"]) ; $i++)
                        {
                                $answer = "";
                                $ans = "";
                                $ansCheckbox = "";
                                $anscheckboxArray = [];
                                $answer = trim($_SESSION["questions"]["answer"][$i]);
                                if(isset($_GET["radioCau$i"]) && isset($_GET["radioCau$i"])!="" )
                                {
                                    $ans = $_GET["radioCau$i"];
                                }
                                if(isset($_GET["checkCau"][$i]))
                                {
                                    // $anscheckboxArray = $_GET["checkCau"][$i];
                                    $ansCheckbox = implode(',',$_GET["checkCau"][$i]);
                                }
                                if($answer == $ans || $answer == $ansCheckbox){
                                    $correct += 1;
                                }
                                else{
                                    $wrong +=1;
                                }
                        }
                    $count =0;
                    $count = count($_SESSION["questions"]["answer"]);
                    $wrong = $count - $correct;
                    $percent = ($correct / $count) *100;
                    $point = $percent / 10;
                    if($percent > 40)
                    {
                        ?>  
                        <img src="./assets/images/2.png" alt="" class="result-img">
                            <div class="result-text true">Xin chúc mừng, <?php echo $_SESSION["username"];?> đã vượt qua bài kiểm tra</div>
                            <div class="result-poin">Điểm để qua: <span style="background: var(--button-color);">40%</span></div>
                            <div class="result-poin">Điểm của bạn: <span style="background: #009412;"><?php echo $percent;?>%</span></div>
                        <?php
                    }
                    else {
                        ?>  
                        <img src="./assets/images/logo3.png" alt="" class="result-img">
                            <div class="result-text false">Rất tiếc, <?php echo $_SESSION["username"];?> chưa vượt qua bài kiểm tra</div>
                            <div class="result-poin">Điểm để qua: <span style="background: var(--button-color);">40%</span></div>
                            <div class="result-poin">Điểm của bạn: <span style="background: var(--primary-color);"><?php echo $percent;?>%</span></div>
                        <?php
                    }
               ?>
               </div>
               <div class="result-closed">
                <a href="select_exam.php?category_id=<?php echo $_SESSION["exam_category"]?>&&content_id=<?php echo $_SESSION["content_id"]?>" class="btn btn-close">Đóng</a>
               </div>
        </section>
    </main>
    <?php include 'footer.php';?>
    <?php 
        if(isset($_SESSION["exam_start"])){
            mysqli_query($connect , "INSERT INTO exam_results(id ,id_user, ho_ten, content_id , category_id ,total_question ,correct_answer , wrong_answer , point ,exam_time) VALUES 
            (NULL ,'$_SESSION[id_user]', '$_SESSION[name]', '$_SESSION[content_id]' , '$_SESSION[exam_category]' ,'$count' ,'$correct' ,'$wrong' , '$point', CURRENT_TIMESTAMP)");
        }
        if(isset($_SESSION["exam_start"])){
            unset($_SESSION["exam_start"]);          
        }
    ?>
</body>
<script type="text/javascript">

</script>
</html>