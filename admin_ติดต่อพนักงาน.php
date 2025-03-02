<?php

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
        header('location: signin.php');
    }
    $admin_id = $_SESSION['admin_login'];
    $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ติดต่อ</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="script.js" defer></script>
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
                    <li><a href="admin.php">หน้าหลัก</a></li>
                    <li><a href="admin_ติดต่อพนักงาน.php">ติดต่อพนักงาน</a></li>
                    <li><a href="signin.php">ออกจากระบบ</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div>
        <table class="table-chat">
            <tr>
                <td class="td-chat">แจ้งปัญหา</td>
            </tr>
            <tr>
                <td class="table-cell">
                    <img src="img\profile.png" class="logo-chat" onclick="window.location.href='admin_ติดต่อพนักงาน_ตอบแชท1.php'">
                    <span class="text-center">ครูแนน</span>
                </td>
                <td class="table-cell">
                    <img src="img\profile.png" class="logo-chat" onclick="window.location.href='admin_ติดต่อพนักงาน_ตอบแชท2.php'">
                    <span class="text-center">แม่น้องนาย</span>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>