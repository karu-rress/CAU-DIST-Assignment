<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html>
<head>
<title>로그인</title>
<script>
  function checkform() {
    if (!document.login_form.user_id.value) {
      alert('아이디가 입력되지 않았습니다. ');
      document.login_form.user_id.focus();
      return;
    }
    else if (!document.login_form.user_password.value) {
      alert('비밀번호가 입력되지 않았습니다. ');
      document.login_form.user_password.focus();
      return;
    }

    document.login_form.submit();
  }
</script>
</head>
<body>
  <form action='./login.php' name='login_form' method='post'>
<br>
<br>
<CENTER>로그인</b></div><br>
<label>아이디 : </label><input type="text" name="user_id" class="box"/><br>
<label>비밀번호 : </label><input type="text" name="user_password" class="box"/></br>

<center><input type="button" value="로그인" OnClick="checkform();"/><br />

</form> 
