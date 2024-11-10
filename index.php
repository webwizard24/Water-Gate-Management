<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบบริหารจัดการประตูระบายน้ำ</title>
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
            justify-content: center;
            flex: 1;
            padding: 40px;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 40px;
        }

        .button {
            background-color: #2a9df4;
            color: white;
            padding: 15px 30px;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
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
        <h1>ระบบบริหารจัดการประตูระบายน้ำ</h1>
    </header>

    <!-- คอนเทนต์หลัก -->
    <div class="container">
        <h1>ยินดีต้อนรับสู่ระบบ</h1>
        <p>ระบบช่วยให้การควบคุมและบริหารจัดการประตูระบายน้ำเป็นไปอย่างมีประสิทธิภาพ</p>
        <a href="menu.php" class="button">ไปที่เมนู</a>
    </div>

    <!-- ส่วนท้าย -->
    <footer>
        <p>ติดต่อเรา: info@example.com | โทร: 02-123-4567</p>
    </footer>

</body>

</html>