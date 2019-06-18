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
$data = json_decode(file_get_contents("php://input"));

$field_data = array( "listingId" => $data->listingId, "status" => $data->status, "authorName" => $data->authorName, "authorPhotoUrl" => $data->authorPhotoUrl, "title" => $data->title, "content" => $data->content, "url" => $data->url, "rating" => $data->rating);
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

$queryForId = "SELECT * FROM locations WHERE locationId = $data->listingId";
$stmt = $database->conn->prepare($queryForId);
$stmt->execute();
$count = $stmt->rowCount();

if ($count <= 0) {
    http_response_code(404);
    echo json_encode(array(
        "issues" => [
            "description" => "No Such Location",
            "errorCode" => "404",
            "issue" => "No Review created."
        ]
    ));
    die();
}

if ($data->rating > 5) {
    http_response_code(503);
    echo json_encode(array(
        "issues" => [
            "description" => "Ratings can't be greater than 5",
            "errorCode" => "503",
            "issue" => "No Review created."
        ]
    ));
    die();
}

// make sure data is not empty
if(
    !empty($data->listingId) &&
    !empty($data->status) &&
    !empty($data->authorName) &&
    !empty($data->authorPhotoUrl) &&
    !empty($data->content) &&
    !empty($data->source) &&
    !empty($data->title) &&
    !empty($data->url) &&
    !empty($data->rating)
){
    // set product property values
    $review->listingId = $data->listingId;
    $review->reviewStatus = $data->status;
    $review->reviewAuthorName = $data->authorName;
    $review->reviewAuthorPhotoUrl = $data->authorPhotoUrl;
    $review->reviewTitle = $data->title;
    $review->reviewContent = $data->content;
    $review->reviewUrl = $data->url;
    $review->reviewSource = $data->source;
    $review->reviewRating = $data->rating;
    $review->reviewTimestamp = date('Y-m-d H:i:s');

    // Execute Create Review
    $review->createReview();
}

?>
