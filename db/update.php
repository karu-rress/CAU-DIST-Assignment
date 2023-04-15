<?php

//    error_reporting(E_ALL);
//    ini_set("display_errors", 1);

    include '../db/connect.php';

    $isbn=$_GET['isbn'];
    $title=$_POST['title'];
    $author=$_POST['author'];
    $publisher=$_POST['publisher'];
    $takenby=$_POST['takenby'];

    $query="UPDATE bookinfo SET title = '$title', author = '$author', publisher = '$publisher', takenby = '$takenby' where isbn = '$isbn'";
    echo $query;
    mysqli_query($connect, $query);

    echo"
    <script>
    location.href='/index.html';
    </script>
    ";

 ?>
