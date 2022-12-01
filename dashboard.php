<?php
    session_start();
    include 'header.php';
    include './connect.php';
    if(!isset($_SESSION["username"])){
        ?>
            <script type="text/javascript">
                window.location = "login.php";
            </script>
        <?php
    }    
    $exam_category = $_GET["category_id"];
    $content_id = $_GET["content_id"];
    $_SESSION["exam_category"] = $exam_category;
    $_SESSION["content_id"] = $content_id;
    $count =0;
    $query = mysqli_query($connect ,"SELECT * FROM questions WHERE content_id = $content_id && category_id = '$_SESSION[exam_category]' && level = '1' ORDER BY RAND() LIMIT 10");
    $count = mysqli_num_rows($query);
    $loop =0;
    if($count > 0){
        while($row1 = mysqli_fetch_array($query)){
            $loop++;
            for($i=0;$i < $count;$i++){
                $questions[$loop] = $row1["question"];
                $image[$loop] = $row1["image"];
                $option1[$loop] = $row1["option1"];
                $option2[$loop] = $row1["option2"];
                $option3[$loop] = $row1["option3"];
                $option4[$loop] = $row1["option4"];
                $option5[$loop] = $row1["option5"];
                $option6[$loop] = $row1["option6"];
                $_SESSION["questions"]["answer"][$loop] = $row1["answer"];
                $exam_type[$loop] = $row1["exam_type"];
                
            }
        }
    }
    $query1 = mysqli_query($connect ,"SELECT * FROM questions WHERE content_id = $content_id && category_id = '$_SESSION[exam_category]' && level = '2' ORDER BY RAND() LIMIT 6");
    $count1 = mysqli_num_rows($query1);
    if($count1 > 0){
        while($row2 = mysqli_fetch_array($query1)){
            $loop++;
            for($i=0;$i < $count1;$i++){
                $questions[$loop] = $row2["question"];
                $image[$loop] = $row2["image"];
                $option1[$loop] = $row2["option1"];
                $option2[$loop] = $row2["option2"];
                $option3[$loop] = $row2["option3"];
                $option4[$loop] = $row2["option4"];
                $option5[$loop] = $row2["option5"];
                $option6[$loop] = $row2["option6"];
                $_SESSION["questions"]["answer"][$loop] = $row2["answer"];
                $exam_type[$loop] = $row2["exam_type"];
            }
        }
    }
    $query2 = mysqli_query($connect ,"SELECT * FROM questions WHERE content_id = $content_id && category_id = '$_SESSION[exam_category]' && level = '3' ORDER BY RAND() LIMIT 4");
    $count2 = mysqli_num_rows($query2);
    if($count1 > 0){
        while($row3 = mysqli_fetch_array($query2)){
            $loop++;
            for($i=0;$i < $count2;$i++){
                $questions[$loop] = $row3["question"];
                $image[$loop] = $row3["image"];
                $option1[$loop] = $row3["option1"];
                $option2[$loop] = $row3["option2"];
                $option3[$loop] = $row3["option3"];
                $option4[$loop] = $row3["option4"];
                $option5[$loop] = $row3["option5"];
                $option6[$loop] = $row3["option6"];
                $_SESSION["questions"]["answer"][$loop] = $row3["answer"];
                $exam_type[$loop] = $row3["exam_type"];
            }
        }
    }
    
    $spl = "SELECT * FROM  exam_category  WHERE content_id = $content_id && id = '$exam_category'";
    $result = mysqli_query($connect , $spl);
    while($row = mysqli_fetch_array($result)){
        $_SESSION["exam_time"] = $row["exam_time"];
    }
    $date = date("Y-m-d H:i:s"); 
    
    $_SESSION["end_time"] = date("Y-m-d H:i:s" , strtotime($date."+$_SESSION[exam_time] minutes"));
    $_SESSION["exam_start"] = "yes";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/images/logost.jpg">
    <title>Hệ Thống học tập trực tuyến </title>
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
                Đề Kiểm Tra Kiến Thức
        </div>
        <section class="section-content width-small-s">
                <form action='results.php' method="GET">
                    <div class="header-timer">
                        <div class="time-icon">
                            <i class="far fa-clock" ></i>
                            <div id="countdowntimer" ></div>
                        </div>
                        <div class="time-button">
                            <button type="submit" name="submit" id="submit">Nộp bài</button> 
                        </div>
                    </div>
                <?php 
                    for ($i = 1; $i <= count($_SESSION["questions"]["answer"]); $i++) {
                        $question = $questions[$i];
                        $img = $image[$i];
                        $opt1= trim($option1[$i]);
                        $opt2= trim($option2[$i]);
                        $opt3= trim($option3[$i]);
                        $opt4= trim($option4[$i]);
                        $opt5= trim($option5[$i]);
                        $opt6= trim($option6[$i]);
                        $type = trim($exam_type[$i]);  
                        if($type== 'mc'){
                            ?>
                                <div class="qs-nb"><?php echo "Câu ".$i.": "?></div>
                                <div class="question-wrap">
                                    <div class="question"><?php echo $question ;?></div>
                                    <?php 
                                        if($img != ''){
                                            ?> 
                                                <div><img src="<?php echo $img?>" alt=""></div> 
                                            <?php
                                        }
                                        if($opt1 != ''){
                                            ?> 
                                                <div class="question-option">
                                                    <input type="radio" name="<?php echo "radioCau$i"?>" id="rl" value="<?php echo $opt1;?>">
                                                    <xmp><?php echo $opt1;?></xmp>
                                                </div>
                                            <?php
                                        }
                                        if($opt2 != ''){
                                            ?> 
                                                <div class="question-option">
                                                    <input type="radio" name="<?php echo "radioCau$i"?>" id="rl" value="<?php echo $opt2;?>" >
                                                    <xmp><?php echo $opt2;?></xmp>
                                                </div>
                                            <?php
                                        }
                                        if($opt3 != ''){
                                            ?> 
                                                <div class="question-option">
                                                    <input type="radio" name="<?php echo "radioCau$i"?>" id="rl" value="<?php echo $opt3;?>" >
                                                    <xmp><?php echo $opt3;?></xmp>
                                                </div>
                                            <?php
                                        }
                                        if($opt4 != ''){
                                            ?> 
                                                <div class="question-option">
                                                    <input type="radio" name="<?php echo "radioCau$i"?>" id="rl" value="<?php echo $opt4;?>" >
                                                    <xmp><?php echo $opt4?></xmp>
                                                </div>
                                            <?php
                                        }
                                    ?>                                 
                                </div>
                            <?php
                        }
                        else if($type == 'ftb'){
                            ?>
                            <div class="qs-nb"><?php echo "Câu ".$i.": "?></div>
                            <?php 
                                        if($img != ''){
                                            ?> 
                                                <div><img src="<?php echo $img?>" alt=""></div> 
                                            <?php
                                        }
                                    ?>
                            <div class="question-wrap">
                                <div class="question"><?php echo $question ;?>(Điền vào ô trống)</div>
                                    <div class="question-option">
                                        <input type="text" name="<?php echo "radioCau$i"?>" id="rl" style="width: 200px; height: 30px; border: 1px solid #b3b3b3; padding: 0 10px; "">
                                    </div>
                            </div>
                            <?php
                        }
                        else if($type == 'mr'){
                            ?>
                                <div class="qs-nb"><?php echo "Câu ".$i.": "?></div>
                                <div class="question-wrap">
                                    <div class="question"><?php echo $question ;?> (Lựa chọn nhiều hơn 1 đáp án)</div>
                                    <?php 
                                        if($img != ''){
                                            ?> 
                                                <div><img src="<?php echo $img?>" alt=""></div> 
                                            <?php
                                        }
                                        if($opt1 != ''){
                                            ?> 
                                                <div class="question-option">
                                                    <input type="checkbox" name="<?php echo "checkCau[$i][]"?>" id="rl" value="<?php echo $opt1;?>">
                                                    <xmp><?php echo $opt1;?></xmp>
                                                </div>
                                            <?php
                                        }
                                        if($opt2 != ''){
                                            ?> 
                                                <div class="question-option">
                                                    <input type="checkbox" name="<?php echo "checkCau[$i][]"?>" id="rl" value="<?php echo $opt2;?>">
                                                    <xmp><?php echo $opt2;?></xmp>
                                                </div>
                                            <?php
                                        }
                                        if($opt3 != ''){
                                            ?> 
                                                <div class="question-option">
                                                    <input type="checkbox" name="<?php echo "checkCau[$i][]"?>" id="rl" value="<?php echo $opt3;?>">
                                                    <xmp><?php echo $opt3;?></xmp>
                                                </div>
                                            <?php
                                        }
                                        if($opt4 != ''){
                                            ?> 
                                                <div class="question-option">
                                                    <input type="checkbox" name="<?php echo "checkCau[$i][]"?>" id="rl" value="<?php echo $opt4;?>">
                                                    <xmp><?php echo $opt4;?></xmp>
                                                </div>
                                            <?php
                                        }
                                        if($opt5 != ''){
                                            ?> 
                                                <div class="question-option">
                                                    <input type="checkbox" name="<?php echo "checkCau[$i][]"?>" id="rl" value="<?php echo $opt5;?>">
                                                    <xmp><?php echo $opt5;?></xmp>
                                                </div>
                                            <?php
                                        }
                                        if($opt6 != ''){
                                            ?> 
                                                <div class="question-option">
                                                    <input type="checkbox" name="<?php echo "checkCau[$i][]"?>" id="rl" value="<?php echo $opt6;?>">
                                                    <xmp><?php echo $opt6;?></xmp>
                                                </div>
                                            <?php
                                        }
                                    ?>
                            </div>
                            <?php
                        }
                    }
                ?> 
                </form>
        </section>
        <?php include './footer.php'?>
    </main>
    <script type="text/javascript">
        setInterval(() => {
            timer();
        }, 1000);
        function timer(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    if(xmlhttp.responseText=="00:00:01"){
                        document.getElementById('submit').click();
                    }
                    document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET" , "forajax/load_timer.php", true);
            xmlhttp.send(null);
        }
    </script>
</body>
</html>