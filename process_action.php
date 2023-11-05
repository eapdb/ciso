<!DOCTYPE html>
<html>
<head>
    <title>處理行動</title>
</head>
<body>
    <?php
    session_start(); // 開啟會話以存儲全域變數

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ciso";

    // 檢查會話中是否存在資源資訊，如果不存在，則初始化為預設值
    if (!isset($_SESSION['resources'])) {
        $_SESSION['resources'] = 50; // 預設資源
        $_SESSION['time'] = 8; // 預設時間
        $_SESSION['cost'] = 50000; // 預設金錢
    }

    // 建立與資料庫的連線
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("連線失敗: " . $conn->connect_error);
    }

    // 檢查用戶選擇的行動
    if (isset($_POST['action'])) {
        $action_id = $_POST['action'];
        $sql = "SELECT * FROM actions WHERE id = $action_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "您已選擇執行行動：" . $row["action_name"] . "<br>";
            echo "所需人力資源：" . $row["resources"] . "<br>";
            echo "所需時間：" . $row["time_hours"] . " 小時<br>";
            echo "所需金錢：" . $row["cost"] . " 元<br>";

            // 累計扣除資源
            $_SESSION['resources'] -= $row["resources"];
            $_SESSION['time'] -= $row["time_hours"];
            $_SESSION['cost'] -= $row["cost"];

            // 計算並顯示剩餘資源
            echo "<br>剩餘人力資源：" . $_SESSION['resources'] . "<br>";
            echo "剩餘時間：" . $_SESSION['time'] . " 小時<br>";
            echo "剩餘金錢：" . $_SESSION['cost'] . " 元<br>";

            // 讀取策略結果並顯示給使用者
            $action_means = $row["action_means"];
            echo "策略結果：" . $action_means;
        }
    } else {
        echo "無效的選擇。";
    }

    $conn->close();
    ?>
</body>
</html>
