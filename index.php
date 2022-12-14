<?php
require_once "controller/GameController.php";
$gameController = new GameController;

if(empty($_GET['page'])){
    require_once "view/home.view.php";
}else {
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