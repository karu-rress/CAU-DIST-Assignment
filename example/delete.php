<?php

//    error_reporting(E_ALL);
//    ini_set("display_errors", 1);

    include './dbconn.php';

    $uid=$_GET['id'];

    $query="DELETE from info where id = '$uid'";
    echo $query;
    mysqli_query($connect, $query);

    echo"
    <script>
    location.href='./main.php';
    </script>
    ";

 ?>
