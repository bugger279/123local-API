<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/database.php';
include_once '../objects/comment.php';

$database = new Database();
$db = $database->getConnection();

$comment = new Comment($db);

$data = json_decode(file_get_contents("php://input"));
$id=isset($_GET["id"]) ? $_GET["id"] : "";
// set location id to be updated
$comment->id = $id;
// set product property values
$comment->reviewId = $data->reviewId;
$comment->commentAuthorName = $data->authorName;
$comment->commentAuthorPhotoUrl = $data->authorPhotoUrl;
$comment->commentContent = $data->content;

$queryForId = "SELECT * FROM reviews WHERE reviewId = $data->reviewId";
$stmt = $database->conn->prepare($queryForId);
$stmt->execute();
$count = $stmt->rowCount();

if ($count <= 0) {
    http_response_code(404);
    echo json_encode(array(
        "issues" => [
            "description" => "No Such reviewId",
            "errorCode" => "404",
            "issue" => "Comment not updated."
        ]
    ));
    die();
}

if (empty($comment->id)){
    http_response_code(400);
    echo json_encode(array(
        "description" => [
            "message" => "Yext sent a malformed request..",
            "issue" => "No id Provided"
        ]
    ));
    die();
}

$queryForId = "SELECT * FROM comments WHERE commentId=$comment->id";
$stmt = $database->conn->prepare($queryForId);
$stmt->execute();
$count = $stmt->rowCount();

if ($count > 0) {
    $comment->updateComment();
    http_response_code(200);
    echo json_encode(array(
        "description" => [
            "message" => "Comment was updated.",
            "id" => "$comment->id"
        ]
    ));
} else {
    http_response_code(404);
    echo json_encode(array(
        "issues" => [
            "description" => "No Such Comment",
            "errorCode" => "404",
            "issue" => "Nothing to Update."
        ]
    ));
    die();
}

?>