<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "learning";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if($conn->connect_errno)
{
    die("connection failed");
}

?>