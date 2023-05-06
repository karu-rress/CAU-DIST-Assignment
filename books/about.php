<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Rolling Ress Library</title>
  <?php
    include '../db/connect.php';

    $isbn = $_GET['isbn'];
    $query = "SELECT * FROM bookinfo WHERE isbn = '$isbn'";
    
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result)
?>
<script>
  function deldata() {
    location.href = '../db/delete.php?id=<? echo $isbn ?>';
  }
</script>
  </head>
    <body>
    <h1> <? echo $row['title']; ?> </h1>
    <form name="frm_content" method="post" action="../db/update.php?isbn=<? echo $isbn; ?>">
      <table width= "300" cellspacing="0" cellpadding="5">
      <tr>
        <td>ISBN</td>
        <td><input type="text" name="isbn" value="<? echo $row['isbn']; ?>"></td>
      </tr>
      <tr>
        <td>제목</td>
        <td><input type="text" name="title" value="<? echo $row['title']; ?>"></td>
      </tr>
      <tr>
        <td>저자</td>
        <td><input type="text" name="author" value="<? echo $row['author']; ?>"></td>
      </tr>
      <tr>
        <td>출판사</td>
        <td><input type="text" name="publisher" value="<? echo $row['publisher']; ?>"></td>
      </tr>
      <tr>
        <td>대출상태</td>
        <td><input type="text" name="takenby" value="<? echo $row['takenby']; ?>"></td>
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