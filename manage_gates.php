<?php
// เชื่อมต่อฐานข้อมูล
include 'db_connect.php';

// การเพิ่มข้อมูล
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $type = $_POST['type'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $thickness_body = $_POST['thickness_body'];
    $thickness_cover = $_POST['thickness_cover'];
    $A1 = $_POST['A1'];
    $A2 = $_POST['A2'];
    $B1 = $_POST['B1'];
    $B2 = $_POST['B2'];
    $C1 = $_POST['C1'];
    $C2 = $_POST['C2'];
    $D1 = $_POST['D1'];
    $D2 = $_POST['D2'];

    $sql = "INSERT INTO gate_management (type, width_cm, height_cm, thickness_body_cm, thickness_cover_cm, reinforcement_A1, reinforcement_A2, reinforcement_B1, reinforcement_B2, reinforcement_C1, reinforcement_C2, reinforcement_D1, reinforcement_D2)
            VALUES ('$type', '$width', '$height', '$thickness_body', '$thickness_cover', '$A1', '$A2', '$B1', '$B2', '$C1', '$C2', '$D1', '$D2')";

    if ($conn->query($sql) === TRUE) {
        echo "เพิ่มข้อมูลสำเร็จ";
    } else {
        echo "เกิดข้อผิดพลาด: " . $conn->error;
    }
}

// การแก้ไขข้อมูล
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $thickness_body = $_POST['thickness_body'];
    $thickness_cover = $_POST['thickness_cover'];
    $A1 = $_POST['A1'];
    $A2 = $_POST['A2'];
    $B1 = $_POST['B1'];
    $B2 = $_POST['B2'];
    $C1 = $_POST['C1'];
    $C2 = $_POST['C2'];
    $D1 = $_POST['D1'];
    $D2 = $_POST['D2'];

    $sql = "UPDATE gate_management SET 
                type='$type', 
                width_cm='$width', 
                height_cm='$height', 
                thickness_body_cm='$thickness_body', 
                thickness_cover_cm='$thickness_cover', 
                reinforcement_A1='$A1', 
                reinforcement_A2='$A2', 
                reinforcement_B1='$B1', 
                reinforcement_B2='$B2', 
                reinforcement_C1='$C1', 
                reinforcement_C2='$C2', 
                reinforcement_D1='$D1', 
                reinforcement_D2='$D2' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "แก้ไขข้อมูลสำเร็จ";
    } else {
        echo "เกิดข้อผิดพลาดในการแก้ไขข้อมูล: " . $conn->error;
    }
}

// การลบข้อมูล
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM gate_management WHERE id=$id";
    $conn->query($sql);
}

