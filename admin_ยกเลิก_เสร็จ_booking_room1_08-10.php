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
    <title>หน้าหลัก</title>
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
                    <li><a href="admin_ติดต่อพนักงาน.php">ติดต่อพนักงาน</a></li>
                    <li><a href="signin.php">ออกจากระบบ</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!--ส่วนตาราง-->
    <h1 class="h1-main">ตารางเวลา</h1>
    <table class="table-main">
        <tr>
            <td>ห้อง/เวลา</td>
            <td>08:00-09:00 น.</td>
            <td>09:00-10:00 น.</td>
            <td>10:00-11:00 น.</td>
            <td>11:00-12:00 น.</td>
            <td>12:00-13:00 น.</td>
            <td>13:00-14:00 น.</td>
            <td>14:00-15:00 น.</td>
            <td>15:00-16:00 น.</td>
        </tr>
        <tr>
            <td>CE01</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2" class="room-booked admin" onclick="window.location.href='admin_ยกเลิก_booking_room1_14-16.php'">คุณรินรพัชร แสนคำ <br> 14:00 - 16:00 น.</td>
        </tr>
        <tr>
            <td>CE02</td>
            <td></td>
            <td></td>
            <td colspan="2" class="room-booked admin" onclick="window.location.href='admin_ยกเลิก_booking_room2_10-12.php'">คุณพิทักษ์ ยอดศักร์ <br> 10:00 - 12:00 น.</td>
            <td colspan="2" class="room-booked admin" onclick="window.location.href='admin_ยกเลิก_booking_room2_12-14.php'">คุณเกียรติศักต์ ว่าน้อย <br> 12:00 - 14:00 น.</td>
            <td></td>
            <td></td>
        </tr>
    </table>
    </div>
</body>
</html>