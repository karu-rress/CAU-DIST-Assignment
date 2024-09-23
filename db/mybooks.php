<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
    include '../db/connect.php';

    $books = $_GET['books'];

    try {
        foreach ($books as $book) {
            $stmt = $connect->prepare("UPDATE bookinfo SET takenby = NULL WHERE isbn = ?");
            $isbn = (int)$book;
            $stmt->bind_param('i', $isbn);
            $stmt->execute();
            $rows = $stmt->affected_rows;
            if ($rows === 0) {
                throw new Exception("SQL error");
            }

            addlog($connect, $isbn, $_COOKIE['userlevel'], 'return');
        }
    }
    catch (Exception $e) {
        echo '<script>alert("오류가 발생했습니다. ISBN을 확인하세요.");
            location.href = "../account/mypage.php;</script>';
    }
    finally {
        $stmt->close();
    }

    echo '<script>alert("성공적으로 반납되었습니다.");
        location.href = "../account/mypage.php";</script>';
    
?>
</body>
</html>