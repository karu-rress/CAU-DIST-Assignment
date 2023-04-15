<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

  include 'connect.php';

  $id = $_POST['signin_id'];
  $pwd = $_POST['signin_pwd'];

  $query="SELECT * FROM userinfo WHERE id = '$id'";

  $result = mysqli_query($connect, $query);
  $num = mysqli_num_rows($result);

  if (!$num) {
?>
  <script>
    alert('존재하지 않는 아이디입니다.\n회원가입을 해주세요.');
    location.href='/account/signup.html';
  </script>
<?
  }

mysqli_close($connect);

?>
<script>
    alert('debug 1 pass');
    document.cookie = "userlevel=<?php echo $id?>; path=/";
    alert('debug 2 pass' + document.cookie);
    location.href = '/index.html';
</script>