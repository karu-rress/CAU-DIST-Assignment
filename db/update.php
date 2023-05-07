<?php
    include '../db/connect.php';

    $isbn = $_GET['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $takenby = $_POST['takenby'];

# SQL 인젝션 방지 코드 삽입

    $query="UPDATE bookinfo SET title = '$title', author = '$author', publisher = '$publisher', takenby = '$takenby' where isbn = '$isbn'";
    // echo $query;
    mysqli_query($connect, $query);
?>
<script>
    location.href = '/index.html';
</script>

