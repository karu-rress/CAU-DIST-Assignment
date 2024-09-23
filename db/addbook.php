<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
    include './connect.php';

    $isbn = $_POST["add_isbn"];

    $stmt = $connect->prepare("SELECT * FROM bookinfo WHERE isbn = ?");
    $stmt->bind_param('i', $isbn);
    $stmt->execute();

    $result = $stmt->get_result();
    $num = $result->num_rows;
    if ($num !== 0) {
        $stmt->close();
        echo "<script>alert('이미 존재하는 ISBN입니다.');
            location.href = '/account/signup.html';</script>";
    }

    $title = $_POST['add_title'];
    $author = $_POST['add_author'];
    $publisher = $_POST['add_publisher'];

    $stmt = $connect->prepare("INSERT INTO bookinfo(isbn, title, author, publisher, uploaded) 
        VALUES(?, ?, ?, ?, NOW())");
    $stmt->bind_param('dsss', $isbn, $title, $author, $publisher);
    $stmt->execute();

    addlog($connect, $isbn, 'admin', 'add');

    $stmt->close();

    echo '<script>location.href = "/books/all.php";</script>';
?>
</body>
</html>