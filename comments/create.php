<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
include_once '../objects/comment.php';

$database = new Database();
$db = $database->getConnection();
$comment = new Comment($db);
$data = json_decode(file_get_contents("php://input"));

$field_data = array( "reviewId" => $data->reviewId, "authorName" => $data->authorName, "authorPhotoUrl" => $data->authorPhotoUrl, "content" => $data->content);
foreach($field_data as $key => $val) {
    if (empty($val)) {
        // set response code - 400 bad request
        http_response_code(400);
        // tell the user
        echo json_encode(array("issues" => [
        "description" => "Unable to create comment. Data is incomplete.",
        "errorCode" => "400",
        "issue" => "$key is empty"
        ]));
        die();
    }
}

$queryForId = "SELECT * FROM reviews WHERE reviewId = $data->reviewId";
$stmt = $database->conn->prepare($queryForId);
$stmt->execute();
$count = $stmt->rowCount();

if ($count <= 0) {
    http_response_code(404);
    echo json_encode(array(
        "issues" => [
            "description" => "No reviews with id=$data->reviewId found",
            "errorCode" => "404",
            "issue" => "No comment created."
        ]
    ));
    die();
}

// make sure data is not empty
if(
    !empty($data->reviewId) &&
    !empty($data->authorName) &&
    !empty($data->authorPhotoUrl) &&
    !empty($data->content)
){
    // set product property values
    $comment->reviewId = $data->reviewId;
    $comment->commentAuthorName = $data->authorName;
    $comment->commentAuthorPhotoUrl = $data->authorPhotoUrl;
    $comment->commentContent = $data->content;
    $comment->commentTimestamp = date('Y-m-d H:i:s');

    // Execute Create Review
    $comment->createComment();
}

?>
