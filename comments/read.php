<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/comment.php';
 
$database = new Database();
$db = $database->getConnection();
$comment = new Comment($db);

$id=isset($_GET["id"]) ? $_GET["id"] : "";
$comment->id = $id;

if (empty($comment->id)){
    http_response_code(400);
    echo json_encode(array("issues" => [
        "description" => "Malformed request sent.",
        "errorCode" => "400",
        "issue" => "No id Provided"
        ]));
    die();
}

$commentStmt = $comment->readComments($comment->id);
$commentCount = $commentStmt->rowCount();
$comment_arr=array();
if ($commentCount > 0) {
    while ($commentRow = $commentStmt->fetch(PDO::FETCH_ASSOC)){
        extract($commentRow);
        $comment_arr = [
            "commentID" => $commentId,
            "timestamp" => $commentTimestamp,
            "authorName" => $commentAuthorName,
            "content" => $commentContent
        ];
    }
    http_response_code(200);
    echo json_encode($comment_arr);
}
// No Comments Found
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No comments found.")
    );
}