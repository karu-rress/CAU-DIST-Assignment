<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <link href="/styles/header.css" rel="stylesheet">
    <link href="/styles/nav.css" rel="stylesheet">
    <link href="/styles/footer.css" rel="stylesheet">
    <title>Rolling Ress Library</title>
    <script src="/scripts/includeHTML.js"></script>
    <script src="/scripts/reload.js"></script>
</head>
<body>
    <div id="wrap">
        <!-- TO DO: 이거 header랑 nav 까지 분리해서 htmls 폴더에 넣어버리기 -->
        <!-- CSS도 당근 분리하고... (styles)-->
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

    if (empty($row['takenby']))
    {
        echo "
        <tr>
            <td><a href='/books/content.php?isbn=$row[isbn]'>$row[title]</a></td>
            <td>$row[author]</td>
            <td>$row[publisher]</td>  
            <td><mark>이용 가능</mark></td>
        </tr>
        ";
    }
    else
    {
        echo "
        <tr>
            <td><a href='/books/content.php?id=$row[isbn]'>$row[title]</a></td>
            <td>$row[author]</td>
            <td>$row[publisher]</td>
            <td>$row[takenby]</td>
        </tr>
        ";
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