<?php session_start();
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('index.tmpl');
  if($_SESSION['login_error'] == true){
		echo $template->render(array(
    	'login_error' => 'true'));
	}else if($_SESSION['email_conf_error'] == true){

			echo $template->render(array(
    'email_conf_error' => 'true'
      ));

		}
		else {
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $template->render(array());
  }
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>