// ตรวจสอบว่ามีการขอแก้ไขข้อมูล
$edit = false;
if (isset($_GET['edit'])) {
    $edit = true;
    $id = $_GET['edit'];
    $sql = "SELECT * FROM gate_management WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// การดึงข้อมูลทั้งหมดจากฐานข้อมูล
$sql = "SELECT * FROM gate_management";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการประตูระบายน้ำ</title>
    <style>
        /* จัดวางเนื้อหาให้อยู่กลางหน้าจอและมีขอบ */
        body {
            font-family: Arial, sans-serif;
            background-color: #e3f2fd;
            /* สีฟ้าอ่อนสำหรับพื้นหลัง */
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* กำหนดให้เนื้อหาหลักมีขอบที่ไม่ชิดเกินไป */
        .container {
            width: 100%;
            max-width: 1200px;
            /* จำกัดความกว้างของเนื้อหา */
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            color: #1e88e5;
            /* สีฟ้าเข้มสำหรับหัวข้อ */
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        /* ปรับความกว้างของฟอร์มและตารางให้อยู่ภายในขอบ */
        .form-container,
        .table-container {
            width: 100%;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #1565c0;
            /* สีฟ้าเข้มสำหรับข้อความในฟอร์ม */
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbdefb;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        button {
            background-color: #42a5f5;
            /* สีฟ้าสำหรับปุ่ม */
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            box-sizing: border-box;
        }

        button:hover {
            background-color: #1e88e5;
            /* สีฟ้าเข้มขึ้นเมื่อวางเมาส์ */
        }

        /* ปรับขนาดฟอนต์และสีในตาราง */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }

        table,
        th,
        td {
            border: 1px solid #bbdefb;
            padding: 15px;
            text-align: center;
            box-sizing: border-box;
        }

        th {
            background-color: #42a5f5;
            /* สีฟ้าสำหรับหัวตาราง */
            color: white;
            font-weight: bold;
            font-size: 14px;
        }

        td {
            font-size: 13px;
        }

        tr:nth-child(even) {
            background-color: #e3f2fd;
            /* สีฟ้าอ่อนสำหรับแถวคู่ */
        }

        .action-links a {
            color: #1e88e5;
            /* สีฟ้าเข้มสำหรับลิงก์จัดการ */
            text-decoration: none;
            font-weight: bold;
            margin: 0 5px;
            transition: color 0.3s ease;
        }

        .action-links a:hover {
            color: #1565c0;
            /* สีฟ้าเข้มเมื่อวางเมาส์ */
        }

        .action-links a.delete {
            color: #e57373;
            /* สีแดงอ่อนสำหรับลิงก์ลบ */
        }

        .action-links a.delete:hover {
            color: #d32f2f;
            /* สีแดงเข้มเมื่อวางเมาส์ */
        }
    </style>
</head>

<body>

    <h1>จัดการประตูระบายน้ำ</h1>

    <!-- ฟอร์มการเพิ่มหรือแก้ไขข้อมูล -->
    <div class="form-container">
        <form action="" method="POST">
            <!-- ตรวจสอบว่ากำลังแก้ไขหรือไม่ -->
            <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">

            <div class="form-group">
                <label>ชนิด:</label>
                <input type="text" name="type" value="<?php echo isset($row['type']) ? htmlspecialchars($row['type']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>ความกว้างรางระบายน้ำ (W) ซม.:</label>
                <input type="number" step="0.01" name="width" value="<?php echo isset($row['width_cm']) ? htmlspecialchars($row['width_cm']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>ความสูงของรางระบายน้ำ (H) ซม.:</label>
                <input type="number" step="0.01" name="height" value="<?php echo isset($row['height_cm']) ? htmlspecialchars($row['height_cm']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>ความหนาของตัวระบายน้ำ (T1) ซม.:</label>
                <input type="number" step="0.01" name="thickness_body" value="<?php echo isset($row['thickness_body_cm']) ? htmlspecialchars($row['thickness_body_cm']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>ความหนาของฝาปิด (T2) ซม.:</label>
                <input type="number" step="0.01" name="thickness_cover" value="<?php echo isset($row['thickness_cover_cm']) ? htmlspecialchars($row['thickness_cover_cm']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>เหล็กเสริม A1:</label>
                <input type="number" step="0.01" name="A1" value="<?php echo isset($row['reinforcement_A1']) ? htmlspecialchars($row['reinforcement_A1']) : ''; ?>">
            </div>
            <div class="form-group">
                <label>เหล็กเสริม A2:</label>
                <input type="number" step="0.01" name="A2" value="<?php echo isset($row['reinforcement_A2']) ? htmlspecialchars($row['reinforcement_A2']) : ''; ?>">
            </div>
            <div class="form-group">
                <label>เหล็กเสริม B1:</label>
                <input type="number" step="0.01" name="B1" value="<?php echo isset($row['reinforcement_B1']) ? htmlspecialchars($row['reinforcement_B1']) : ''; ?>">
            </div>
            <div class="form-group">
                <label>เหล็กเสริม B2:</label>
                <input type="number" step="0.01" name="B2" value="<?php echo isset($row['reinforcement_B2']) ? htmlspecialchars($row['reinforcement_B2']) : ''; ?>">
            </div>
            <div class="form-group">
                <label>เหล็กเสริม C1:</label>
                <input type="number" step="0.01" name="C1" value="<?php echo isset($row['reinforcement_C1']) ? htmlspecialchars($row['reinforcement_C1']) : ''; ?>">
            </div>
            <div class="form-group">
                <label>เหล็กเสริม C2:</label>
                <input type="number" step="0.01" name="C2" value="<?php echo isset($row['reinforcement_C2']) ? htmlspecialchars($row['reinforcement_C2']) : ''; ?>">
            </div>
            <div class="form-group">
                <label>เหล็กเสริม D1:</label>
                <input type="number" step="0.01" name="D1" value="<?php echo isset($row['reinforcement_D1']) ? htmlspecialchars($row['reinforcement_D1']) : ''; ?>">
            </div>
            <div class="form-group">
                <label>เหล็กเสริม D2:</label>
                <input type="number" step="0.01" name="D2" value="<?php echo isset($row['reinforcement_D2']) ? htmlspecialchars($row['reinforcement_D2']) : ''; ?>">
            </div>

            <!-- ปุ่มจะเปลี่ยนแปลงตามกรณี -->
            <button type="submit" name="<?php echo isset($row['id']) ? 'update' : 'add'; ?>">
                <?php echo isset($row['id']) ? 'บันทึกการแก้ไข' : 'เพิ่มข้อมูล'; ?>
            </button>
        </form>
    </div>

    <!-- ตารางแสดงข้อมูล -->
    <div class="table-container">
        <table>
            <tr>
                <th rowspan="3">ชนิด</th>
                <th rowspan="3">ความกว้างรางระบายน้ำ<br>(W) ซม.</th>
                <th rowspan="3">ความสูงของรางระบายน้ำ<br>(H) ซม.</th>
                <th rowspan="3">ความหนาของตัวรางระบายน้ำ<br>(T1) ซม.</th>
                <th rowspan="3">ความหนาของฝาปิด<br>(T2) ซม.</th>
                <th colspan="8">เหล็กเสริม</th>
                <th rowspan="3">การจัดการ</th>
            </tr>
            <tr>
                <th colspan="2">A</th>
                <th colspan="2">B</th>
                <th colspan="2">C</th>
                <th colspan="2">D</th>
            </tr>
            <tr>
                <th>⌀ ซม.</th>
                <th>@ ซม.</th>
                <th>⌀ ซม.</th>
                <th>@ ซม.</th>
                <th>⌀ ซม.</th>
                <th>@ ซม.</th>
                <th>⌀ ซม.</th>
                <th>@ ซม.</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['width_cm']; ?></td>
                    <td><?php echo $row['height_cm']; ?></td>
                    <td><?php echo $row['thickness_body_cm']; ?></td>
                    <td><?php echo $row['thickness_cover_cm']; ?></td>
                    <td><?php echo $row['reinforcement_A1']; ?></td>
                    <td><?php echo $row['reinforcement_A2']; ?></td>
                    <td><?php echo $row['reinforcement_B1']; ?></td>
                    <td><?php echo $row['reinforcement_B2']; ?></td>
                    <td><?php echo $row['reinforcement_C1']; ?></td>
                    <td><?php echo $row['reinforcement_C2']; ?></td>
                    <td><?php echo $row['reinforcement_D1']; ?></td>
                    <td><?php echo $row['reinforcement_D2']; ?></td>
                    <td class="action-links">
                        <a href="?edit=<?php echo $row['id']; ?>">แก้ไข</a> |
                        <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?');">ลบ</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <?php $conn->close(); ?>

</body>

</html>