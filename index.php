<?
$db_host = "localhost";
$db_user = "root";
$db_passwd = "mOlaSM28@$&s";
$db_name = "mydb";

$dbconn = new mysqli ($db_host, $db_user, $db_passwd, $db_name);

if ($dbconn->connect_errno) {
    die('Connection Error : '.$dbconn->connect_error);
} else {
    echo "<center>DB 연결 완료!!</center>";
}

phpinfo();

?>