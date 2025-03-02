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
                    <li><a href="user_ติดต่อพนักงาน.php">ติดต่อพนักงาน</a></li>
                    <li><a href="โปรไฟล์.php">โปรไฟล์</a></li>
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
            <td colspan="2" class="room-booked">คุณนรงค์ศักร์ ใจยอด <br> 08:00 - 10:00 น.</td>
            <td></td>
            <td></td>
            <td colspan="2" class="me-booked" onclick="window.location.href='user_ยกเลิก_booking_room1_12-14.php'">คุณ<?php echo $row['firstname'] . ' ' . $row['lastname']; ?>  <br> 12:00 - 14:00 น.</td>
            <td colspan="2" class="room-booked">คุณรินรพัชร แสนคำ <br> 14:00 - 16:00 น.</td>
        </tr>
        <tr>
            <td>CE02</td>
            <td></td>
            <td></td>
            <td colspan="2" class="room-booked">คุณพิทักษ์ ยอดศักร์ <br> 10:00 - 12:00 น.</td>
            <td colspan="2" class="room-booked">คุณเกียรติศักต์ ว่าน้อย <br> 12:00 - 14:00 น.</td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <!--ปุ่มดูห้องที่คนจอง-->
    <div class="booking-container">
        <button class="booking-button" type="submit" onclick="window.location.href='user_ยกเลิก_booking_room1_12-14.php'">ดูห้องที่คุณจอง</button>
    </div>
    </div>
</body>
</html>