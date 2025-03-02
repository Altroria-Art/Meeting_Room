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
    <title>ห้องจอง</title>
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
                    <li><a href="admin.php">หน้าหลัก</a></li>
                    <li><a href="admin_ติดต่อพนักงาน.php">ติดต่อพนักงาน</a></li>
                    <li><a href="signin.php">ออกจากระบบ</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!--ห้องจอง-->
    <div>
        <table class="table-booked">
            <tr>
                <td rowspan="9"><img src="img\ห้องประชุมว่าง.jpg" title="ห้องประชุม" class="image-room"></td>
            </tr>
            <tr>
                <td class="td-text-book-bold"><label>ห้องประชุม :</label></td>.
            </tr>
            <tr>
                <td class="td-text-book-border"><div><h3>CE01</h3></div></td>
            </tr>
            <tr>
                <td class="td-text-book-bold"><label>เวลาที่จอง :</label></td>.
            </tr>
            <tr>
                <td class="td-text-book-border"><div><h3>14:00 - 16:00 น.</h3></div></td>
            </tr>
            <tr>
                <td class="td-text-book-bold"><label>ชื่อคนจอง :</label></td>.
            </tr>
            <tr>
                <td class="td-text-book-border"><div><h3>คุณรินรพัชร แสนคำ</h3></div></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="button" class="botton-red" onclick="confirmCancellation()">ยกเลิกการจองห้องประชุม</button>
                </td>
            </tr>
        </table>
    </div>
    <script>
        const roomTimes = {
            room1: ["10:00 - 12:00", "12:00 - 14:00"],
            room2: ["08:00 - 10:00", "14:00 - 16:00"]
        };

        function updateTimeOptions() {
            var roomSelect = document.getElementById("room");
            var timeSelect = document.getElementById("time");

            timeSelect.innerHTML = '<option value="">-- กรุณาเลือกเวลา --</option>';

            if (roomSelect.value) {
                var availableTimes = roomTimes[roomSelect.value];

                availableTimes.forEach(time => {
                    var option = document.createElement("option");
                    option.value = time;
                    option.textContent = time;
                    timeSelect.appendChild(option);
                });

                timeSelect.disabled = false;
            } else {
                timeSelect.disabled = true;
            }
        }

        function redirectToBookingPage() {
            var roomSelect = document.getElementById("room").value;
            var timeSelect = document.getElementById("time").value;

            if (!roomSelect || !timeSelect) {
                alert("กรุณาเลือกห้องประชุมและเวลาที่ต้องการจอง!");
                return;
            }

            var url = "";

            if (roomSelect === "room1" && timeSelect === "10:00 - 12:00") {
                url = "booking_room1_10-12.php";
            } else if (roomSelect === "room1" && timeSelect === "12:00 - 14:00") {
                url = "booking_room1_12-14.php";
            } else if (roomSelect === "room2" && timeSelect === "08:00 - 10:00") {
                url = "booking_room2_08-10.php";
            } else if (roomSelect === "room2" && timeSelect === "14:00 - 16:00") {
                url = "booking_room2_14-16.php";
            }

            if (url) {
                alert("จองห้องสำเร็จแล้ว! ระบบกำลังพาไปหน้าถัดไป...");
                window.location.href = url;
            } else {
                alert("เกิดข้อผิดพลาดในการเลือกห้องและเวลา");
            }
        }

        function confirmCancellation() {
            var confirmCancel = confirm("คุณแน่ใจหรือไม่ว่าต้องการยกเลิกการจองห้องประชุม?");
            if (confirmCancel) {
                alert("การจองห้องประชุมถูกยกเลิกเรียบร้อยแล้ว");
                window.location.href = 'admin_ยกเลิก_เสร็จ_booking_room1_14-16.php';
            }
        }
    </script>   
</body>
</html>