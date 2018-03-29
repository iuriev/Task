<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include "config.php";
include ("connect.php");
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    if ($name == '') {
        unset($name);
    } 
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if ($email == '') {
        unset($email);
    } 
} 

if (isset($_POST['password'])) {
    $password=$_POST['password'];
    if ($password =='') {
        unset($password);
    }
}

$email = stripslashes($email);
$email = htmlspecialchars($email);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$name = stripslashes($name);
$name = htmlspecialchars($name);
$email = trim($email);
$password = trim($password);


$result = mysql_query("SELECT id FROM users WHERE email='$email'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}
    
$activation = md5($email);
$result2 = mysql_query ("INSERT INTO users (name, email,password,activation) 
                        VALUES('$name', '$email','$password','$activation')");
$to=$email;
$subject="Подтверждение электронной почты";
$message = "Здравствуйте! Спасибо за регистрацию на сайте \n 
            Ваш логин: ".$email."\n
            Для того чтобы войти в свой аккуант его нужно активировать.\n
            Чтобы активировать ваш аккаунт, перейдите по ссылке:\n
            proj/activation.php?email=".$email."&act=".$activation."\n\n
            С уважением, Администрация сайта";
 mail($to,$subject,$message);
if ($result2=='TRUE'){
    header("Refresh: 4; URL=http://". BASE_URL);
    echo "Спасибо за регистрацию на сайте.<br>
        Для того чтобы войти в свой аккуант его нужно активировать.<br>
        Чтобы активировать ваш аккаунт, перейдите по ссылке  в письме";
}
else {
    echo "Произошла  ошибка на сервере.";
}
    ?>