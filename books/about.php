<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rolling Ress Library</title>
    <link href="/styles/basic.css" rel="stylesheet">
    <link href="/styles/account.css" rel="stylesheet">
    <link href="/styles/header.css" rel="stylesheet">
    <link href="/styles/nav.css" rel="stylesheet">
    <link href="/styles/footer.css" rel="stylesheet">
    <script src="/scripts/js/user.js"></script>
    <script src="/scripts/js/checkform.js"></script>
    <script src="/scripts/js/includeHTML.js"></script>
    <script src="/scripts/js/search.js"></script>
<?php
    include '../db/connect.php';

    $isbn = $_GET['isbn'];

    $stmt = $connect->prepare("SELECT * FROM bookinfo WHERE isbn = ?");
    $stmt->bind_param('d', $isbn);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $stmt->close();
?>
<script>
    function deldata() {
        location.href = '../db/delete.php?id=<? echo $isbn?>';
    }
</script>
</head>
<body>
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
    <article>
    <h1> <? echo $row['title'] ?> </h1>
    <form name="frm_content" method="post" action="../db/update.php?isbn=<? echo $isbn ?>">
        <table width= "300" cellspacing="0" cellpadding="5">
        <tr>
            <td>ISBN</td>
            <td><input type="text" name="isbn" class="box" value="<? echo $row['isbn'] ?>"></td>
        </tr>
        <tr>
            <td>제목</td>
            <td><input type="text" name="title" class="box" value="<? echo $row['title'] ?>"></td>
        </tr>
        <tr>
            <td>저자</td>
            <td><input type="text" name="author" class="box" value="<? echo $row['author'] ?>"></td>
        </tr>
        <tr>
            <td>출판사</td>
            <td><input type="text" name="publisher" class="box" value="<? echo $row['publisher'] ?>"></td>
        </tr>
        <tr>
            <td>대출상태</td>
            <td><input type="text" name="takenby" class="box" value="<? echo $row['takenby'] ?>"></td>
        </tr>
        <tr>
        <td colspan="2">
            <input type="submit" value="수정">
            <input type="button" value="삭제" onclick="deldata()">
        </td>
        </tr>
    </form>
    </article>
    <footer include-html="/htmls/footer.html"></footer>
    <script defer>
        showIfById('admin', 'manage');
        showIfByClass('*', 'user');
        showIfByClass('*', 'user_loggedin');
        includeHTML();
    </script>
</body>
</html>