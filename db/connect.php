<?php
    $host_name = "localhost";
    $db_user_id = "server"; // server@localhost : library db만 접근 가능
    $db_pwd = "20234748";
    $db_name = "library";

    $connect = new mysqli($host_name, $db_user_id, $db_pwd, $db_name);
    if ($connect->connect_error) {
        printf("Connect failed: %s\n", $connect->connect_error);
        exit();
    }

    function addlog($isbn, $user, $action) {
        
    }
?>
