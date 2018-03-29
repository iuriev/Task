<?php session_start();
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('reg_page.tmpl');

  echo $template->render(array());
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>
