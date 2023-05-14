<?php
    $host_name = "localhost";
    $db_user_id = "server"; // server@localhost : library db만 접근 가능
    $db_pwd = "20234748";
    $db_name = "library";

    $connect = new mysqli($host_name, $db_user_id, $db_pwd, $db_name);
    if ($connect->connect_error) {
        http_response_code(500);
        die("Connect failed: " . $connect->connect_error);
    }

    function addlog($conn, $isbn, $user, $action) {
        $stmt = $conn->prepare("INSERT INTO log VALUES(?, ?, ?, NOW())");
        $stmt->bind_param("iss", $isbn, $user, $action);
        $stmt->execute();
    }
?>
