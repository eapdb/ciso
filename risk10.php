<!DOCTYPE html>
<html>
<head>
    <title>資安長決策</title>
</head>


<body>

<h2>組織發現了一個未經授權的使用者帳戶，可能是一個潛在的資安風險。</h2>


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ciso";

    $default_resources = 50; // 預設資源
    $default_time = 8; // 預設時間
    $default_cost = 50000; // 預設金錢

    // 建立與資料庫的連線
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 檢查連線是否成功
    if ($conn->connect_error) {
        die("連線失敗: " . $conn->connect_error);
    }

    // 检索数据库中的建议行动
    $sql = "SELECT * FROM actions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 显示建议的行动表单
        echo "<h2>建議的行動：</h2>";
        echo "<form action='process_action.php' method='post'>";
        echo "<select name='action'>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id"] . "'>" . $row["action_name"] . "</option>";
        }
        echo "</select>";
        echo "<input type='submit' value='執行行動'>";
        echo "</form>";
    } else {
        echo "沒有建議的行動。";
    }

    $conn->close();
    ?>
</body>
</html>
