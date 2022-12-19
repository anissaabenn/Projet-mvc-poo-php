<?php
require_once "Manager.php";
require_once "Game.php";

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
        // echo "<pre>";
        // print_r($myGames);
        // echo "</pre>";
        foreach ($myGames as $game) {
            $g = new Game ($game['ID'], $game['title'], $game['nb_players']);
            $this->addGame($g);
        }
    }

    public function newGameDB($title, $nbPlayers){
        $req = "INSERT INTO games (title, nb_Players)
                VALUES (:title, :nbPlayers)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":title", $title, PDO::PARAM_STR);
        $statement->bindValue(":nbPlayers", $nbPlayers, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result){
            $game = new Game($this->getBdd()->lastInsertId(),$title, $nbPlayers);
            $this->addGame($game);
        }
    }

    public function getGameById($id){
        foreach($this->games as $game){
            if($game->getId() == $id){
                return $game;
            }
        }
    }

    public function editGameDB($id, $title, $nbPlayers){
        $req = "UPDATE games SET title = :title, nb_players = :nbPlayers WHERE id = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->bindValue(":title", $title, PDO::PARAM_STR);
        $statement->bindValue(":nbPlayers", $nbPlayers, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result){
            $this->getGameById($id)->setTitle($title);
            $this->getGameById($id)->setNbPlayers($nbPlayers);
        }
    }

    public function deleteGameDB($id){
        $req = "DELETE FROM games WHERE id = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result){
            $game = $this->getGameById($id);
            unset($game);
        }
    }
}



?>