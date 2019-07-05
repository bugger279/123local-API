<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/product.php';
 
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);

$categoryStmt = $product->readAllCategories();
$categoryCount = $categoryStmt->rowCount();

$categories_arr=array();
$categories_arr["categories"]=array();

$category_arr=array();
if ($categoryCount > 0) {
    while ($row = $categoryStmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $category_arr = [
            "categoryID" => $categoryID,
            "categoryName" => $categoriesName,
            "categoriesNameAlias" => $categoriesNameAlias
        ];
        array_push($categories_arr["categories"], $category_arr);
    }
    http_response_code(200);
    echo json_encode($categories_arr);
}
// No categories Found
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No categories found.")
    );
}