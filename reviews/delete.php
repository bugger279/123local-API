<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../config/database.php';
include_once '../objects/review.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$review = new Review($db);

// get product id
$data = json_decode(file_get_contents("php://input"));
$id=isset($_GET["id"]) ? $_GET["id"] : "";
$review->id = $id;

if (empty($review->id)){
    http_response_code(400);
    echo json_encode(array("issues" => [
        "description" => "Malformed request sent.",
        "errorCode" => "400",
        "issue" => "No id Provided"
        ]));
        die();
} else {
    $review->deleteReview();
}
// if($review->deleteReview()){
//     http_response_code(200);
//     echo json_encode(array("message" => "Location deleted."));
// }

?>