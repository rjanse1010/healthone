<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Reviews.php';
require '../Modules/OpeningTimes.php';
require '../Modules/User.php';
// require '../Modules/Database.php';

$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
$title = "HealthOne";
$titleSuffix = "";

session_start();

switch ($params[1]) {
    case 'categories':
        $titleSuffix = ' | Sportapparaten';
        $categories = getCategories();
        include_once "../Templates/categories.php";
        break;
    case 'category':
        if (isset($_GET['category_id'])) {
            $categoryId = $_GET['category_id'];
            $products = getProducts($categoryId);
            $name = getCategoryName($categoryId);

            // if (isset($_GET['product_id'])) {
            //     $productId = $_GET['product_id'];
            //     $product = getProduct($productId);
            //     $titleSuffix = ' | ' . $product->name;
            //     if(isset($_POST['name']) && isset($_POST['review'])) {
            //         saveReview($_POST['name'],$_POST['review']);
            //         $reviews=getReviews($productId);
            //     }
            //     // TODO Zorg dat je hier de product pagina laat zien
			// 	include_once "../Templates/product.php";
            //} else {
				$titleSuffix = ' | Sportapparaten in categorie ' . $name;
                // TODO Zorg dat je hier alle producten laat zien van een categorie
				include_once "../Templates/products.php";
            //}
        } else {
            // TODO Toon de categorieen
            $titleSuffix = ' | Sportapparaten';
            $categories = getCategories();
            include_once "../Templates/categories.php";
        }
        break;
    case 'product':
        if (isset($_GET['product_id'])) {
            $productId = $_GET['product_id'];
            $product = getProduct($productId);
            $titleSuffix = ' | ' . $product->name;
            if(isset($_POST['name']) && isset($_POST['review'])) {
                saveReview($_POST['name'],$_POST['review']);
                $reviews=getReviews($productId);
            }
            // TODO Zorg dat je hier de product pagina laat zien
            include_once "../Templates/product.php";
        } else {
            $titleSuffix = ' | Home';
            include_once "../Templates/home.php";
        }
        break;
	case 'contact':
		$titleSuffix = ' | Contact';
        include_once "../Templates/contact.php";
		break;
    case 'member':
        $titleSuffix = ' | Memberpagina';
        include_once "../Templates/member.php";
        break;
	case 'login':
		$titleSuffix = ' | Inloggen';
        include_once "../Templates/login.php";
		break;
    case 'logout':
        include_once "../Templates/logout.php";
		break;
    default:
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
}

function getTitle() {
    global $title, $titleSuffix;
    return $title . $titleSuffix;
}
