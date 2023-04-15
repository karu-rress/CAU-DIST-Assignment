<?php

//    error_reporting(E_ALL);
//    ini_set("display_errors", 1);

    include '../db/connect.php';

    $isbn=$_GET['isbn'];

    $query="SELECT * FROM bookinfo where isbn = '$isbn'";
    
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result)


?>

<script>
  function deldata() {
    location.href='./delete.php?id=<? echo $isbn ?>';
  }
</script>

    <h2> <? echo $row['title']; ?> </h2>
    <form name="frm_content" method="post" action="update.php?isbn=<? echo $isbn; ?>">
      <table align="center" width= "300" border="1" cellspacing="0" cellpadding="5">
      <tr align="center">
        <td bgcolor="#cccccc">제목</td>
        <td><input type="text" name="custid" value="<? echo $row['title']; ?>"></td>
      </tr>
      <tr align="center">
        <td bgcolor="#cccccc">저자</td>
        <td><input type="text" name="custpwd" value="<? echo $row['author']; ?>"></td>
      </tr>
      <tr align="center">
        <td bgcolor="#cccccc">출판사</td>
        <td><input type="text" name="custname" value="<? echo $row['publisher']; ?>"></td>
      </tr>
      <tr align="center">
        <td bgcolor="#cccccc">대출상태</td>
        <td><input type="text" name="custage" value="<? echo $row['takenby']; ?>"></td>
      </tr>
      <tr align="center">
        <td colspan="2" bgcolor="#cccccc">
            <input type="submit" value="수정">
            <input type="button" value="삭제" OnClick="deldata();">
        </td>
      </tr>
    </form>
