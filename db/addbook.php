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
    $stmt->bind_param('d', $isbn);
    $stmt->execute();

    $result = $stmt->get_result();
    $num = $result->num_rows;

    if ($num != 0) {
        $stmt->close();
        echo "<script>alert('이미 존재하는 ISBN입니다.');
            location.href = '/account/signup.html';</script>";
    }

    $title = $_POST['add_title'];
    $author = $_POST['add_author'];
    $publisher = $_POST['add_publisher'];

    /*
+-----------+-------------+------+-----+---------+-------+
| Field     | Type        | Null | Key | Default | Extra |
+-----------+-------------+------+-----+---------+-------+
| isbn      | bigint      | NO   | PRI | NULL    |       |
| title     | varchar(80) | NO   |     | NULL    |       |
| author    | varchar(45) | NO   |     | NULL    |       |
| publisher | varchar(45) | NO   |     | NULL    |       |
| takenby   | varchar(45) | YES  |     | NULL    |       |
| uploaded  | date        | YES  |     | NULL    |       |
+-----------+-------------+------+-----+---------+-------+
    */
    $stmt = $connect->prepare("INSERT INTO bookinfo(isbn, title, author, publisher, uploaded) VALUES(?, ?, ?, ?, NOW())");
    $stmt->bind_param('dsss', $isbn, $title, $author, $publisher);
    $stmt->execute();
    $stmt->close();

    echo '<script>location.href = "/books/all.php";</script>';
?>
</body>
</html>