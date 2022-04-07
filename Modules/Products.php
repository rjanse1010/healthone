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
    $product_temp = getProduct($productId); //Laad alvast het product in om de afbeelding nog te kunnen verwijderen na het uit de database halen.
    $path = $_SERVER['DOCUMENT_ROOT'] . "/public/img/categories/" . $product_temp->picture;
	global $pdo;
	$query = $pdo->prepare("DELETE FROM products WHERE id = ?");
	$query->bindParam(1,$productId);
	$query->execute();
    //echo $path;
    if(unlink($path)) {
        //echo ("$product_temp->picture afbeelding verwijderd."); DEBUG
    } else {
        echo ("$product_temp->picture afbeelding kon niet worden verwijderd.");
    }
}

function editProduct(int $productId, int $newCat, string $newName, string $newDesc)
{
    global $pdo;
    $query = $pdo->prepare("UPDATE products SET category_id = :newcat, name = :newname, description = :newdesc WHERE id = :id");
    $query->bindParam("newcat",$newCat);
    $query->bindParam("newname",$newName);
    $query->bindParam("newdesc",$newDesc);
    $query->bindParam("id",$productId);
    $query->execute();
}