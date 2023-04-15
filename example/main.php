<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html>
<head>
<title>DB 입출력 테스트</title>
<script>
  function checkform() {
    if (!document.review_table.custom_id.value) {
      alert('아이디가 입력되지 않았습니다. ');
      document.review_table.custom_id.focus();
      return;
    }
    else if (!document.review_table.custom_pwd.value) {
      alert('비번이 입력되지 않았습니다. ');
      document.review_table.custom_pwd.focus();
      return;
    }
    else if (!document.review_table.custom_name.value) {
      alert('이름이 입력되지 않았습니다. ');
      document.review_table.custom_name.focus();
      return;
    }
    else if (!document.review_table.custom_age.value) {
      alert('나이가 입력되지 않았습니다. ');
      document.review_table.custom_age.focus();
      return;
    }

    document.review_table.submit();
  }

  function goLoginform() {
    location.href='./login_form.php';
  }
</script>
</head>
<body>
<center>
  <form action='./post.php' name='review_table' method='post'>
<br>
<br>
<b>DB 입출력 테스트</b></div><br>
  <label>아이디 : </label><input type="text" name="custom_id" class="box"/></br>
  <label>비번 : </label><input type="password" name="custom_pwd" class="box"/></br>
  <label>이름 : </label><input type="text" name="custom_name" class="box"/></br>
  <label>나이 : </label><input type="text" name="custom_age" class="box"/></br>
  
  <input type="button" value="회원가입" OnClick="checkform();"/>
  <input type="button" value="로그인" OnClick="goLoginform();"/><br /> 
</form>
<BR><BR>

  <h2> 입력된 데이터 </h2>
  <table width= "1200" border="1" cellspacing="0" cellpadding="5">
  <tr align="center">
    <td bgcolor="#cccccc">아이디</td>
    <td bgcolor="#cccccc">비번</td>
    <td bgcolor="#cccccc">이름</td>
    <td bgcolor="#cccccc">나이</td>
  </tr>
  <?
  // error_reporting(E_ALL);
  // ini_set("display_errors", 1);

  include './dbconn.php';

  $query="SELECT * from info";
  // echo $query;
  $result = mysqli_query($connect, $query);

  while ($row = mysqli_fetch_array($result)) {
    echo "
    <tr>
      <td><a href='content.php?id=$row[id]'>$row[id]</a></td>
      <td>$row[pwd]</td>
      <td>$row[name]</td>
      <td>$row[age]</td>
    </tr>
    ";
  }
  mysqli_close($connect);
  ?>
</table>
</center>
</body>

</html>
