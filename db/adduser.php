<!DOCTYPE html>
<html>
<body>
<?php
    include './connect.php';

    $userid=$_POST["signup_id"];

    $stmt = $connect->prepare("SELECT * FROM userinfo WHERE id = ?");

    $stmt->bind_param('s', $userid);
    $result = $stmt->excute();
    $num = mysqli_num_rows($result);

    if ($num != 0) {
?>
<script>
    $stmt->close()
    alert('이미 존재하는 아이디입니다.');
    location.href='/account/signup.html';
</script>
<?php
    }

    $userpwd=hash("sha256", $_POST['signup_pwd']);
    $username=$_POST['signup_name'];
    $userage=$_POST['signup_age'];

    $stmt = $connect->prepare("INSERT INTO userinfo(id, pwd, name, age) values(?, ?, ?, ?)");
    $stmt->bind_param('sssd', $userid, $userpwd, $username, $userage);
    $stmt->excute();
    $stmt->close()

?>
    <script>
        location.href = '/index.html';
    </script>
</body>
</html>