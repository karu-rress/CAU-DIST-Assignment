<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Rolling Ress Library</title>
  <?php
    include '../db/connect.php';

    ## 여기도 SQL 인젝션 보완
    $isbn = $_GET['isbn'];

    $stmt = $connect->prepare("SELECT * FROM bookinfo WHERE isbn = ?");
    
    # 이거 정수야 문자열이야?
    $stmt->bind_param('d', $isbn);
    $result = $stmt->excute();

      // 이거 실제로 어떻게 동작하는지 디버깅 해볼것. MySQL 상에서 제대로 동작하지 않을 수 있음.
    $row = mysqli_fetch_array($result)
?>
<script>
  function deldata() {
    location.href = '../db/delete.php?id=<?php echo $isbn ?>';
  }
</script>
  </head>
    <body>
    <h1> <?php echo $row['title']; ?> </h1>
    <form name="frm_content" method="post" action="../db/update.php?isbn=<? echo $isbn; ?>">
      <table width= "300" cellspacing="0" cellpadding="5">
      <tr>
        <td>ISBN</td>
        <td><input type="text" name="isbn" value="<?php echo $row['isbn']; ?>"></td>
      </tr>
      <tr>
        <td>제목</td>
        <td><input type="text" name="title" value="<?php echo $row['title']; ?>"></td>
      </tr>
      <tr>
        <td>저자</td>
        <td><input type="text" name="author" value="<?php echo $row['author']; ?>"></td>
      </tr>
      <tr>
        <td>출판사</td>
        <td><input type="text" name="publisher" value="<?php echo $row['publisher']; ?>"></td>
      </tr>
      <tr>
        <td>대출상태</td>
        <td><input type="text" name="takenby" value="<?php echo $row['takenby']; ?>"></td>
      </tr>
      <tr>
        <td colspan="2">
            <input type="submit" value="수정">
            <input type="button" value="삭제" OnClick="deldata();">
        </td>
      </tr>
    </form>
    </body>
</html>