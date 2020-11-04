<?php
$conn = null;

$conn = new mysqli('localhost','root','','activation');

if($conn->connect_error)
{
    die('error in connecting database' . $connect->connect_eroor);
}

?>