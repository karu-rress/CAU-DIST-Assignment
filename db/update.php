<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
    include '../db/connect.php';

    $isbn = $_GET['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $takenby = $_POST['takenby'];

    $stmt = $connect->prepare("UPDATE bookinfo SET title = ?, author = ?, publisher = ?, takenby = ? WHERE isbn = ?");
    $stmt->bind_param('ssssi', $title, $author, $publisher, $takenby, $isbn);
    $stmt->execute();

    $rows = $stmt->affected_rows;
    $stmt->close();

    if ($rows == 0) {
        echo '<script>alert("오류가 발생했습니다. ISBN을 확인하세요.");
        location.href = "/manage/about.php?isbn=' . $isbn .'"</script>';
    }
    else {
    echo '<script>alert("수정되었습니다.");
        location.href = "/books/all.php";</script>';
    }
?>
</body>
</html>