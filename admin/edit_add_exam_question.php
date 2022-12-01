<?php
session_start();
include '../connect.php';
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
            text-align: center;
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
            Danh sách bài thi
            </div>
            <div class="content-main">
                
                <?php
                    $count =0; 
                    $spl = "SELECT * FROM exam_category";
                    $result = mysqli_query($connect , $spl);
                    $count = mysqli_num_rows($result);
                    $id = $_GET['content_id'];
                    include '../paginations.php';
                    $result = mysqli_query($connect , 
                    "SELECT * FROM  exam_category where content_id = '$id'  LIMIT  $position , $totalItemspage");
                    $i =0;    
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
                            <th> STT </th>
                            <th> Tên Bài Thi </th>
                            <th> Thời Gian </th>
                            <th> Hoạt động </th>
                            </tr>
                        <?php
                        while($row = mysqli_fetch_array($result)) {
                            $i++;
                            ?>
                                <tr>
                                <td> <?php echo $i; ?></td>
                                <td> <?php echo $row["category"];?> </td>
                                <td> <?php echo $row["exam_time"];?> </td>
                                <td> 
                                    <a class="exam-edit" href="edit_add_question.php?category_id=<?php echo $row['id'];?>&&content_id=<?php echo $id;?>">
                                                    Thêm câu hỏi
                                        </a> 
                                </td>
                                </tr>
                            <?php
                        }
                        echo "</table>";
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