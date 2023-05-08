<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Rolling Ress Library</title>
    <link href="/styles/basic.css" rel="stylesheet">
    <link href="/styles/footer.css" rel="stylesheet">
    <link href="/styles/header.css" rel="stylesheet">
    <link href="/styles/listall.css" rel="stylesheet">
    <link href="/styles/nav.css" rel="stylesheet">    
    <script src="/scripts/js/includeHTML.js"></script>
    <script src="/scripts/js/reload.js"></script>
    <script src="/scripts/js/search.js"></script>
    <script src="/scripts/js/user.js"></script>
</head>
<body>
    <div id="wrap">
        <header include-html="/htmls/header.html"></header>
        <nav>
            <a href="/books/mothly.php" class="menu">새로 들어온 도서</a>
            <a href="/books/all.php" class="menu">전체 도서</a>
            <a href="/manage/addbooks.html" id="manage" class="hidden">도서 등록(관리자)</a>
            <div>
                <a href="/account/signin.html" class="user">Sign In</a>
                <span class="user">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                <a href="/account/signup.html" class="user">Sign Up</a>
                <button class="user_loggedin hidden">Sign out</button>
            </div>
        </nav>
<?php
    include '../db/connect.php';

    $stmt = $connect->prepare("SELECT * FROM bookinfo");
    $stmt->execute();    
    $result = $stmt->get_result();
    $stmt->close();
?>
        <article>
            <h1>전체 도서 목록</h1>
            <table cellspacing="0" cellpadding="5">
                <tr>
                    <td>제목</td>
                    <td>저자</td>
                    <td>출판사</td>
                    <td>상태</td>
                </tr>
                <?php while ($row = $result->fetch_array()): ?>
                    <tr>
                    <td>
                        <a href='/books/about.php?isbn=<? echo $row['isbn'] ?>'>
                        <span class='book_title'><? echo $row['title'] ?></span>
                        </a>
                    </td>
                    <td><? echo $row['author'] ?></td>
                    <td><? echo $row['publisher'] ?></td>
                    <?php if (empty($row['takenby'])): ?>
                        <td><mark>이용 가능</mark></td>
                        <? else: ?>
                        <td><? echo $row['takenby']?></td>
                        <? endif ?>
                    </tr>
            <? endwhile ?>
            </table>
        </article>
    </div>
    <footer include-html="/htmls/footer.html"></footer>
    <script defer>
        showIfById('admin', 'manage');
        showIfByClass('*', 'user');
        showIfByClass('*', 'user_loggedin');
        includeHTML();
    </script>
</body>
</html>