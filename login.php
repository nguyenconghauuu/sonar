<?php
    error_reporting(0);
    session_start();
    require_once('function.php');
    include './connect.php';
    if(isset($_POST['submit'])){
        $err = array();
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $message = "";
        if(checkUsername($username) == false){
            $err['username'] = "Giá trị này không hợp lệ, ít nhất năm ký tự , bắt đầu bằng chữ cái";
            $username = "";
        }
        if(checkPassword($_POST['password']) == false){
            $err['password'] = "Tối thiểu sáu ký tự, ít nhất một chữ cái và một số";
            $password = "";
        } 
        if(checkUsername($username) == true && checkPassword($_POST['password']) == true){
                $spl = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                $result = mysqli_query($connect , $spl);
                if(mysqli_num_rows($result) > 0){
                    while($rows = mysqli_fetch_array($result)){
                        if($rows['level'] == '0'){
                            $_SESSION['username'] = $rows['username'];
                            $_SESSION['name'] = $rows['ho_ten'];
                            $_SESSION['id_user'] = $rows['id'];
                            $connect->close();
                            header('location: select_course.php');
                        }
                        if($rows['level'] == '1'){
                            header('location: ./admin/exam_course.php');
                        }
                    }
                }
                else{
                    $message = '<div class="form-message">Tài khoản hoặc mật khẩu không chính xác</div>';
                    // echo "<script>alert('Tài khoản hoặc mật khẩu không  chính xác')</script>";
                }              
            }               
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/images/logo_khoa.ico">
    <title>Hệ Thống học tập trực tuyến - Trường Đại Học Sư Phạm Hà Nội</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
    <?php include './assets/style.css' ?>

    </style>  
    
</head>
<body>
    <main class="container bg">
        <div class="form-section">
            <h3 class="heading">
                Đăng Nhập
            </h3>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Tên Đăng Nhập</label>
                    <div class="form-wrap">
                        <input type="text" name ="username" id="user" placeholder="Username" value ="<?php echo $username?>" class="form-input">
                        <i class="fas fa-user-alt input-icon"></i>
                    </div>
                    <div class="form-message"><?php echo $err['username']?></div>
                </div>
                <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <div class="form-wrap">
                        <input type="password" name ="password" id="pass" placeholder="Password" class="form-input">
                        <i class="fas fa-key input-icon"></i>
                    </div>
                    <div class="form-message"><?php echo $err['password']?></div>
                </div>
                <button class="btn btn-mg" name="submit">Đăng Nhập</button>
                <div class="form-message"><?php echo $message?></div>
                <div class="form-direction">
                    <span>Bạn chưa có tài khoản ?</span>
                    <a href="./register.php" class="form-link">Đăng Ký</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>