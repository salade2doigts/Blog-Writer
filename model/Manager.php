<?php

namespace Said\Projet4blog\Model;

class Manager
{
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
		return $db;
	}
}