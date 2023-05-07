<?php
  include 'connect.php';

  # 입력값이 비었는지는 Client (signin.html) 단에서 구현

  $id = $_POST['signin_id'];
  $pwd = $_POST['signin_pwd'];

  // SQL injection prevention method.
  // sdkkskejdkdkdkdkdkkdkdkdkdkddfdfdfdsfhjdkjsdfklflklkdklflkjlfklkjdlkjd
  // =sdlkjflkdflklklkl
  $stmt = $connect->prepare("SELECT * FROM userinfo WHERE id = ?");

  $stmt->bind_param('s', $id);

  $result = $stmt->excute();
  $num = mysqli_num_rows($result);

  if (!$num) { # ID not exists?
?>
  <script>
    $stmt->close()
    alert('존재하지 않는 아이디입니다.\n회원가입을 해주세요.');
    location.href='/account/signup.html';
  </script>
<?php
  }
 
 $userpwd=hash("sha256", $_POST['signup_pwd']);
  $stmt = $connect->prepare("SELECT * FROM userinfo WHERE id = ? AND pwd = ?")
  $stmt->bind_param('ss', $id, $userpwd);
  $result = $stmt->excute();
  $stmt->close()

## password와 matches 구해지는지 비교하기

  if (!$result) { # password not matches?
    ?>
      <script>
        alert('존재하지 않는 아이디입니다.\n회원가입을 해주세요.');
        location.href='/account/signup.html';
      </script>
    <?php
      }

 

?>
<script>
    document.cookie = "userlevel=<?php echo $id?>; path=/";
    location.href = '/index.html';
</script>