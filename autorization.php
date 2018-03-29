<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
unset($_SESSION['login_error']);
unset($_SESSION['email_conf_error']);

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

$email = trim($email);
$password = trim($password);

include ("connect.php");
$result = mysql_query("SELECT password FROM users WHERE email='$email'",$db);
$myrow = mysql_fetch_array($result);

if ($myrow['password'] != $password) {
    $_SESSION['login_error'] = true;
    unset($_SESSION['email_conf_error']);
    $url="index.php";
    echo '<script type="text/javascript">'; 
    echo 'window.location.href="'.$url.'";'; 
    echo '</script>';    
}else{
    $result = mysql_query("SELECT status FROM users WHERE email='$email'",$db);
    $myrow = mysql_fetch_array($result);
    if ($myrow['status'] == 0){
        unset($_SESSION['login_error']);
        $_SESSION['email_conf_error'] = true;
        $url="index.php";
        echo '<script type="text/javascript">'; 
        echo 'window.location.href="'.$url.'";'; 
        echo '</script>'; 
    }else {
        $result = mysql_query("SELECT * FROM users WHERE email='$email'",$db);
        $myrow = mysql_fetch_array($result);
        $_SESSION['login_error'] = false;
        $_SESSION['email_conf_error'] = false;
        $_SESSION['status'] = $myrow['status'];
        $_SESSION['id'] = $myrow['id'];   
        $_SESSION['name'] = $myrow['name'];
        $_SESSION['email'] = $myrow['email'];
        $url="profile.php";
        echo '<script type="text/javascript">'; 
        echo 'window.location.href="'.$url.'";'; 
        echo '</script>';
    }
}?>