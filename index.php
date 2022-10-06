<?php
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define('PATH', '/sdbm');
define('NBR_ITEMS', 100);

require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controller.php');

$params = explode('/', $_GET['p']);

if ($params[0] != "") {
    //récupération du controller
    $controller = ucfirst($params[0]);

    //récupération de la méthode
    $action = isset($params[1]) ? $params[1] : 'index';
    $file = ROOT . 'controllers/' . $controller . 'Controller.php';

    //vérifie si le contrôleur existe + l'initialise
    if (file_exists($file)) {
        require_once(ROOT . 'controllers/' . $controller . 'Controller.php');
        $controller = new $controller();       
    }
    //récupération des paramètres complémentaires + execution de la méthode appelée
    if ( method_exists($controller, $action)) {
        unset($params[0]);
        unset($params[1]);
        //execution de $controller->$action() avec le 3e paramètre
        call_user_func_array([$controller, $action], $params);
    } else {
        http_response_code(404);
        echo "La page n'existe pas.";
    }
} else {
    require_once(ROOT.'controllers/AccueilController.php');
    $controller = new Accueil();
    $controller->index();
}
?>