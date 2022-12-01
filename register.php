<?php
    error_reporting(0);
    require_once('function.php');
    include './connect.php';
    $username = "";
    $password = "";
    $cpassword = "";
    if(isset($_POST['submit'])){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date  = date("Y-m-d H:i:s");
        $err = array();
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $name = trim($_POST['name']);
        $sdt = trim($_POST['sdt']);
        $message = "";
        if($name == ""){
            $err['name'] = "vui lòng nhập họ tên!";
            $name = "";
        }
        if(checkUsername($username) == false){
            $err['username'] = "Giá trị này không hợp lệ, ít nhất năm ký tự , bắt đầu bằng chữ cái";
            $username = "";
            $cpassword = "";
        }
        if($sdt == ""){
            $err['sdt'] = "vui lòng nhập số điện thoại!";
            $sdt = "";
        }
        if(checkPassword($_POST['password']) == false){
            $err['password'] = "Tối thiểu sáu ký tự, ít nhất một chữ cái và một số";
            $password = "";
            $cpassword = "";
        }
        if(checkPassword($_POST['cpassword']) == false){
            $err['cpassword'] = "Tối thiểu sáu ký tự, ít nhất một chữ cái và một số";
            $password = "";
            $cpassword = "";
        }
        if($name != ""&& $sdt !="" && checkUsername($username) == true && checkPassword($_POST['password']) == true && checkPassword($_POST['cpassword']) == true){
            if($password == $cpassword){
                $spl = "SELECT * FROM users WHERE username = '$username'";
                $result = mysqli_query($connect , $spl);
                if(!(mysqli_num_rows($result) > 0)){
                    $query = "INSERT INTO users (ho_ten , username , so_dien_thoai, password , level , ngay_tao) 
                                VALUES ('$name' , '$username' , '$sdt','$password' , '0' , '$date')";
                    $result = mysqli_query($connect , $query);
                    if($result){
                        echo "<script>alert('Chúc mừng bạn đã đăng ký tài khoản thành công!')</script>";
                        // $result = mysqli_query($connect , "SELECT * FROM users WHERE username = '$username'");
                        // while($row = mysqli_fetch_array($result)) {
                        //     mysqli_query($connect , "UPDATE exam_category SET id_user = '$row[id]'");
                        // }
                        // mysqli_query($connect , "INSERT INTO exam_user_category (id , category ,id_user) SELECT id,category,id_user FROM exam_category");
                        $result = mysqli_query($connect , "SELECT `exam_category`.`category`, `users`.`id` FROM `exam_category`,`users` WHERE username = '$username'");
                        while($row = mysqli_fetch_array($result)) {
                            mysqli_query($connect , "INSERT INTO exam_user_category (id , category ,id_user) VALUES (null , '$row[category]' , '$row[id]')");
                        }
                        $username = "";
                        $password = "";
                        $cpassword = "";
                        header("Location: login.php");
                    }   
                    $connect->close();
                }
                else{
                    $message = '<div class="form-message">Tài khoản đã tồn tại</div>';
                    $username = "";
                    $password = "";
                    $cpassword = "";
                    // echo "<script>alert('Tài khoản đã tồn tại')</script>";
                }
            }
            else{
                $message = '<div class="form-message">mật khẩu Nhập lại không chính xác!</div>';
                // echo "<script>alert('mật khẩu Nhập lại không chính xác!')</script>";
                $cpassword = "";
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
                Đăng Ký thành viên
            </h3>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Họ và tên</label>
                    <div class="form-wrap">
                        <input type="text" name ="name" id="user" placeholder="Họ Và Tên" value ="<?php echo $name?>"  class="form-input">
                        <i class="fas fa-user-alt input-icon"></i>
                    </div>
                    <div class="form-message"><?php echo $err['name']?></div>
                </div>
                <div class="form-group">
                    <label for="username">Tên Đăng Nhập</label>
                    <div class="form-wrap">
                        <input type="text" name ="username" id="user" placeholder="Username" value ="<?php echo $username?>"  class="form-input">
                        <i class="fas fa-user-alt input-icon"></i>
                    </div>
                    <div class="form-message"><?php echo $err['username']?></div>
                </div>
                <div class="form-group">
                    <label for="username">Số Điện thoại</label>
                    <div class="form-wrap">
                        <input type="number" name ="sdt" id="user" placeholder="Số điện thoại" value ="<?php echo $sdt?>"  class="form-input">
                        <i class="fas fa-phone input-icon"></i>
                    </div>
                    <div class="form-message"><?php echo $err['sdt']?></div>
                </div>
                <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <div class="form-wrap">
                        <input type="password" name ="password" id="pass" placeholder="Password" value ="<?php echo $password?>"  class="form-input">
                        <i class="fas fa-key input-icon"></i>
                    </div>
                    <div class="form-message"><?php echo $err['password']?></div>
                </div>
                <div class="form-group">
                    <label for="password-confirm">Nhập lại mật khẩu</label>
                    <div class="form-wrap">
                        <input type="password" name ="cpassword" id="pass-confirm" value ="<?php echo $cpassword?>" placeholder="Confirm Password"  class="form-input">
                        <i class="fas fa-key input-icon"></i>
                    </div>
                    <div class="form-message"><?php echo $err['cpassword']?></div>
                </div>
                <button class="btn btn-mg" name="submit" type="submit">Đăng Ký</button>
                <?php echo $message?>
                <div class="form-direction">
                    <span>Bạn đã có tài khoản ?</span>
                    <a href = "./login.php" class="form-link">Đăng nhập</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>