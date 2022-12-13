<?php ob_start(); ?>

<p>Accueil - Hello World</p>

<?php
$content = ob_get_clean();
$title = "Bienvenue chez Game-X";
require_once "view/base.view.php";
?>