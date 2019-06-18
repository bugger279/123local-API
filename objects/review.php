<?php
class Review{

    // database connection and table name
    private $conn;
    private $location_table = "locations";
    private $reviews_table = "reviews";
    private $comments_table = "comments";
    // Locations object properties
    public $locationId;
    // Reviews Object
    public $reviewId;
    public $reviewStatus;
    public $reviewTimestamp;
    public $reviewAuthorName;
    public $reviewAuthorPhotoUrl;
    public $reviewTitle;
    public $reviewContent;
    public $reviewUrl;
    public $reviewSource;
    public $reviewRating;
    public $reviewGenerated;
    public $reviewFlagReason;
    // Comments Object
    public $commentId;
    public $commentTimestamp;
    public $commentAuthorName;
    public $commentContent;
    public $commentAuthorPhotoUrl;
    public $commentOwnerResponse;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    //  READ ALL Reviews
    function fetchLocation() {
        $query = "SELECT locationId FROM " . $this->location_table . " f";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readReviews($locationId){
        $query = "SELECT * FROM " . $this->reviews_table . " r WHERE r.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function reviewsAvg($locationId){
        $query = "SELECT AVG(reviewRating) as avgTotal FROM " . $this->reviews_table . " r WHERE r.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function reviewsMax($locationId){
        $query = "SELECT MAX(reviewRating) as max FROM " . $this->reviews_table . " r WHERE r.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readComments($reviewId){
        $query = "SELECT * FROM " . $this->comments_table . " c WHERE c.reviewId = $reviewId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    // END OF READ ALL Reviews 

    //  CREATE A NEW REVIEW 
    function createReview(){
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO
                    " . $this->reviews_table . "
                SET
                    locationId=:listingId,
                    reviewStatus=:reviewStatus,
                    reviewAuthorName=:reviewAuthorName,
                    reviewAuthorPhotoUrl=:reviewAuthorPhotoUrl,
                    reviewTitle=:reviewTitle,
                    reviewContent=:reviewContent,
                    reviewUrl=:reviewUrl,
                    reviewSource=:reviewSource,
                    reviewRating=:reviewRating,
                    reviewTimestamp=:reviewTimestamp";

        $stmt = $this->conn->prepare($query);
        $this->listingId=htmlspecialchars(strip_tags($this->listingId));
        $this->reviewStatus=htmlspecialchars(strip_tags($this->reviewStatus));
        $this->reviewAuthorName=htmlspecialchars(strip_tags($this->reviewAuthorName));
        $this->reviewAuthorPhotoUrl=htmlspecialchars(strip_tags($this->reviewAuthorPhotoUrl));
        $this->reviewTitle=htmlspecialchars(strip_tags($this->reviewTitle));
        $this->reviewContent=htmlspecialchars(strip_tags($this->reviewContent));
        $this->reviewUrl=htmlspecialchars(strip_tags($this->reviewUrl));
        $this->reviewSource=htmlspecialchars(strip_tags($this->reviewSource));
        $this->reviewRating=htmlspecialchars(strip_tags($this->reviewRating));
        $this->reviewTimestamp=htmlspecialchars(strip_tags($this->reviewTimestamp));

        $stmt->bindParam(":listingId", $this->listingId);
        $stmt->bindParam(":reviewStatus", $this->reviewStatus);
        $stmt->bindParam(":reviewAuthorName", $this->reviewAuthorName);
        $stmt->bindParam(":reviewAuthorPhotoUrl", $this->reviewAuthorPhotoUrl);
        $stmt->bindParam(":reviewTitle", $this->reviewTitle);
        $stmt->bindParam(":reviewContent", $this->reviewContent);
        $stmt->bindParam(":reviewUrl", $this->reviewUrl);
        $stmt->bindParam(":reviewSource", $this->reviewSource);
        $stmt->bindParam(":reviewRating", $this->reviewRating);
        $stmt->bindParam(":reviewRating", $this->reviewRating);
        $stmt->bindParam(":reviewTimestamp", $this->reviewTimestamp);

        if($stmt->execute()){
            $lastId = $this->conn->lastInsertId();
            http_response_code(201);
            echo json_encode(array(
                "message" => "Review Created Successfully!",
                "reviewId" => $lastId,
                "status" => $this->reviewStatus,
            ));
        } else {
            http_response_code(503);
            echo json_encode(array("issues" => [
                "message" => "Unable to create Review.",
                "status" => "Review wasn't created.",
                "errorCode" => "503",
                "issue" => "Service is unavailable"
            ]));
        }
    }
    // END OF CREATE A NEW REVIEW
// DELETE THE EXISTING Review
function deleteReview(){
    $query = "DELETE FROM " . $this->reviews_table . " WHERE reviewId = $this->id";
    $stmt = $this->conn->prepare($query);
    $this->id=htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(":reviewId", $this->id);
    if($stmt->execute()) {
        $count = $stmt->rowCount();
    }
        if ($count > 0) {
            http_response_code(200);
            echo json_encode(array(
                "message" => "Review Deleted Successfully",
                "id" => $this->id
            ));
        } else {
            http_response_code(404);
            echo json_encode(array("issue" => "The requested review does not exist on your site."));
        }
    return false;
}
// END OF DELETE THE EXISTING Review

//////////////// UPDATE THE EXISTING LISTINGS ////////////////////
// update the product
function updateReview(){
    // update query
    $query = "UPDATE
                " . $this->reviews_table . "
            SET
                locationId=:listingId,
                reviewStatus=:reviewStatus,
                reviewAuthorName=:reviewAuthorName,
                reviewAuthorPhotoUrl=:reviewAuthorPhotoUrl,
                reviewTitle=:reviewTitle,
                reviewContent=:reviewContent,
                reviewUrl=:reviewUrl,
                reviewSource=:reviewSource,
                reviewRating=:reviewRating
            WHERE
                reviewId=:id";

    // prepare query statement
    $stmt = $this->conn->prepare($query);
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->listingId=htmlspecialchars(strip_tags($this->listingId));
    $this->reviewStatus=htmlspecialchars(strip_tags($this->reviewStatus));
    $this->reviewAuthorName=htmlspecialchars(strip_tags($this->reviewAuthorName));
    $this->reviewAuthorPhotoUrl=htmlspecialchars(strip_tags($this->reviewAuthorPhotoUrl));
    $this->reviewTitle=htmlspecialchars(strip_tags($this->reviewTitle));
    $this->reviewContent=htmlspecialchars(strip_tags($this->reviewContent));
    $this->reviewUrl=htmlspecialchars(strip_tags($this->reviewUrl));
    $this->reviewSource=htmlspecialchars(strip_tags($this->reviewSource));
    $this->reviewRating=htmlspecialchars(strip_tags($this->reviewRating));

    // bind new values
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(":listingId", $this->listingId);
    $stmt->bindParam(":reviewStatus", $this->reviewStatus);
    $stmt->bindParam(":reviewAuthorName", $this->reviewAuthorName);
    $stmt->bindParam(":reviewAuthorPhotoUrl", $this->reviewAuthorPhotoUrl);
    $stmt->bindParam(":reviewTitle", $this->reviewTitle);
    $stmt->bindParam(":reviewContent", $this->reviewContent);
    $stmt->bindParam(":reviewUrl", $this->reviewUrl);
    $stmt->bindParam(":reviewSource", $this->reviewSource);
    $stmt->bindParam(":reviewRating", $this->reviewRating);
    $stmt->bindParam(":reviewRating", $this->reviewRating);

    // execute the query
    if ($stmt->execute()) {
        return true;
    }
    $count = $stmt->rowCount();
    // print_r($count);
        if ($count > 0) {
            return 1;
        }
    return false;
}
//////////////// END OF UPDATE THE EXISTING LISTINGS ////////////////////

}