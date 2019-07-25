<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/product.php';
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
// $field_data = array( "yextID" => $data->yextID, "name" => $data->name, "address" => $data->address->address, "visible" => $data->address->visible, "address2" => $data->address->address2, "city" => $data->address->city, "displayAddress" => $data->address->displayAddress, "countryCode" => $data->address->countryCode, "postalCode" => $data->address->postalCode, "state" => $data->address->state, "description" => $data->description, "displayLatitude" => $data->geoData->displayLatitude, "displayLongitude" => $data->geoData->displayLongitude, "routableLatitude" => $data->geoData->routableLatitude, "routableLongitude" => $data->geoData->routableLongitude, "hoursText->display" => $data->hoursText->display, "specialOfferMessage" => $data->specialOffer->message, "specialOfferUrl" => $data->specialOffer->url, "twitterHandle" => $data->twitterHandle, "facebookPageUrl" => $data->facebookPageUrl, "attribution->Image->Width" => $data->attribution->image->width, "attribution->Image->Description" => $data->attribution->image->description, "attribution->Image->Url" => $data->attribution->image->url, "attribution->Image->Height" => $data->attribution->image->height, "attributionUrl" => $data->attribution->attributionUrl, "closed" => $data->closed, "yearEstablished" => $data->yearEstablished);
$field_data = array( "yextID" => $data->yextID, "name" => $data->name, "address" => $data->address, "address" => $data->address->address, "city" => $data->address->city, "state" => $data->address->state, "postalCode" => $data->address->postalCode, "countryCode" => $data->address->countryCode, "categories" => $data->categories, "displayLatitude" => $data->geoData->displayLatitude, "displayLongitude" => $data->geoData->displayLongitude, "phones" => $data->phones );
foreach($field_data as $key => $val) {
    if (empty($val)) {
        http_response_code(400);
        echo json_encode(array("issues" => [
        "description" => "Unable to create Location. Data is incomplete.",
        "errorCode" => "400",
        "issue" => "$key is empty"
        ]));
        die();
    }
}

if(
    !empty($data->yextID) &&
    !empty($data->name) &&
    !empty($data->address->address) &&
    !empty($data->address->city) &&
    !empty($data->address->countryCode) &&
    !empty($data->address->postalCode) &&
    !empty($data->address->state)
){
    $product->yextID = $data->yextID;
    $product->name = $data->name;
    if (empty($data->status)) {
        $product->status = "LIVE";
    } else {
        // $product->status = $data->status;
        $product->status = $data->status;
    }
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
    $product->urls = $data->urls;
    $product->twitterHandle = $data->twitterHandle;
    $product->facebookPageUrl = $data->facebookPageUrl;

    if (empty($data->attribution->image->width)) {
        $product->attributionImageWidth = 0;    
    } else {
        $product->attributionImageWidth = $data->attribution->image->width;
    }
    
    $product->attributionImageDescription = $data->attribution->image->description;
    $product->attributionImageUrl = $data->attribution->image->url;
    
    if (empty($data->attribution->image->height)) {
        $product->attributionImageHeight = 0;    
    } else {
        $product->attributionImageHeight = $data->attribution->image->height;
    }

    $product->attributionUrl = $data->attribution->attributionUrl;
    $product->keywordsName = $data->keywords;
    $product->lists = $data->lists;
    $product->closed = $data->closed;
    $product->specialitiesName = $data->specialities;
    $product->brandsName = $data->brands;
    $product->paymentOptionsName = $data->paymentOptions;
    $product->productsName = $data->products;
    $product->servicesName = $data->services;

    if (empty($data->yearEstablished)) {
        $product->yearEstablished = 0;    
    } else {
        $product->yearEstablished = $data->yearEstablished;
    }

    $product->associationsName = $data->associations;
    $product->languagesName = $data->languages;

    // create the product
    $product->create();

}

?>
