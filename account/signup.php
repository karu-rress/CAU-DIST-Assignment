<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8"/>
    <title>Rolling Ress Library</title>
    <link href="account.css" rel="stylesheet">
    <script async src="../reload.js"></script>
    <script>
  function checkform() {
    $uid = document.review_table.custom_id.value;
    if (!$uid) {
      alert('아이디를 입력해주세요.');
      document.review_table.signup_id.focus();
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

    // document.review_table.submit();
  }

  /*
  function goLoginform() {
    location.href='./login_form.php';
  }
  */
</script>
<body>
  <h1>SIGN UP</h1>
  <div class="user_input">
    <input type="text" name="signup_id" class="box" placeholder="아이디"/>
    <input type="password" name="signup_pwd" class="box" placeholder="비밀번호"/>
    <input type="text" name="signup_name" class="box" placeholder="이름"/>
    <input type="text" name="signup_age" class="box" placeholder="나이"/>
    <hr>
    <input type="button" value="회원가입" OnClick="checkform();"/>
  </div>
  <br><br>
  <p>Rolling Ress Library<br>Copyright 2023. Rolling Ress, All rights reserved.</p>
  <p style="margin: 0 auto;">
  <a target="_blank" href="https://blog.naver.com/rollingress">Rolling Ress Naver Blog</a>
    <!--

        CREATE TABLE `info` (
`id` varchar(15) NOT NULL,
`pwd` varchar(15) NOT NULL,
`name` varchar(20) NOT NULL,
`age` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
    -->

    
</body>
</html>
