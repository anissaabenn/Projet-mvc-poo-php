<?php

require_once "modele/GameManager.php";

class GameController{
    private $gameManager;

    public function __construct(){
        $this->gameManager = new GameManager();
        $this->gameManager->loadGames();
    }
    public function displayGames(){
        $games = $this->gameManager->getGames();
        require_once "view/games.view.php";
    }
    public function newGameForm(){
        require_once "view/new.games.view.php";
    }
    public function newGameValidation(){
        $this->gameManager->newGameDB($_POST['title'], $_POST['nbPlayers']);
        header('Location:' . URL . "games");
    }

    public function editGameForm($id){
        $game = $this->gameManager->getGameById($id);
        require_once "view/edit.game.view.php";
    }

}

?>