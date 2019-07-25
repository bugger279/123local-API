<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// print_r($database); die();

// prepare product object
$product = new Product($db);

// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
$id=isset($_GET["id"]) ? $_GET["id"] : "";
// set location id to be updated
$product->id = $id;
// set product property values
$product->yextID = $data->yextID;
if (empty($data->status)) {
    $product->status = "LIVE";
} else {
    $product->status = $data->status;
}
$product->name = $data->name;
$product->address = $data->address->address;
$product->visible = $data->address->visible;
$product->address2 = $data->address->address2;
$product->city = $data->address->city;
$product->displayAddress = $data->address->displayAddress;
$product->countryCode = $data->address->countryCode;
$product->postalCode = $data->address->postalCode;
$product->state = $data->address->state;
$product->phones = $data->phones;
$product->categories = $data->categories;
$product->description = $data->description;
$product->emails = $data->emails;
$product->displayLatitude = $data->geoData->displayLatitude;
$product->displayLongitude = $data->geoData->displayLongitude;
$product->routableLatitude = $data->geoData->routableLatitude;
$product->routableLongitude = $data->geoData->routableLongitude;

$product->mondays = $data->hours[0]->intervals;
$product->tuesdays = $data->hours[1]->intervals;
$product->wednesdays = $data->hours[2]->intervals;
$product->thursdays = $data->hours[3]->intervals;
$product->fridays = $data->hours[4]->intervals;
$product->saturdays = $data->hours[5]->intervals;
$product->sundays = $data->hours[6]->intervals;

$product->hoursDisplayText = $data->hoursText->display;
$product->images = $data->images;
$product->videos = $data->videos;
$product->specialOfferMessage = $data->specialOffer->message;
$product->specialOfferUrl = $data->specialOffer->url;
// $product->paymentOptions = $data->paymentOptions;
$product->paymentOptionsName = $data->paymentOptions;
$product->urls = $data->urls;
$product->twitterHandle = $data->twitterHandle;
$product->facebookPageUrl = $data->facebookPageUrl;
$product->attributionImageWidth = $data->attribution->image->width;
$product->attributionImageDescription = $data->attribution->image->description;
$product->attributionImageUrl = $data->attribution->image->url;
$product->attributionImageHeight = $data->attribution->image->height;
$product->attributionUrl = $data->attribution->attributionUrl;
$product->keywordsName = $data->keywords;
$product->lists = $data->lists;
$product->closed = $data->closed;
$product->specialitiesName = $data->specialities;
$product->brandsName = $data->brands;
$product->productsName = $data->products;
$product->servicesName = $data->services;
$product->yearEstablished = $data->yearEstablished;
$product->associationsName = $data->associations;
$product->languagesName = $data->languages;

if (empty($product->id)){
    http_response_code(400);
    echo json_encode(array(
        "description" => [
            "message" => "Yext sent a malformed request..",
            "issue" => "No id Provided"
        ]
    ));
    die();
}

$queryForId = "SELECT * FROM locations WHERE locationId=$product->id";
$stmt = $database->conn->prepare($queryForId);
$stmt->execute();
$count = $stmt->rowCount();

if ($count > 0) {
    $product->update();
    http_response_code(201);
    echo json_encode(array(
        "description" => [
            "message" => "Location was updated.",
            "status" => "$product->status",
            "id" => "$product->id",
            "url" => "https://123local.com/single.php?id=".$product->id,
            "issue" => []
        ]
    ));
} else {
    http_response_code(404);
    echo json_encode(array(
        "issues" => [
            "description" => "No Such Location",
            "errorCode" => "404",
            "issue" => "Nothing to Update."
        ]
    ));
    die();
}

?>