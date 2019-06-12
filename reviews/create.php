<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
include_once '../objects/review.php';

$database = new Database();
$db = $database->getConnection();
$review = new Review($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
// print_r($data);
$data->listingId;
$data->status;
$data->authorName;
$data->authorPhotoUrl;
$data->title;
$data->content;
$data->url;
$data->source;
$data->rating;

$field_data = array( "listingId" => $data->listingId, "status" => $data->status, "authorName" => $data->authorName, "title" => $data->title, "content" => $data->content, "url" => $data->url, "rating" => $data->rating);

foreach($field_data as $key => $val) {
    if (empty($val)) {
        // set response code - 400 bad request
        http_response_code(400);
        // tell the user
        echo json_encode(array("issues" => [
        "description" => "Unable to create review. Data is incomplete.",
        "errorCode" => "400",
        "issue" => "$key is empty"
        ]));
        die();
    }
}
$data->listingId;
$data->status;
$data->authorName;
$data->title;
$data->content;
$data->url;
$data->source;
$data->rating;

$id = $data->listingId;

// make sure data is not empty
if(
    !empty($data->listingId) &&
    !empty($data->status) &&
    !empty($data->authorName) &&
    !empty($data->title) &&
    !empty($data->content) &&
    !empty($data->url) &&
    !empty($data->source) &&
    !empty($data->rating)
){

    $queryForId = "SELECT * FROM locations WHERE locationId=$id";
    $stmt = $database->conn->prepare($queryForId);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
    $product->update();
    http_response_code(200);
    echo json_encode(array(
        "description" => [
            "message" => "Location was updated.",
            "status" => "$product->status",
            "id" => "$product->id",
            "url" => "http://www.someexample.com/".$product->id,
            "issue" => []
        ]
    ));
    } else {
    // set product property values
    $review->locationId = $data->listingId;
    $review->reviewStatus = $data->status;
    $review->reviewAuthorName = $data->authorName;
    $review->reviewAuthorPhotoUrl = $data->authorPhotoUrl;
    $review->reviewTitle = $data->title;
    $review->reviewContent = $data->content;
    $review->reviewUrl = $data->url;
    $review->reviewSource = $data->source;
    $review->reviewRating = $data->rating;

    if($review->create()){
        return 1;
    }
    else{
        // set response code - 503 service unavailable
        http_response_code(503);
        // tell the user
        echo json_encode(array("issues" => [
            "message" => "Unable to create Location.",
            "status" => "Listing wasn't created.",
            "errorCode" => "503",
            "issue" => "Service is unavailable"
        ]));
    }
}
}

?>
