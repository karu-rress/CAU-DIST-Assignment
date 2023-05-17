<?php
    # 관리자가 아닌데 강제로 접근한다면 접속 차단
    if (($_COOKIE['userlevel'] ?? "") !== "admin") {
        http_response_code(403);
        die('403 Forbidden');
    }
    
    include '../db/connect.php';

    $stmt = $connect->prepare("SELECT * FROM log");
    $stmt->execute();    
    $result = $stmt->get_result();
    $stmt->close();

    echo "===========LOG START==============<br>";
    while ($row = $result->fetch_array()) {
        echo $row['isbn'] . "\t" . $row['user'] . "\t" . $row['action'] . "\t" . $row['time'] . "<br>";
    }
    echo "============LOG END==============<br><br>
    > Rolling Ress Library Log Management System <";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
</head>
<body>
</body>
</html>