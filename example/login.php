<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

  include './dbconn.php';

  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];

  $query="SELECT * from info where id = '$id'";
  //echo $query;
  $result = mysqli_query($connect, $query);

  $num = mysqli_num_rows($result);

  if (!$num) {
?>
  <script>
    alert('해당 아이디가 없습니다.\n회원 가입을 먼저 해주세요.');
    location.href='./post.php';
  </script>
<?
  } else {
    echo ("<H1>$id 님 환영합니다!! </H1>");
  }

mysqli_close($connect);
?>
