<?php
class ConnectManager
{

    public function connexion(){

        
    }
    

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $db;
    }
}

