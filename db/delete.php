<?php

    include '../db/connect.php';

    $isbn=$_GET['isbn'];

## TODO : SQL 인젝션 방지

    $query="DELETE from bookinfo where isbn = '$isbn'";

    // isbn -> ? 로 바꾸기

    $stmt->
    // echo $query;
    mysqli_query($connect, $query);
?>
<script>
    location.href = '/index.html';
</script>