<?php
include_once('../Classes/Category.php');
include_once('../Classes/Product.php');
include_once('Database.php');

// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getProducts(int $categoryId)
{
    global $pdo;
	$query = $pdo->prepare("SELECT * FROM products WHERE category_id = ?");
	$query->bindParam(1,$categoryId);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_CLASS, "Product");
	return $result;
}

function getAllProducts()
{
    global $pdo;
	$query = $pdo->prepare("SELECT * FROM products");
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_CLASS, "Product");
	return $result;
}

function getProduct(int $productId)
{
    global $pdo;
	$query = $pdo->prepare("SELECT * FROM products WHERE id = ?");
	$query->bindParam(1,$productId);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_CLASS, "Product")[0];
	return $result;
}

function deleteProduct(int $productId) {
	global $pdo;
	$query = $pdo->prepare("DELETE FROM products WHERE id = ?");
	$query->bindParam(1,$productId);
	$query->execute();
}