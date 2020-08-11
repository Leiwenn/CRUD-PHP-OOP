<?php

namespace p4\blog\model;

abstract class DbManager{

	const DB_HOST = 'mysql:host=localhost;dbname=bd_blog;charset=utf8';
    const DB_USER = 'root';
	const DB_PASS = '';
	
	protected function dbConnexion(){
		$db = new \PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		return $db;
	}
}