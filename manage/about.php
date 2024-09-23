<?php
    include '../db/connect.php';
    $isbn = $_GET['isbn'];
    
    $stmt = $connect->prepare("SELECT * FROM bookinfo WHERE isbn = ?");
    $stmt->bind_param('i', $isbn);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $stmt->close();

    # 주소창으로 잘못된 접근을 할 시 차단
    if (isset($row['isbn']) === false) {
        http_response_code(404);
        die('404 Not found');
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Book Info | Rolling Ress Library</title>
    <link rel="stylesheet" href="../styles/form.css">
    <link rel="stylesheet" href="../styles/attribute.css">
    <link rel="stylesheet" href="../styles/part/header.css">
    <link rel="stylesheet" href="../styles/part/nav.css">
    <link rel="stylesheet" href="../styles/part/footer.css">
    <link rel="icon" href="../resources/Rolling Ress.png">
    <script defer type="module" src="../scripts/js/base.js"></script>
</head>
<body>
    <header include-html="../htmls/header.html"></header>
    <nav include-html="../htmls/nav.html"></nav>
    <article>
    <h1>Book Info</h1>
    <form name="frm_content" method="post" action="../db/update.php?isbn=<? echo $isbn ?>">
        <input type="text" name="isbn" class="box" placeholder="ISBN" value="<? echo $row['isbn'] ?>">
        <input type="text" name="title" class="box" placeholder="제목" value="<? echo $row['title'] ?>">
        <input type="text" name="author" class="box" placeholder="저자" value="<? echo $row['author'] ?>">
        <input type="text" name="publisher" class="box" placeholder="출판사" value="<? echo $row['publisher'] ?>">
        <input type="text" name="takenby" class="box" placeholder="대출자 ID (공란: 대출 가능)" value="<? echo $row['takenby'] ?>">
        <div><input type="submit" class="actionbutton" value="수정"><input type="button" class="actionbutton" value="삭제">
        <select name="modes" id="modes" isbn="<? echo $row['isbn'] ?>">
            <option value="adminMode">관리자 모드</option>
            <option value="userMode">사용자 모드</option>
        </select>
        </div>
    </form>
    </article>
    <footer include-html="../htmls/footer.html"></footer>
</body>
</html>