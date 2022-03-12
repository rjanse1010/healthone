<?php

include_once('../Classes/OpeningTimes.php');
include_once('Database.php');
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getTimes()
{
	global $pdo;
	$query = $pdo->prepare("SELECT * FROM openingtimes");
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_CLASS, "OpeningTimes");
	return $result;
}

function getDay(int $dayId)
{
    global $pdo;
	$query = $pdo->prepare("SELECT * FROM openingtimes WHERE id = ?");
	$query->bindParam(1,$dayId);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_CLASS, "OpeningTimes");
	if(count($result) >= 1) {
		return $result[0];
	}
	return null;
}

function saveDay(int $dayId, $newOpening, $newClosing) {
	global $pdo;
	$query = $pdo->prepare("UPDATE openingtimes SET time_open = :opening, time_close = :closing WHERE id = :day_id");
	$query->bindParam("opening", $newOpening);
	$query->bindParam("closing", $newClosing);
	$query->bindParam("day_id", $dayId);
	$query->execute();
}