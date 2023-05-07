<!DOCTYPE html>
<html lang="ko">
<head>
    <script src="/scripts/js/user.js"></script>
</head>
<body>
<?php
    include './connect.php';

    # 입력값이 비었는지는 Client (signin.html) 단에서 구현
    $id = $_POST["signup_id"];

    # SQL injection prevention method.
    $stmt = $connect->prepare("SELECT * FROM userinfo WHERE id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $num = $result->num_rows;

    if ($num != 0) {
        $stmt->close();
        echo "<script>formError('이미 존재하는 ID입니다.',
            '/account/signup.html');</script>";
    }

    $userpwd = hash("sha256", $_POST['signup_pwd']);
    $username = $_POST['signup_name'];
    $userage = $_POST['signup_age'];

    # id, pwd, name(varchar), age(uint)
    $stmt = $connect->prepare("INSERT INTO userinfo(id, pwd, name, age) VALUES(?, ?, ?, ?)");
    $stmt->bind_param('sssd', $id, $userpwd, $username, $userage);
    $stmt->execute();
    $stmt->close();

    echo '<script>location.href = "/index.html";</script>';
?>
</body>
</html>