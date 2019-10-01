<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);
// Get Keyword
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
if (empty($keywords)){
    http_response_code(400);
    echo json_encode(array("issues" => [
        "description" => "Malformed request sent.",
        "errorCode" => "400",
        "issue" => "No parameters passed"
    ]));
    die();
}
// read products will be here
// query products
$stmt = $product->find($keywords);
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
    $location_arr=array();
    $location_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $locationStmt = $product->readOne($locationId);
        $locationCount = $locationStmt->rowCount();
        // main Array
        $location_item=array(
            "partnerID" => $locationId,
            "name" => $name,
            "locationNameAlias" => $locationNameAlias,
            "yearEstablished" => $yearEstablished,
            "description" => $description
        );
        array_push($location_arr["records"], $location_item);
    }
    http_response_code(200);
    echo json_encode($location_arr);
}

// No Locations Found
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No locations found.")
    );
}