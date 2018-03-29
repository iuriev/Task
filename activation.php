<?php 
include("connect.php");
header('Content-Type: text/html; charset=utf-8');
if(isset($_GET['act']) AND isset($_GET['email'])) {
	$act = $_GET['act'];
	$email = $_GET['email'];
	
	$act = stripslashes($act);
	$act = htmlspecialchars($act);
	$email = stripslashes($email);
	$email = htmlspecialchars($email);
}
else{
	exit("Вы зашил на страницу без кода подтверждения!");
}
 
$activ = mysql_query("SELECT activation FROM users WHERE email='$email'"); 
$id_activ = mysql_fetch_array($activ);
$activation = $id_activ['activation'];

if ($activation == $act) {
	mysql_query("UPDATE users SET status='1' WHERE email='$email'");
	echo "Ваш аккуант успешно активирован! Теперь вы можете зайти на сайт под своим логином и паролем!
	<br>
	<a href='index.php'>Главная страница</a>";
}
else {
	echo "Ошибка! Ваш аккуант не активирован.
			Обратитесь к администратору. <br>
			<a href='index.php'>Главная страница</a>";
}
?>