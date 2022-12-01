<?php
    $search ="";
    session_start();
        include '../connect.php';
        $search = "";
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
                Quản lý người dùng
            </div>
            <div class="content-main">
            <h1 style="text-align: center; margin-bottom: 20px;"> Tất cả người dùng</h1>
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
                    "SELECT * FROM  users  ORDER BY id DESC");
                    $count = mysqli_num_rows($res);
                    include '../paginations.php';
                        if(isset($_POST["submit"])){
                            $search = $_POST["search"];
                            $result = mysqli_query($connect , 
                            "SELECT * FROM  users WHERE level = 0 AND ho_ten LIKE '%$search%' ORDER BY id DESC LIMIT  $position , $totalItemspage ");
                            $i =0; 
                            $count = mysqli_num_rows($result);     
                            if($count == 0){
                                ?>
                                    <center>
                                        <h1>No Results Found</h1>
                                    </center>
                                <?php
                            }  
                            else{
                                echo "<table>";
                                echo "<tr>";
                                echo "<th>"; echo "STT"; echo "</th>";
                                echo "<th>"; echo "Họ Tên"; echo "</th>";
                                echo "<th>"; echo "Tài Khoản"; echo "</th>";
                                echo "<th>"; echo "Số điện thoại"; echo "</th>";
                                echo "<th>"; echo "Mật Khẩu"; echo "</th>";
                                echo "<th>"; echo "Ngày Tạo"; echo "</th>";
                                echo "<th>"; echo "Ngày Cập nhật"; echo "</th>";
                                echo "<th>";  echo "</th>";
                                echo "</tr>";
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;
                                    echo "<tr>";
                                    echo "<td>"; echo $i; echo "</td>";
                                    echo "<td>"; echo $row["ho_ten"]; echo "</td>";
                                    echo "<td>"; echo $row["username"]; echo "</td>";
                                    echo "<td>"; echo $row["so_dien_thoai"]; echo "</td>";
                                    echo "<td>"; echo $row["password"]; echo "</td>";
                                    echo "<td>"; echo $row["ngay_tao"]; echo "</td>";
                                    echo "<td>"; echo $row["ngay_cap_nhat"]; echo "</td>";
                                    echo "<td>"; 
                                        echo '<a class=exam-edit href=edit_user.php?id=';echo $row["id"];
                                                echo '>
                                                            Edit
                                            </a>'; echo "</td>";
                                    echo "<td>"; echo '<a class=exam-edit href=delete_user.php?id=';echo $row["id"];
                                                        echo '>
                                                                    Delete
                                                    </a>'; echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                        }
                        else{
                            $result = mysqli_query($connect , 
                            "SELECT * FROM  users WHERE level = 0 ORDER BY id DESC LIMIT  $position , $totalItemspage ");
                            $i =0;    
                            if($count == 0){
                                ?>
                                    <center>
                                        <h1>No Results Found</h1>
                                    </center>
                                <?php
                            }  
                            else{
                                echo "<table>";
                                echo "<tr>";
                                echo "<th>"; echo "STT"; echo "</th>";
                                echo "<th>"; echo "Họ Tên"; echo "</th>";
                                echo "<th>"; echo "Tài Khoản"; echo "</th>";
                                echo "<th>"; echo "Số điện thoại"; echo "</th>";
                                echo "<th>"; echo "Mật Khẩu"; echo "</th>";
                                echo "<th>"; echo "Ngày Tạo"; echo "</th>";
                                echo "<th>"; echo "Ngày Cập nhật"; echo "</th>";
                                echo "<th>";  echo "</th>";
                                echo "</tr>";
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;
                                    echo "<tr>";
                                    echo "<td>"; echo $i; echo "</td>";
                                    echo "<td>"; echo $row["ho_ten"]; echo "</td>";
                                    echo "<td>"; echo $row["username"]; echo "</td>";
                                    echo "<td>"; echo $row["so_dien_thoai"]; echo "</td>";
                                    echo "<td>"; echo $row["password"]; echo "</td>";
                                    echo "<td>"; echo $row["ngay_tao"]; echo "</td>";
                                    echo "<td>"; echo $row["ngay_cap_nhat"]; echo "</td>";
                                    echo "<td>"; 
                                        echo '<a class=exam-edit href=edit_user.php?id=';echo $row["id"];
                                                echo '>
                                                            Edit
                                            </a>'; echo "</td>";
                                    echo "<td>"; echo '<a class=exam-edit href=delete_user.php?id=';echo $row["id"];
                                                        echo '>
                                                                    Delete
                                                    </a>'; echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
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