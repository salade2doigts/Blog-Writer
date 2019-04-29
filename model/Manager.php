<?php

namespace Said\Projet4blog\Model;

class Manager
{
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=db5000036757.hosting-data.io;dbname=dbs31763;charset=utf8', 'XXXXXXX', 'XXXXXXXX');
		return $db;
	}
}