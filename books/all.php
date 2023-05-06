<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Rolling Ress Library</title>
    <link href="/styles/header.css" rel="stylesheet">
    <link href="/styles/nav.css" rel="stylesheet">
    <link href="/styles/footer.css" rel="stylesheet">
    <script src="/scripts/includeHTML.js"></script>
    <script src="/scripts/reload.js"></script>
</head>
<body>
    <div id="wrap">
        <header include-html="/htmls/header.html"></header>
        <nav>
            <a href="/books/mothly.php" class="menu">새로 들어온 도서</a>
            <a href="/books/all.php" class="menu">전체 도서</a>
            <a href="/manage/addbooks.html" id="manage" style="visibility:hidden;">도서 등록(관리자)</a>
            <script defer language="javascript">
                var value = document.cookie.match('(^|;) ?' + 'userlevel' + '=([^;]*)(;|$)');
                if ((value? value[2] : null) == 'admin') {
                    document.getElementById('manage').style.visibility = 'visible'; 
                } else {
                    document.getElementById('manage').style.visibility = 'hidden'; 
                }
            </script>
            <div>
                <a href="/account/signin.html" class="user">Sign In</a>
                <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                <a href="/account/signup.html" class="user">Sign Up</a>
            </div>
        </nav>
        <article>
            <h1>전체 도서 목록</h1>
            <table width= "1200"cellspacing="0" cellpadding="5">
                <tr>
                    <td>제목</td>
                    <td>저자</td>
                    <td>출판사</td>
                    <td>상태</td>
                </tr>
<?php
    // error_reporting(E_ALL);
    // ini_set("display_errors", 1);

    include '../db/connect.php';

    $query = "SELECT * FROM bookinfo";
    $result = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_array($result)) {
        // TODO : 이거 더 깔끔하게 할 방법 없나 찾아보기.
        if (empty($row['takenby'])) {
            echo "<tr>";
            echo "<td><a href='/books/about.php?isbn=$row[isbn]'>$row[title]</a></td>";
            echo "<td>$row[author]</td>";
            echo "<td>$row[publisher]</td>";
            echo "<td><mark>이용 가능</mark></td>";
            echo "</tr>";
        }
        else {
            echo "<tr>";
            echo "<td><a href='/books/about.php?id=$row[isbn]'>$row[title]</a></td>";
            echo "<td>$row[author]</td>";
            echo "<td>$row[publisher]</td>";
            echo "<td>$row[takenby]</td>";
            echo "</tr>";
        }
    }
    mysqli_close($connect);
?>
            </table>
        </article>
    </div>
    <footer include-html="/htmls/footer.html"></footer>
</body>
<script>
    includeHTML();
</script>
</html>