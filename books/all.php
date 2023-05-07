<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Rolling Ress Library</title>
    <link href="/styles/header.css" rel="stylesheet">
    <link href="/styles/nav.css" rel="stylesheet">
    <link href="/styles/footer.css" rel="stylesheet">
    <link href="/styles/listall.css" rel="stylesheet">
    <script src="/scripts/js/user.js"></script>
    <script src="/scripts/js/includeHTML.js"></script>
    <script src="/scripts/js/reload.js"></script>
</head>
<body>
    <div id="wrap">
        <header include-html="/htmls/header.html"></header>
        <nav>
            <a href="/books/mothly.php" class="menu">새로 들어온 도서</a>
            <a href="/books/all.php" class="menu">전체 도서</a>
            <a href="/manage/addbooks.html" id="manage" style="visibility:hidden;">도서 등록(관리자)</a>
            <div>
                <a href="/account/signin.html" class="user">Sign In</a>
                <span class="user">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                <a href="/account/signup.html" class="user">Sign Up</a>
                <button class="user_loggedin" style='visibility:hidden;' onclick="logout()">Sign out</button>
            </div>
        </nav>
        <article>
            <h1>전체 도서 목록</h1>
            <table cellspacing="0" cellpadding="5">
                <tr>
                    <td>제목</td>
                    <td>저자</td>
                    <td>출판사</td>
                    <td>상태</td>
                </tr>
<?php
    include '../db/connect.php';

    $stmt = $connect->prepare("SELECT * FROM bookinfo");
    $stmt->execute();    
    $result = $stmt->get_result();

    while ($row = $result->fetch_array()) {
        echo "<tr>";
        echo "<td><a href='/books/about.php?isbn=$row[isbn]'><span class='book_title'>$row[title]</span></a></td>";
        echo "<td>$row[author]</td>";
        echo "<td>$row[publisher]</td>";
        echo empty($row['takenby'])
            ? "<td><mark>이용 가능</mark></td>"
            : "<td>$row[takenby]</td>";
        echo "</tr>";
    }
    $stmt->close();
?>
            </table>
        </article>
    </div>
    <footer include-html="/htmls/footer.html"></footer>
    <script defer>
        showIfById('admin', 'manage');
        showIfByClass('*', 'user', true);
        showIfByClass('*', 'user_loggedin');
        includeHTML();
    </script>
</body>
</html>