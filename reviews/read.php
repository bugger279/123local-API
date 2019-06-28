<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/review.php';
 
$database = new Database();
$db = $database->getConnection();
$review = new Review($db);

$stmt = $review->fetchLocation();
$num = $stmt->rowCount();
$avgRating = 0;
$maxRating = 0;

if($num>0){
    $reviews_arr=array();
    $reviews_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        // Review Max
        $reviewMaxStmt = $review->reviewsMax($locationId);
        $reviewMaxCount = $reviewMaxStmt->rowCount();

        if ($reviewMaxCount > 0) {
            while ($reviewMaxRow = $reviewMaxStmt->fetch(PDO::FETCH_ASSOC)){
                $maxRating = $reviewMaxRow['max'];
            }
        }
        // Review Average
        $reviewAvgStmt = $review->reviewsAvg($locationId);
        $reviewAvgCount = $reviewAvgStmt->rowCount();

        if ($reviewAvgCount > 0) {
            while ($reviewAvgRow = $reviewAvgStmt->fetch(PDO::FETCH_ASSOC)){
                $avgRating = round($reviewAvgRow['avgTotal'],2);
            }
        }

        // Reviews
        $reviewStmt = $review->readReviews($locationId);
        $reviewCount = $reviewStmt->rowCount();
        $review_arr=array();
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

                $review_arr[] = [
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
        }

        // main Array
        $review_item=array(
            "listingID" => $locationId,
            "total" => $reviewCount,
            "rating" => $avgRating,
            "maxRating" => $maxRating,
            "reviews" => $review_arr
        );
        array_push($reviews_arr["records"], $review_item);
    }
    http_response_code(200);
    echo json_encode($reviews_arr);
}

// No Locations Found
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No locations found.")
    );
}