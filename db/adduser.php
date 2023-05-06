<!DOCTYPE html>
<html>
<body>
<?php
    include './connect.php';

    $userid=$_POST["signup_id"];

    $query = "SELECT * FROM userinfo WHERE id = '$userid'";
    $result = mysqli_query($connect, $query);
    $num = mysqli_num_rows($result);

    if ($num != 0) {
?>
<script>
    alert('이미 존재하는 아이디입니다.');
    location.href='/account/signup.html';
</script>
<?php
    }

    $userpwd=$_POST['signup_pwd'];
    $username=$_POST['signup_name'];
    $userage=$_POST['signup_age'];

    $query="INSERT INTO userinfo(id, pwd, name, age) values('$userid','$userpwd','$username','$userage')";

    mysqli_query($connect, $query);

?>
    <script>
        location.href = '/index.html';
    </script>
</body>
</html>