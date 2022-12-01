<?php
    session_start();
    include './connect.php';
    $search = "";
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if(isset($_SESSION["username"])){
        $time = "";
        $result = mysqli_query($connect , "SELECT exam_time FROM  exam_results WHERE id_user = '$_SESSION[id_user]'"); 
        while($row1 = mysqli_fetch_array($result)){
            $time =  date("Y-m-d H:i:s", strtotime($row1["exam_time"]."+2 week")); 
        } 
        if(date("Y-m-d H:i:s") > $time){
            mysqli_query($connect , "UPDATE exam_user_category SET level = '0' WHERE id_user = '$_SESSION[id_user]'");              
        }
    }
    if(isset($_POST["submit"])){
        if(!isset($_SESSION["username"])){
            ?>
                <script type="text/javascript">
                    window.location = "login.php";
                </script>
            <?php
        }
    }
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
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
    <style>
    <?php include './assets/style.css' ?>

    </style>
</head>
<body>
    <?php include 'header.php';?>
    <?php include 'Banner.php';?>
    <main class="main">
        <div class="max-w-container">
            <?php 
            $spl = "SELECT * FROM exam_course";
            $result = mysqli_query($connect , $spl);
            while ($row = mysqli_fetch_array($result)){
            ?> 
                <div class="category-sections">
                <h2 class="category-heading"><?php echo $row["course"]?></h2>
                <div class="category-list">
                    <?php 
                        $spl1 = "SELECT * FROM exam_courseContent WHERE course_id = '$row[id]'";
                        $result1 = mysqli_query($connect , $spl1);
                        while ($row1 = mysqli_fetch_array($result1)){
                            ?>
                               <a href="select_exam.php?content_id=<?php echo $row1['id'];?>" class="content-wrap">
                                    <img src="assets/images/backgroundstudyhard.jpg" 
                                        class="content-img"
                                        alt="">
                                    <div class="content-info">
                                        <div class="content-icon">
                                            <i class="fas fa-mosque"></i>
                                            <h3 class="content-heading"><?php echo $row1['name'];?></h3>
                                        </div>
                                    </div>
                                </a>  
                            <?php
                        }
                    ?>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </main>
    <?php include 'footer.php';?>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider').slick({
                infinite: true,
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                draggable: false,
                prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
            });
            });
            
    </script>
</body>
</html>