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

    $stmt = $connect->prepare("SELECT * FROM userinfo WHERE id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows !== 0) {
        $stmt->close();
        echo "<script>alert('이미 존재하는 ID입니다.');
            location.href = '../account/signup.html';</script>";
    }

    $userpwd = hash("sha256", $_POST['signup_pwd']);
    $username = $_POST['signup_name'];
    $userage = $_POST['signup_age'];

    # id, pwd, name(varchar), age(uint)
    $stmt = $connect->prepare("INSERT INTO userinfo(id, pwd, name, age) VALUES(?, ?, ?, ?)");
    $stmt->bind_param('sssi', $id, $userpwd, $username, $userage);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('회원가입이 완료되었습니다. \n로그인을 해 주세요.');</script>";
    echo '<script>location.href = "../account/signin.html";</script>';
?>
</body>
</html>