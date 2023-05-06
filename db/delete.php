<?php

    include '../db/connect.php';

    $isbn=$_GET['isbn'];

    $query="DELETE from bookinfo where isbn = '$isbn'";
    // echo $query;
    mysqli_query($connect, $query);
?>
<script>
    location.href = '/index.html';
</script>