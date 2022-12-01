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
        th ,td{
            padding: 7px;
        }
        table ,th ,td{
            border: 1px solid black;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            }
    </style>
</head>
<body>
    <main class="main">
        <section class="section-content max-w-container section-wrap section-mt">
            
            <?php
                    $res = mysqli_query($connect , 
                    "SELECT * FROM  exam_results WHERE id_user = '$_SESSION[id_user]'  ORDER BY id DESC");
                    $count =0;
                    $count= mysqli_num_rows($res);
                    include 'paginations.php';
                    $count =0;
                    $result = mysqli_query($connect , "SELECT * FROM  exam_results WHERE id_user = '$_SESSION[id_user]' ORDER BY id DESC LIMIT  $position , $totalItemspage"); 
                    $count = mysqli_num_rows($result);
                    if($count == 0){
                        ?>
                            <center>
                                <h1> Bạn chưa có hoạt động nào !</h1>
                                <img style ="width: 400px;" src="https://cf.quizizz.com/game/img/ui/activity_empty-state%402x.png">
                            </center>
                        <?php
                    }      
                    else{
                        ?> <h1 style="text-align: center; margin-bottom: 20px;"> Tổng Hợp Kết Quả Bài Thi</h1>
                        <table>
                        <tr>
                        <th> Họ Tên </th>
                            <th> Môn Học </th>
                            <th> Tên Bài Thi </th>
                            <th> Số Câu hỏi </th>
                            <th> Số Đáp Án Đúng </th>
                            <th> Số Câu Sai </th>
                            <th> Điểm </th>
                            <th> Thời Gian </th>
                        </tr>
                        <?php 
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                <td> <?php echo $row["ho_ten"];?> </td>
                                <td> 
                                    <?php 
                                        $spl1 = "SELECT * FROM exam_courseContent WHERE id = '$row[content_id]'";
                                        $result1 = mysqli_query($connect , $spl1);
                                        while ($row1 = mysqli_fetch_array($result1)){
                                            ?>
                                                <?php echo $row1["name"]?>
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td> 
                                    <?php 
                                        $spl1 = "SELECT * FROM exam_category WHERE id = '$row[category_id]'";
                                        $result1 = mysqli_query($connect , $spl1);
                                        while ($row1 = mysqli_fetch_array($result1)){
                                            ?>
                                                <?php echo $row1["category"]?>
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td> <?php echo $row["total_question"]; ?></td>
                                <td> <?php echo $row["correct_answer"]; ?></td>
                                <td> <?php echo $row["wrong_answer"]; ?></td>
                                <td> <?php echo $row["point"];?> </td>
                                <td> <?php echo $row["exam_time"];?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </table>
                        <?php
                    }
               ?>
               <div id="pagination">
                    <?php echo $pageHtml;?>
                </div>
        </section>
    </main>

    <?php include 'footer.php'?> 
</body>
</html>