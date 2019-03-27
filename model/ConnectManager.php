<?php
class ConnectManager
{

    


    public function connexion($passhach,$pseudo){

        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, pseudo, password FROM users WHERE pseudo = :pseudo') or die(print_r($db->errorInfo())); 
        $req->execute(array('pseudo'=> $pseudo));
        $resultat = $req->fetch();
        
        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($resultat['password'],$passhach);

        if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';

        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }

        return $isPasswordCorrect;

        }


    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;
    }
}

