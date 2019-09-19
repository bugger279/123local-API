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

// Get Keyword and checking if its empty or not
if (isset($_GET['name'])) {
    $keywordName=isset($_GET['name']) ? $_GET['name'] : "";
} else {
    $keywordName = "";
}

if (isset($_GET['address'])) {
    $keywordAddress=isset($_GET['address']) ? $_GET['address'] : "";
} else {
    $keywordAddress = "";
}

if (isset($_GET['address2'])) {
    $keywordAddress2=isset($_GET['address2']) ? $_GET['address2'] : "";
} else {
    $keywordAddress2 = "";
}

if (isset($_GET['city'])) {
    $keywordCity=isset($_GET['city']) ? $_GET['city'] : "";
} else {
    $keywordCity = "";
}

if (isset($_GET['state'])) {
    $keywordState=isset($_GET['state']) ? $_GET['state'] : "";
} else {
    $keywordState = "";
}

if (isset($_GET['zip'])) {
    $keywordZip=isset($_GET['zip']) ? $_GET['zip'] : "";
} else {
    $keywordZip = "";
}

if (isset($_GET['countryCode'])) {
    $keywordCountryCode=isset($_GET['countryCode']) ? $_GET['countryCode'] : "";
} else {
    $keywordCountryCode = "";
}

if (isset($_GET['latlang'])) {
    $keywordLatLang=isset($_GET['latlang']) ? $_GET['latlang'] : "";
    $str = $keywordLatLang;
    $splittedData = explode(",",$str);
    $keywordLatitude = $splittedData[0];
    $keywordLongitude = $splittedData[1];
} else {
    $keywordLatLang = "";
    $str = $keywordLatLang;
    $keywordLatitude = "";
    $keywordLongitude = "";
}

// query products
$stmt = $product->search($keywordName, $keywordAddress, $keywordAddress2, $keywordCity, $keywordState, $keywordZip, $keywordCountryCode, $keywordLatitude, $keywordLongitude);
print_r($stmt);

$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
    $location_arr=array();
    $location_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $locationStmt = $product->readOne($locationId);
        $locationCount = $locationStmt->rowCount();

        // Reviews Count
        $reviewCountStmt = $product->readReview($locationId);
        $reviewsCount = $reviewCountStmt->rowCount();

        // main Array
        $location_item=array(
            "id" => $locationId,
            "status" => $status,
            "name" => $name,
            "address" => $address,
            "address2" => $address2,
            "city" => $city,
            "state" => $state,
            "zip" => $postalCode,
            "countryCode" => $countryCode,
            "latitude" => $displayLatitude,
            "longitude" => $displayLongitude,
            "websiteUrl" => "https://123local.com/single.php?id=".$locationId,
            "yearEstablished" => $yearEstablished,
            "reviewCount" => $reviewsCount,
            "created" => $created
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