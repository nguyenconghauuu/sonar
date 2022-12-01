<?php
    session_start();
        include '../connect.php';
        $id = $_GET['id'];
        $spl = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($connect , $spl);
        while ($row = mysqli_fetch_array($result)) {
            $name = $row['ho_ten'];
            $sdt = $row['so_dien_thoai'];
            $username = $row['username'];
            $password = $row['password'];
        }

        $message = "";
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $sdt = $_POST['sdt'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $spl = "SELECT * FROM users WHERE username = '$username' AND id NOT LIKE '$id'";
                $result = mysqli_query($connect , $spl);
                if(!(mysqli_num_rows($result) > 0)){
                    $spl = "UPDATE  users set ho_ten = '$name',username = '$username' , so_dien_thoai = '$sdt' , password = '$password' WHERE id = '$id'";
                    $result = mysqli_query($connect , $spl);
                    ?>
                        <script type="text/javascript">
                            window.location = "manage_users.php";
                        </script>
                    <?php  
                }
                else{
                    $message = '<div class="form-message">Tài khoản đã tồn tại</div>';

                }                      
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        <?php include "./assets/main.css" ?>
    </style>
</head>
<body>
    <div class="main">
    <?php include 'Header.php';?>
        <div class="content-body">
            <div class="content-top">
                Edit User
            </div>
            <div class="content-main">
                <div class="content-wrap">
                    <div class="add-exam">
                        <h3 class="exam-heading">Sửa thông tin người dùng</h3>
                        <form action="" method="POST" class="form">
                            <div class="form-group">
                                <label for="username" class="form-control-label">Họ Tên</label>
                                <input type="text" placeholder="Họ và Tên" value="<?php echo $name;?>"  required name="name" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-control-label">Username</label>
                                <input type="text" placeholder="Username" value="<?php echo $username;?>"  required name="username" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-control-label">Số Điện Thoại</label>
                                <input type="text" placeholder="Số Điện thoại" value="<?php echo $sdt;?>"  required name="sdt" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Password</label>
                                <input type="text" placeholder="Password" value="<?php echo $password;?>" required name="password" class="form-input">
                            </div>
                            <button class="btn" name = "submit">Update Exam</button>
                            <?php echo $message;?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>