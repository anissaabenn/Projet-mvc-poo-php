<?php 
require_once "Game.php";

$game1 = new Game(1, "Starcraft 2", 8);
$game2 = new Game(2, "Among US", 10);
$game3 = new Game(3, "Valorant", 10);

$games = [$game1, $game2, $game3];

ob_start(); ?>

<p>Games - Notre sélection </p>

<?php
$content = ob_get_clean();
$title = "Liste de Jeux";
require_once "base.html.php";
?>

<div class="container">
<table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th>Titre</th>
      <th>Nombre de joueurs</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($games as $game) : ?>
    <tr class="table-light">
      <td><?= $game->getTitle() ?></td>
      <td><?= $game->getNbPlayers() ?></td>
      <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
      <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
    </tr>
    <?php endforeach; ?>
    <!-- <tr class="table-light">
      <td>Among Us</td>
      <td>10</td>
      <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
      <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
    </tr>
    <tr class="table-light">
      <td>Valorant</td>
      <td>10</td>
      <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
      <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
    </tr> -->
</table>
</div>

<a href="" class="btn btn-success d-block m-auto w-25">Ajouter un jeux</a>