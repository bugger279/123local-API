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

    //////////////// READ ALL Reviews ////////////////////
    // fetch location Id
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
    //////////////// END OF READ ALL Reviews ////////////////////
    //////////////// CREATE A NEW REVIEW ////////////////////////
    function create(){
        // query to insert record
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO
                    " . $this->reviews_table . "
                SET
                    locationId=:listingId,
                    reviewStatus=:reviewStatus,
                    reviewTimestamp=$date,
                    reviewAuthorName=:reviewAuthorName,
                    reviewAuthorPhotoUrl=:reviewAuthorPhotoUrl,
                    reviewTitle=:reviewTitle,
                    reviewContent=:reviewContent,
                    reviewUrl=:reviewUrl,
                    reviewSource=:reviewSource,
                    reviewRating=:reviewRating";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->listingId=htmlspecialchars(strip_tags($this->listingId));
        $this->reviewStatus=htmlspecialchars(strip_tags($this->reviewStatus));
        $this->reviewAuthorName=htmlspecialchars(strip_tags($this->reviewAuthorName));
        $this->reviewAuthorPhotoUrl=htmlspecialchars(strip_tags($this->reviewAuthorPhotoUrl));
        $this->reviewTitle=htmlspecialchars(strip_tags($this->reviewTitle));
        $this->reviewContent=htmlspecialchars(strip_tags($this->reviewContent));
        $this->reviewUrl=htmlspecialchars(strip_tags($this->reviewUrl));
        $this->reviewSource=htmlspecialchars(strip_tags($this->reviewSource));
        $this->reviewRating=htmlspecialchars(strip_tags($this->reviewRating));

        // bind values
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
    
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    //////////////// CREATE A NEW REVIEW ////////////////////////
}