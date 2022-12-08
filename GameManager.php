<?php
require_once "Manager.php";

class GameManager extends Manager{
    private $games;

    public function addGame($game){
        $this->games[] = $game;
    }

    public function getGames(){
        return $this->games;
    }

    public function loadGames(){
        $database = $this->getBdd()->prepare("SELECT * FROM games");
        $database->execute();
        $myGames = $database->fetchAll(PDO::FETCH_ASSOC);
        $database->closeCursor();
        echo "<pre>";
        print_r($myGames);
        echo "</pre>";
    }
}



?>