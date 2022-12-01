
<?php
$search ="";
    session_start();
        include '../connect.php';
        if(isset($_POST["submit"])){
            $search = $_POST["search"];
        } 
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
    th ,td{
            padding: 7px;
        }
        table ,th ,td{
            border: 1px solid #d3d4d6;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            }
    </style>
</head>
<body>
    <div class="main">
    <?php include 'Header.php';?>
        <div class="content-body">
            
            <div class="content-top">
                Tất Cả Kết Quả Bài Thi
            </div>
            <div class="content-main">
            <h1 style="text-align: center; margin-bottom: 20px;"> Tổng Hợp Kết Quả Bài Thi</h1>
            <div class="content-form">
                <form action="" method="POST">
                    <div class="form-search">
                        <label for="search" class="form-label">Search</label>
                        <input type="text" name="search" class="search" value="<?php echo $search;?>">
                        <button class="search-submit" name="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
                <?php
                    $count =0;
                    $res = mysqli_query($connect , 
                    "SELECT * FROM  exam_results  ORDER BY id DESC");
                    $count = mysqli_num_rows($res);
                    include '../paginations.php';
                    if(isset($_POST["submit"])){
                        $search = $_POST["search"];
                        $result = mysqli_query($connect , 
                        "SELECT * FROM  exam_results WHERE ho_ten LIKE '%$search%' ORDER BY point DESC LIMIT  $position , $totalItemspage");
                        $count = mysqli_num_rows($result);
                        if($count == 0){
                            ?>
                                <center>
                                    <h1>No Results Found</h1>
                                </center>
                            <?php
                        }      
                        else{
                            ?> 
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
                    }
                    else{
                        $result = mysqli_query($connect , 
                        "SELECT * FROM  exam_results ORDER BY id DESC LIMIT  $position , $totalItemspage");
                        if($count == 0){
                            ?>
                                <center>
                                    <h1>No Results Found</h1>
                                </center>
                            <?php
                        }      
                        else{
                            ?> 
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
                    }
               ?>
               <div id="pagination">
                    <?php echo $pageHtml;?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>