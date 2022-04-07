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
if(userIsLoggedIn()) {
    $currentUser = getUserById($_SESSION["user_id"]);
}

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
				$titleSuffix = ' | Sportapparaten in categorie ' . $name;
                // Alle producten laten zien van een categorie
				include_once "../Templates/products.php";
        } else {
            // Toon de categorieen
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
                saveReview($_POST['name'],$_POST['review']); //als de gebruiker een review heeft gemaakt, stuur deze naar de database
                $reviews=getReviews($productId);
            }
            // Laat product pagina zien
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
        if(count($params) >= 3 && $params[2] == 'edit') {
            $titleSuffix = ' | Memberpagina bewerken';
            include_once "../Templates/member_edit.php";
        } else {
            $titleSuffix = ' | Memberpagina';
            include_once "../Templates/member.php";
        }
        break;
    case 'admin':
        if(count($params) >= 3 && $params[2] == 'products') {
            if(count($params) >= 4 && $params[3] == 'add') {
                $titleSuffix = ' | Adminpaneel: Sportapparaat toevoegen';
                include_once "../Templates/admin_products_add.php";
            } else if(count($params) >= 5 && $params[3] == 'edit') {
                $productId = $_GET['product_id'];
                $product = getProduct($productId);
                $titleSuffix = ' | Adminpaneel: Sportapparaat bewerken';
                include_once "../Templates/admin_products_edit.php";
            } else if(count($params) >= 5 && $params[3] == 'delete') {
                $productId = $_GET['product_id'];
                $product = getProduct($productId);
                $titleSuffix = ' | Adminpaneel: Sportapparaat verwijderen';
                include_once "../Templates/admin_products_delete.php";
            } else {
                $products = getAllProducts();
                $titleSuffix = ' | Adminpaneel: Sportapparaten';
                include_once "../Templates/admin_products.php";
            }
        } else if(count($params) >= 3 && $params[2] == 'contact') {
            if(count($params) >= 5 && $params[3] == 'edit') { //Als de admin een dag wil bewerken
                $dayId = intval($_GET["day_id"]); //Voorkom iets anders dan int in de url
                $day = getDay($dayId);
                $titleSuffix = ' | Adminpaneel: Contact bewerken';
                include_once "../Templates/admin_contact_edit.php";
            } else {
                $titleSuffix = ' | Adminpaneel: Contact';
                include_once "../Templates/admin_contact.php"; 
            }
        } else {
            $titleSuffix = ' | Adminpaneel';
            include_once "../Templates/admin.php";
        }
        break;
    case 'register':
        $titleSuffix = ' | Registreren';
        include_once "../Templates/register.php";
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
