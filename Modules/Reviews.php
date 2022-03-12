<?php

include_once('../Classes/Review.php');
include_once('Database.php');
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getReviews(int $productId)
{
	global $pdo;
	$query = $pdo->prepare("SELECT * FROM reviews WHERE product_id = ?");
	$query->bindParam(1,$productId);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_CLASS, "Review");
	return $result;
}

function saveReview(int $userId, $title, $text, $rating, $productId) {
	global $pdo;
	if($rating >= 1 && $rating <= 5) {
		$query = $pdo->prepare("INSERT INTO reviews (user_id, title, text, rating, product_id) VALUES (:user_id, :title, :text, :rating, :product_id)");
		$query->bindParam("user_id", $userId);
		$query->bindParam("title", $title);
		$query->bindParam("text", $text);
		$query->bindParam("rating", $rating, PDO::PARAM_INT);
		$query->bindParam("product_id", $productId, PDO::PARAM_INT);
		$query->execute();
	}
}

function getAverageRating(int $productId) { //Verkrijg de gemiddelde beoordeling afgerond op .5
	$reviews = getReviews($productId);
	if($reviews == null) {
		return null;
	}
	$totalRating = 0;
    foreach($reviews as $review) {
        $totalRating += $review->rating;
    }
    return round($totalRating / count($reviews) * 2) / 2;
}