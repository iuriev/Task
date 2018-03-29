<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    if ($name == '') {
        unset($name);
    } 
}

if (isset($_POST['password'])) {
    $password=$_POST['password'];
    if ($password =='') {
    unset($password);
    } 
}
 
if ( empty($password) or empty($password)) {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

$name = $_POST["name"];
$password = $_POST["password"];
$email = $_SESSION["email"];

include ("connect.php");
$result = mysql_query("SELECT id FROM users WHERE email='$email'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
    $id= $myrow['id'];
    $str = "UPDATE `users` SET `name`= '$name', `password`= '$password' WHERE id = ". $myrow['id'];
    $result2 = mysql_query ($str);
}
echo "ok";
?>