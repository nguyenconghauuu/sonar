<?php
    session_start();
    include './connect.php';
    $search = "";
    date_default_timezone_set('Asia/Ho_Chi_Minh');
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
    <title>Hệ Thống học tập trực tuyến </title>
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
        <section class="section-content max-w-container section-mt">
                <?php 
                    $spl1 = "SELECT * FROM exam_courseContent WHERE id = '$_GET[content_id]'";
                    $result1 = mysqli_query($connect , $spl1);
                    while ($row1 = mysqli_fetch_array($result1)){
                        ?>
                            <h1 class="heading bold"><?php echo $row1["name"]?></h1>
                        <?php
                    }
                    ?>
                <?php
                $spl = "SELECT * FROM exam_category where content_id ='$_GET[content_id]'";
                $result = mysqli_query($connect , $spl);
                while ($row = mysqli_fetch_array($result)){
                        ?>
                        <div class="content-main">
                        <h1><?php echo $row['category'];?></h1>   
                        <?php 
                        if($row['File'] !== ""){
                            ?>
                            <a href="./uploads/<?php echo $row['File']?>"><img src="https://cst.hnue.edu.vn/theme/image.php/space/core/1664163203/f/pdf-24" class="iconlarge activityicon" alt="" role="presentation" aria-hidden="true"></a>   
                            <?php
                        }
                        ?> 
                        <div class="content-wrap with">
                        <a href="dashboard.php?category_id=<?php echo $row['id'];?>&&content_id=<?php echo $row['content_id'];?>" class="btn btn-img">Vao lam</a>
                            <div class="content-info">
                                <div class="content-icon">
                                    <i class="fas fa-mosque"></i>
                                    <h3 class="content-heading"><?php echo $row['category'];?></h3>
                                </div>
                                <div class="content-bottom">
                                    <?php 
                                    $spl5 = "SELECT * FROM questions WHERE content_id = '$row[content_id]' && category_id = '$row[id]'";
                                    $result5 = mysqli_query($connect , $spl5);
                                    $count5 = mysqli_num_rows($result5);
                                    if($count5 >= 20){
                                        ?>
                                            <div class="content-submit">
                                                <a href="dashboard.php?category_id=<?php echo $row['id'];?>&&content_id=<?php echo $row['content_id'];?>" class="btn btn-submit">Vao lam</a>
                                            </div>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <div class="content-submit">
                                            <button type="" disabled class="btn btn-submit btn-disabled">Dang xu ly...</button>
                                        </div>
                                        <?php
                                    }
                                ?>
                                </div>
                        </div>                   
                        </div>
                        </div>
                        <?php       
                        }
            ?>
        </section>
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

