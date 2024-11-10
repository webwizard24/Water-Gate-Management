<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เมนูหลัก - ระบบบริหารจัดการประตูระบายน้ำ</title>
    <style>
        /* รีเซ็ตค่าพื้นฐาน */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
            background-color: #f0f8ff;
            color: #333;
        }

        /* แถบหัวข้อ */
        header {
            background-color: #2a9df4;
            padding: 20px;
            color: white;
            text-align: center;
        }

        /* คอนเทนต์หลัก */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .menu-item {
            background-color: #2a9df4;
            color: white;
            padding: 15px 30px;
            font-size: 1.2em;
            margin: 10px;
            border-radius: 5px;
            text-decoration: none;
            width: 200px;
            text-align: center;
        }

        .menu-item:hover {
            background-color: #2389c9;
        }

        /* ส่วนท้าย */
        footer {
            background-color: #2a9df4;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- แถบหัวข้อด้านบน -->
    <header>
        <h1>เมนูหลัก - ระบบบริหารจัดการประตูระบายน้ำ</h1>
    </header>

    <!-- คอนเทนต์หลัก -->
    <div class="container">
        <h1>เมนูหลัก</h1>

        <!-- ลิงก์ไปยังฟังก์ชันต่างๆ -->
        <a href="manage_gates.php" class="menu-item">จัดการประตูระบายน้ำ</a>

    </div>

    <!-- ส่วนท้าย -->
    <footer>
        <p>ติดต่อเรา: info@example.com | โทร: 02-123-4567</p>
    </footer>

</body>

</html>