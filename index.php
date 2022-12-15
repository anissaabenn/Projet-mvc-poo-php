<?php

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http")));

require_once "controller/GameController.php";
$gameController = new GameController;

if(empty($_GET['page'])){
    require_once "view/home.view.php";
}else {
    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    var_dump($url); //Tester sur URL --> projet.com/games/delete url[0] // games
    switch ($_GET['page']) {
        case 'accueil':
            require_once "view/home.view.php";
            break;
            case 'games':
                $gameController->displayGames();
                break;
    }
}


?>