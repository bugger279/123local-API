<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/ecl.php';
 
$database = new Database();
$db = $database->getConnection();
$ecl = new Ecl($db);

$stmt = $ecl->fetchLocation();
$num = $stmt->rowCount();
$avgRating = 0;
$maxRating = 0;

if($num>0){
    $ecls_arr=array();
    $ecls_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        // Review Max
        $eclMaxStmt = $ecl->reviewsMax($locationId);
        $eclMaxCount = $eclMaxStmt->rowCount();

        if ($eclMaxCount > 0) {
            while ($eclMaxRow = $eclMaxStmt->fetch(PDO::FETCH_ASSOC)){
                $maxRating = $eclMaxRow['max'];
            }
        }
        // Review Average
        $eclAvgStmt = $ecl->reviewsAvg($locationId);
        $eclAvgCount = $eclAvgStmt->rowCount();

        if ($eclAvgCount > 0) {
            while ($eclAvgRow = $eclAvgStmt->fetch(PDO::FETCH_ASSOC)){
                $avgRating = round($eclAvgRow['avgTotal'],2);
            }
        }

        // Reviews
        $eclStmt = $ecl->readReviews($locationId);
        $eclCount = $eclStmt->rowCount();
        $ecl_arr=array();
        if ($eclCount > 0) {
            while ($eclRow = $eclStmt->fetch(PDO::FETCH_ASSOC)){
                extract($eclRow);
                $commentStmt = $ecl->readComments($eclId);
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

                $ecl_arr[] = [
                    "reviewId" => $eclId,
                    "status" => $eclStatus,
                    "timestamp" => $eclTimestamp,
                    "authorName" => $eclAuthorName,
                    "authorPhotoUrl" => $eclAuthorPhotoUrl,
                    "content" => $eclContent,
                    "sources" => $eclSource,
                    "title" => $eclTitle,
                    "url" => $eclUrl,
                    "maxRating" => 5,
                    "rating" => $eclRating,
                    "comments" => $comment_arr
                ];
            }
        }

        // main Array
        $ecl_item=array(
            "listingID" => $locationId,
            "total" => $eclCount,
            "rating" => $avgRating,
            "maxRating" => $maxRating,
            "reviews" => $ecl_arr
        );
        array_push($ecls_arr["records"], $ecl_item);
    }
    http_response_code(200);
    echo json_encode($ecls_arr);
}

// No Locations Found
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No locations found.")
    );
}