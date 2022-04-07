<?php

include_once('../Classes/User.php');
include_once('Database.php');

function validateUser($username, $password) //Als de user correct heeft ingelogd, stuur dan de user ID terug, anders stuur je false terug.
{
	try {
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM users WHERE username = :username");
		$query->bindParam("username", $username);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_CLASS, "User");
        if($result != null) {
            $result = $result[0];
            if (password_verify($password, $result->password)) { //Als het wachtwoord overeen komt met het wachtwoord in de database.
                return $result->id;
            }
        }
        return false;
	} catch(Exception $e) {
		echo $e;
	}
}

function registerUser($username, $password) {
    //TODO: Alleen unieke gebruikers registreren!!
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    global $pdo;
    $query = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)"); //Zet de nieuwe gebruikersnaam en wachtwoord in de database
    $query->bindParam("username", $username);
    $query->bindParam("password", $hashed); //gehashte wachtwoord in de database zetten
    $query->execute();
    return true;
    return false; //Stuur false terug als de gebruiker met deze naam al bestond en er dus geen nieuwe user kon worden geregistreerd.
}

function getUserById(int $userId) {
	global $pdo;
	$query = $pdo->prepare("SELECT username, is_admin FROM users WHERE id = :user_id");
	$query->bindParam("user_id", $userId);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_CLASS, "User")[0];
	return $result;
}

function userIsLoggedIn() {
	return isset($_SESSION['user_id']); //Als de sessie user ID bestaat is de user ingelogd, dus dan return je true
}

function userIsAdmin(int $userId) {
	return (getUserById($userId)->is_admin)==1?true:false; //True als de gebruiker een admin is
}

function editProfile(int $userId, $newUsername, $newPassword) {
	try {
        $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
		global $pdo;
		$query = $pdo->prepare("UPDATE users SET username = :username, password = :password WHERE id = :user_id"); //Zet de nieuwe gebruikersnaam en wachtwoord in de database
		$query->bindParam("username", $newUsername);
		$query->bindParam("password", $hashed);
		$query->bindParam("user_id", $userId);
		$query->execute();
	} catch(Exception $e) {
		echo $e;
	}
}