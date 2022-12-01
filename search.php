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
    if(isset($_GET["search"])){
        $search = $_GET["search"];
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
    <style>
    <?php include './assets/style.css' ?>

    </style>
</head>
<body>
    <?php include 'header.php';?>
    <main class="main">
        <section class="section-content max-w-container section-mt">
            <?php
                $count =0;
                $spl = "SELECT * FROM exam_courseContent where name LIKE '%$search%' ORDER BY name ASC";
                $result = mysqli_query($connect , $spl);
                $count = mysqli_num_rows($result);
                if($count == 0) {
                    ?>
                        <div class="max-w-container no-CLass">
                            <img src="https://cf.quizizz.com/img/empty-state/empty-state-generic.png">
                            Không thể tìm thấy một bài kiểm tra bạn đang tìm kiếm?
                        </section>
                    </div>
                    <?php
                }
                else{
                    ?> <div class="col-2"><?php
                    while ($row = mysqli_fetch_array($result)){
                        ?>
                                <a href="select_exam.php?content_id=<?php echo $row['id'];?>" class="content-wrap">
                                    <img src="https://img5.thuthuatphanmem.vn/uploads/2021/10/22/background-ban-hoc-tap_090656909.jpg" 
                                        class="content-img"
                                        alt="">
                                    <div class="content-info">
                                        <div class="content-icon">
                                            <i class="fas fa-mosque"></i>
                                            <h3 class="content-heading"><?php echo $row['name'];?></h3>
                                        </div>
                                    </div>
                                </a>               
                                <?php      
                            }
                }
            ?>
             </div>
        </section>
    </main>
    <?php include 'footer.php';?>
</body>
</html>

