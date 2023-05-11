<?php
    include '../db/connect.php';
    $isbn = $_GET['isbn'];
    $stmt = $connect->prepare("SELECT info.*, price, published, link, details.isbn as isbn_d
        FROM bookinfo AS info
        LEFT OUTER JOIN bookdetails AS details
        ON info.isbn
        WHERE info.isbn = ?");
    $stmt->bind_param('d', $isbn);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $stmt->close();

    $checked = $row['takenby'] != null;
    $is_admin = ($_COOKIE['userlevel'] ?? "") == 'admin';

    # JOIN JOIN JOIN
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Book Info | Rolling Ress Library</title>
    <link rel="stylesheet" href="/styles/pages/about.css">
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
    <h1>책 정보</h1>
    <h2><? echo $row['title'] ?></h2>
    <h3><? echo $row['author'] ?> 저</h3>
    <b><? echo $row['publisher'] ?> | ISBN <? echo $row['isbn'] ?> | <? echo $row['uploaded'] ?> 등록</b>
    <br><br>
    <?php if (isset($row['isbn_d'])): ?>
        <b>정가: <? echo $row['price'] ?>원 | 출판일:  <? echo $row['published'] ?> | 
        <a target="_blank" href="<? echo $row['link'] ?>">도서 구매 링크</a></b>
        <br><br>
    <?php endif; ?>
    <br><br>
    <?php if ($is_admin): ?>
        <select name="modes" id="modes" isbn="<? echo $row['isbn'] ?>">
            <option value="userMode">사용자 모드</option>
            <option value="adminMode">관리자 모드</option>
        </select>
        <br><br>
    <?php endif; ?>
    <h3>대출</h3>

    <?php if ($checked): # 대출중인가?  ?>
        <?php if (isset($_COOKIE['userlevel'])): # 로그인 했는가? ?>
            <?php if ($_COOKIE['userlevel'] == $row['takenby']): #본인인가? ?>
                <!-- 본인이 대출중임 -->
                <p>이미 대출 중인 도서입니다. '마이페이지'에서 확인 가능합니다.</p>
                <form name="bookForm" method="post" action="../db/return.php?isbn=<? echo $isbn ?>">
                    <input type="button" value="반납하기">
                </form>
            <? else: ?>
                <!-- 다른 사람이 대출중임 -->
                <p>현재 다른 분께서 대출 중인 도서입니다.</p>
            <? endif; ?>
        <? else: ?>            
            <!-- 다른 사람이 대출중임. 로그인하라고 할 것. -->
            <p>현재 다른 분께서 대출 중인 도서입니다.
                <br>본인이 대출 중인 책이라면 로그인 후 확인해주세요.
            </p>
        <? endif; ?>
    <?php else: # 이용 가능한가 ?>
        <?php if (isset($_COOKIE['userlevel'])): # 로그인 했는가? ?>
            <!-- 대출 메뉴 표시 -->
            <p>대출 가능한 도서입니다.</p>
            <form name="bookForm" method="post" action="../db/checkout.php?isbn=<? echo $isbn ?>">
                <input type="button" value="대출하기">
            </form>
        <? else: ?>
            <!-- 로그인하라고 할 것. -->
            <p>대출 가능한 도서입니다.<br>대출을 하시려면 로그인 해주세요.</p>
        <? endif; ?>
    <?php endif;   ?>

    </article>
    <footer include-html="/htmls/footer.html"></footer>
</body>
</html>