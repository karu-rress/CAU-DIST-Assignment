<?php

//    error_reporting(E_ALL);
//    ini_set("display_errors", 1);

    include './dbconn.php';

    $userid=$_POST['custom_id'];
    $userpwd=$_POST['custom_pwd'];
    $username=$_POST['custom_name'];
    $userage=$_POST['custom_age'];

    $query="INSERT into info(id, pwd, name, age) values('$userid','$userpwd','$username','$userage')";
    //echo $query;
    mysqli_query($connect, $query);

    echo"
    <script>
    location.href='./main.php';
    </script>
    ";

 ?>
