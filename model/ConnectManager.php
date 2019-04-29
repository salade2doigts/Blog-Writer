<?php

namespace Said\Projet4blog\Model;

require_once("Manager.php");

class ConnectManager extends Manager
{

    


    public function connexion($pass,$pseudo){

        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, role, pseudo, password FROM users WHERE pseudo = :pseudo') or die(print_r($db->errorInfo())); 
        $req->execute(array('pseudo'=> $pseudo));
        $resultat = $req->fetch();
        
        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($pass,$resultat['password']);

        if ($isPasswordCorrect) {
            
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['role'] =$resultat['role'];
            $_SESSION['pseudo'] = $pseudo;
            

        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }

        return $isPasswordCorrect;

    }

    public function registering($pseudo,$pass){

        $db = $this->dbConnect();

        $pass_hache = password_hash($pass, PASSWORD_DEFAULT);

        // Insertion
        $req = $db->prepare('INSERT INTO users(pseudo, password, role) VALUES(:pseudo, :password, 3)');
        $req->execute(array(
            'pseudo' => $pseudo,
            'password' => $pass_hache));


    }    


}

