<?php
  include 'connect.php';

  $id = $_POST['signin_id'];
  $pwd = $_POST['signin_pwd'];

  $query="SELECT * FROM userinfo WHERE id = '$id'";

  $result = mysqli_query($connect, $query);
  $num = mysqli_num_rows($result);
  mysqli_close($connect); // 연결은 최대한 빨리 해제

  if (!$num) {
?>
  <script>
    alert('존재하지 않는 아이디입니다.\n회원가입을 해주세요.');
    location.href='/account/signup.html';
  </script>
<?php
  }

  // 비밀번호 검증

?>
<script>
    document.cookie = "userlevel=<?php echo $id?>; path=/";
    location.href = '/index.html';
</script>