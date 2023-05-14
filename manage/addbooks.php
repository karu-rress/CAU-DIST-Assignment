<?php
    if (($_COOKIE['userlevel'] ?? "") != "admin") {
        http_response_code(403);
        die('403 Forbidden');
    }
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8"/>
    <title>도서 추가 | Rolling Ress Library</title>
    <link rel="stylesheet" href="/styles/form.css">
    <link rel="stylesheet" href="/styles/attribute.css">
    <link rel="stylesheet" href="/styles/part/header.css">
    <link rel="stylesheet" href="/styles/part/nav.css">
    <link rel="stylesheet" href="/styles/part/footer.css">
    <link rel="icon" href="/resources/Rolling Ress.png">
    <script defer type="module" src="/scripts/js/base.js"></script>
</head>
<body>
    <header include-html="/htmls/header.html"></header>
    <nav include-html="/htmls/nav.html"></nav>
    <article>
        <h1>도서 추가</h1>
        <form id="book_form" name="add_book" action="/db/addbook.php" method="post">
            <input required minlength="13" type="text" id="add_isbn" name="add_isbn" class="box" placeholder="ISBN"/>
            <input required type="text" id="add_title" name="add_title" class="box" placeholder="제목"/>
            <input required type="text" id="add_author" name="add_author" class="box" placeholder="저자"/>
            <input required type="text" id="add_publisher" name="add_publisher" class="box" placeholder="출판사"/>
            <hr>
            <input type="button" class="actionbutton" value="등록"/>
        </form>
    </article>
    <footer include-html="/htmls/footer.html"></footer>
</body>
</html>