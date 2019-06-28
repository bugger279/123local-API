<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/review.php';
 
$database = new Database();
$db = $database->getConnection();
$review = new Review($db);

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
}

// Reviews
$reviewStmt = $review->reviewDetail($review->id);
$reviewCount = $reviewStmt->rowCount();

if ($reviewCount > 0) {
    while ($reviewRow = $reviewStmt->fetch(PDO::FETCH_ASSOC)){
        extract($reviewRow);
        $commentStmt = $review->readComments($reviewId);
        $commentCount = $commentStmt->rowCount();
        $comment_arr=array();
        if ($commentCount > 0) {
            while ($commentRow = $commentStmt->fetch(PDO::FETCH_ASSOC)){
                extract($commentRow);
                $comment_arr[] = [
                    "commentID" => $commentId,
                    "timestamp" => $commentTimestamp,
                    "authorName" => $commentAuthorName,
                    "content" => $commentContent
                ];
            }
        }

        $review_arr = [
            "reviewId" => $reviewId,
            "status" => $reviewStatus,
            "timestamp" => $reviewTimestamp,
            "authorName" => $reviewAuthorName,
            "authorPhotoUrl" => $reviewAuthorPhotoUrl,
            "content" => $reviewContent,
            "sources" => $reviewSource,
            "title" => $reviewTitle,
            "url" => $reviewUrl,
            "maxRating" => 5,
            "rating" => $reviewRating,
            "comments" => $comment_arr
        ];
    }
    http_response_code(200);
    echo json_encode($review_arr);
}

// No Reviews Found
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No Reviews found.")
    );
}