<?php session_start();
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('profile.tmpl');
 include ("connect.php");
    $email = $_SESSION['email'];
    $result = mysql_query("SELECT * FROM users WHERE email='$email'",$db);
    $myrow = mysql_fetch_array($result);

    $_SESSION['id'] = $myrow['id'];   
    $_SESSION['name'] = $myrow['name'];
    $_SESSION['email'] = $myrow['email'];
    $_SESSION['password'] = $myrow['password'];

  echo $template->render(array(
        'name' => $_SESSION['name'],
        'email' => $_SESSION['email'],
        'password' => $_SESSION['password'],
        'id' => $_SESSION['id']
    ));
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>