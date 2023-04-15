<?php
    include './connect.php';

    $isbn=$_POST["add_isbn"];

    $query = "SELECT * FROM bookinfo WHERE isbn = '$isbn'";
    $result = mysqli_query($connect, $query);
    $num = mysqli_num_rows($result);

    if ($num != 0) {
?>
<script>
    alert('이미 존재하는 ISBN입니다.');
    location.href='/manage/addbooks.html';
</script>
<?php
    }

    $title=$_POST['add_title'];
    $author=$_POST['add_author'];
    $publisher=$_POST['add_publisher'];

    $query="INSERT INTO bookinfo(isbn, title, author, publisher) VALUES('$isbn','$title','$author','$publisher')";

    mysqli_query($connect, $query);

    echo"
    <script>
    location.href='/index.html';
    </script>
    ";
?>