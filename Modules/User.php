<?php

include_once('../Classes/User.php');
include_once('Database.php');
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function validateUser($username, $password)
{
	try {
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
		$query->bindParam("username", $username);
		$query->bindParam("password", $password);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_CLASS, "User");
		if(count($result) != 1) {
			return false;
		}
		return $result[0]->id;
	} catch(Exception $e) {
		echo $e;
	}
}

function getUserById($userId) {
	global $pdo;
	$query = $pdo->prepare("SELECT username, is_admin FROM users WHERE id = :userid");
	$query->bindParam("userid", $userId);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_CLASS, "User")[0];
	return $result;
}