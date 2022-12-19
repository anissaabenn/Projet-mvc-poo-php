<?php ob_start(); ?>


<?php
$content = ob_get_clean();
$title = "Editer :  " . $game->getTitle();
require_once "view/base.view.php";
?>