<?php

if(empty($_GET['page'])){
    require_once "view/home.view.php";
}else {
    switch ($_GET['page']) {
        case 'accueil':
            require_once "view/home.view.php";
            break;
            case 'games':
                require_once "view/games.view.php";
                break;
    }
}


?>