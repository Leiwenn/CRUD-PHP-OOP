<?php

//namespace Blog\model;

class DbManager{

	protected function dbConnexion(){
		try {
			$db = new PDO('mysql:host=localhost;dbname=bd_blog;', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
		}
		return $db;
	}
}