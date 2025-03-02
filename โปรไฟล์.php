<?php

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
        header('location: signin.php');
    }
    $user_id = $_SESSION['user_login'];
    $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์</title>
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
                    <li><a href="user.php">หน้าหลัก</a></li>
                    <li><a href="user_ติดต่อพนักงาน.php">ติดต่อพนักงาน</a></li>
                    <li><a href="โปรไฟล์.php">โปรไฟล์</a></li>
                    <li><a href="signin.php">ออกจากระบบ</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!--โปรไฟล์-->
    <table class="table-profile">
        <tr class="tr-text-center">
            <td><img class="logo-profile" src="img\profile.png"></td>
        </tr>
        <tr class="tr-text-center">
            <td class="td-text">โปรไฟล์ผู้ใช้</td>
        </tr>
        <tr>
            <td class="td-text">ชื่อผู้ใช้ : <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></td>
        </tr>
        <tr>
            <td class="td-text">อีเมล : <?php echo $row['email']?></td>
        </tr>
    </table>
</body>
</html>