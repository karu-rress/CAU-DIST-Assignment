<?php

//    error_reporting(E_ALL);
//    ini_set("display_errors", 1);

    include '../db/connect.php';

    $isbn=$_GET['isbn'];

    $query="DELETE from bookinfo where isbn = '$isbn'";
    echo $query;
    mysqli_query($connect, $query);

    echo"
    <script>
    location.href='/index.html';
    </script>
    ";

 ?>
