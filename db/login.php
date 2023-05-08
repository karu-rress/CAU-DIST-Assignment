<!DOCTYPE html>
<html lang="ko">
<body>
<?php
    include 'connect.php';

    # 입력값이 비었는지는 Client (signin.html) 단에서 구현
    $id = $_POST['signin_id'];

    # SQL injection prevention method.
    $stmt = $connect->prepare("SELECT * FROM userinfo WHERE id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_row();
    $stmt->close();
    $num = $result->num_rows;

    // Record가 존재하는가?
    if (!$num) {
        echo "<script>
        alert('존재하지 않는 ID입니다.\\n회원가입을 해주세요.');
        location.href = '/account/signup.html';</script>";
    }

    $userpwd = hash("sha256", $_POST['signin_pwd']);
    if (str_replace(' ', '', $row[1]) != $userpwd) { # password not matches?
        echo "<script>alert('비밀번호가 일치하지 않습니다.');
        location.href = '/account/signin.html';</script>";
    }

    echo '<script>document.cookie = "userlevel='.$id.'; path=/";
        location.href = "/index.html";</script>';
?>
</body>
</html>