<?php

    session_start();
    require_once 'config/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration System PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <!--พื้นหลัง-->
    <div class="background"></div>
    <!--แถบข้างบน-->
    <div>
        <nav class="tap-bar">
            <div class="sub-tap-bar">
                <div><img src="img\logo-เว็บ.png" class="logo"></div>
                <ul>
                    <li><a href="signin.php">เข้าสู่ระบบ</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!--เมนูเข้าสู่ระบบ-->
        <form action="signup_db.php" method="post">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>
            <!--เมนูสมัครสมาชิก-->
            <table class="table-login">
                <tr>
                    <td class="text-login"><label for="firstname">First name</label></td>
                </tr>
                <tr>
                    <td class="input-box"><input type="text" placeholder="กรอกชื่อ" name="firstname" aria-describedby="firstname"></td>
                </tr>
                <tr>
                    <td class="text-login"><label for="lastname">Last name</label></td>
                </tr>
                <tr>
                    <td class="input-box"><input type="text" placeholder="นามสกุล" name="lastname" aria-describedby="lastname"></td>
                </tr>
                <tr>
                    <td class="text-login"><label for="email">Email</label></td>
                </tr>
                <tr>
                    <td class="input-box"><input type="email" placeholder="กรอกอีเมล" name="email" aria-describedby="email"></td>
                </tr>
                <tr>
                    <td class="text-login"><label for="password">Password</label></td>
                </tr>
                <tr>
                    <td class="input-box"><input type="password" placeholder="กรอกรหัสผ่าน" name="password"></td>
                </tr>
                <tr>
                    <td class="text-login"><label for="confirm password" class="form-label">Confirm Password</label></td>
                </tr>
                <tr>
                    <td class="input-box"><input type="password" placeholder="ยืนยันรหัสผ่าน" name="c_password"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="signup" class="login-botton">Sign Up</button></td>
                </tr>
            </table>
            </form>
</body>
</html>