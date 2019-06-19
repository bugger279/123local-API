<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/database.php';
include_once '../objects/review.php';

$database = new Database();
$db = $database->getConnection();

$review = new Review($db);

$data = json_decode(file_get_contents("php://input"));
$id=isset($_GET["id"]) ? $_GET["id"] : "";
// set location id to be updated
$review->id = $id;
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

$queryForId = "SELECT * FROM locations WHERE locationId = $data->listingId";
$stmt = $database->conn->prepare($queryForId);
$stmt->execute();
$count = $stmt->rowCount();

if ($count <= 0) {
    http_response_code(404);
    echo json_encode(array(
        "issues" => [
            "description" => "No Such listingId",
            "errorCode" => "404",
            "issue" => "No Review Updated."
        ]
    ));
    die();
}

if (empty($review->id)){
    http_response_code(400);
    echo json_encode(array(
        "description" => [
            "message" => "Yext sent a malformed request..",
            "issue" => "No id Provided"
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
            "issue" => "No Review Updated."
        ]
    ));
    die();
}

$queryForId = "SELECT * FROM reviews WHERE reviewId=$review->id";
$stmt = $database->conn->prepare($queryForId);
$stmt->execute();
$count = $stmt->rowCount();

if ($count > 0) {
    $review->updateReview();
    http_response_code(200);
    echo json_encode(array(
        "description" => [
            "message" => "Review was updated.",
            "status" => "$review->reviewStatus",
            "id" => "$review->id"
        ]
    ));
} else {
    http_response_code(404);
    echo json_encode(array(
        "issues" => [
            "description" => "No Such Review",
            "errorCode" => "404",
            "issue" => "Nothing to Update."
        ]
    ));
    die();
}

?>