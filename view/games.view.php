<?php
require_once "controller/GameController.php";

ob_start();
?>

<p>Games - Notre sélection </p>

<?php
$content = ob_get_clean();
$title = "Liste de Jeux";
require_once "view/base.view.php";
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
      <?php foreach ($games as $game) : ?>
        <tr class="table-light">
          <td><?= $game->getTitle() ?></td>
          <td><?= $game->getNbPlayers() ?></td>
          <td>
            <a href="<?= URL ?>games/edit/<?= $game->getId() ?>" ><i class="fa-solid fa-pen-to-square"></i></a>
          </td>
          <td>
            <form method="POST" onsubmit="return confirm('Etes-vous certains de vouloir supprimer ce jeu ?')" action="<?= URL ?>games/delete/<?= $game->getId() ?>">
              <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
  </table>
</div>

<a href="<?= URL ?>games/add" class="btn btn-success d-block m-auto w-25">Ajouter un jeux</a>