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

// function saveReview($name, $title, $text, int $rating, int $product_id) {
// 	global $pdo;
// 	if($rating >= 1 && $rating <= 5) {
// 		$query = $pdo->prepare("INSERT INTO reviews (name, title, text, rating, product_id) VALUES (:name, :title, :text, :rating, :product_id)");
// 		$query->bindParam("name", $name);
// 		$query->bindParam("title", $title);
// 		$query->bindParam("text", $text);
// 		$query->bindParam("rating", $rating, PDO::PARAM_INT);
// 		$query->bindParam("product_id", $product_id, PDO::PARAM_INT);
// 		$query->execute();
// 	}
// }