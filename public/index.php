<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Database.php';

$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
$title = "HealthOne";
$titleSuffix = "";

switch ($params[1]) {
    case 'categories':
        $titleSuffix = ' | Categories';
        $categories = getCategories();
        include_once "../Templates/categories.php";
        break;

    case 'category':
        $titleSuffix = ' | Category';
        if (isset($_GET['id'])) {
            $categoryId = $_GET['id'];
            $products = getProducts($categoryId);
            include_once "../Templates/products.php";
        } else {
            $titleSuffix = ' | Category';
            include_once "../Templates/home.php";
        }
        break;

    case 'product':
            if (isset($_GET['id'])) {
                $productId = $_GET['id'];
                $product = getProduct($productId);
                $titleSuffix = ' | ' . $product->name;
                if(isset($_POST['name']) && isset($_POST['review'])) {
                    saveReview($_POST['name'],$_POST['review']);
                    $reviews=getReviews($productId);
                }
                include_once "../Templates/productpage.php";
            }
        break;
        
    case 'contact':
            include_once "../Templates/contact.php";
            break;
    case 'registreren':
        include_once "../Templates/Registreren.php";
        break;
            
    case 'reviewpage':
            $titleSuffix = ' | review';
            $productId = 1;
            include_once "../Templates/reviewpage.php";
            break;

    case 'login':
            $titleSuffix = ' | Login';
            if (isset($_POST['login'])) {
                $result = checklogin();

                switch ($result) {
                    case 'ADMIN':
                        header("Location: /admin/home");
                        break;
                        
                    case 'MEMBER':
                        
                        break;
                        
                    case 'FAILURE':
                        $message = "Email of password niet correct ingevuld";
                        include_once "../Templates/login.php";
                        break;
                    case 'INCOMLETE';
                        $message = "Formulier niet volledig ingevuld!";
                        include_once "../Templates/login.php";
                        break;
                }
            }
            else {
                include_once "../Templates/login.php";
            }
            break;
    default:
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
}

function getTitle() {
    global $title, $titleSuffix;
    return $title . $titleSuffix;
}