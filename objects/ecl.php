<?php
class Ecl{

    // database connection and table name
    private $conn;
    private $lists_table = "lists";
    private $section_table = "sections";
    private $menuItems_table = "menu_items";
    private $menuItemsCost_table = "menu_items_cost";
    private $menuItemsCostOptions_table = "menu_items_cost_options";

    private $bioItems_table = "bio_items";
    private $bioItemsCertification_table = "bio_items_certification";
    private $bioItemsEducation_table = "bio_items_education";
    private $bioItemsService_table = "bio_items_service";

    private $serviceItems_table = "service_items";
    private $serviceItemsCost_table = "service_items_cost";
    private $serviceItemsCostOptions_table = "service_items_cost_options";
    private $serviceItemsPhotos_table = "service_items_photos";

    private $eventsItems_table = "events_items";
    private $eventsItemsPhotos_table = "events_items_photos";
    // Locations object properties
    public $listsId;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    //  Read lists
    function fetchListsById($listsId){
        $query = "SELECT * FROM " . $this->lists_table . " r WHERE r.listsId = $listsId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function fetchSectionOfList($listsId) {
        $query = "SELECT * FROM " . $this->section_table . " r WHERE r.listsId = $listsId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    // For Menu Items
    function fetchMenuItemsOfSection($sectionId) {
        $query = "SELECT * FROM " . $this->menuItems_table . " r WHERE r.sectionId = $sectionId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function fetchCostsOfMenuItems($menuItemsId) {
        $query = "SELECT * FROM " . $this->menuItemsCost_table . " r WHERE r.menuItemsId = $menuItemsId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function fetchMenuOptionsOfCosts($menuItemsCostId) {
        $query = "SELECT * FROM " . $this->menuItemsCostOptions_table . " r WHERE r.menuItemsCostId = $menuItemsCostId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    // For Bio Items
    function fetchBioItemsOfSection($sectionId) {
        $query = "SELECT * FROM " . $this->bioItems_table . " r WHERE r.sectionId = $sectionId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function fetchCertificationsOfBioItems($bioItemsId) {
        $query = "SELECT * FROM " . $this->bioItemsCertification_table . " r WHERE r.bioItemsId = $bioItemsId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function fetchEducationsOfBioItems($bioItemsId) {
        $query = "SELECT * FROM " . $this->bioItemsEducation_table . " r WHERE r.bioItemsId = $bioItemsId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function fetchServicesOfBioItems($bioItemsId) {
        $query = "SELECT * FROM " . $this->bioItemsService_table . " r WHERE r.bioItemsId = $bioItemsId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    // For Products Items
    function fetchProductItemsOfSection($sectionId) {
        $query = "SELECT * FROM " . $this->serviceItems_table . " r WHERE r.sectionId = $sectionId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function fetchCostsOfProductItems($serviceItemsId) {
        $query = "SELECT * FROM " . $this->serviceItemsCost_table . " r WHERE r.serviceItemsId = $serviceItemsId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function fetchProductOptionsOfCosts($serviceItemsCostId) {
        $query = "SELECT * FROM " . $this->serviceItemsCostOptions_table . " r WHERE r.serviceItemsCostId = $serviceItemsCostId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function fetchPhotosOfProductItems($serviceItemsId) {
        $query = "SELECT * FROM " . $this->serviceItemsPhotos_table . " r WHERE r.serviceItemsId = $serviceItemsId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    // For Events Items
    function fetchEventsItemsOfSection($sectionId) {
        $query = "SELECT * FROM " . $this->eventsItems_table . " r WHERE r.sectionId = $sectionId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function fetchPhotosOfEventsItems($serviceItemsId) {
        $query = "SELECT * FROM " . $this->eventsItemsPhotos_table . " r WHERE r.serviceItemsId = $serviceItemsId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // END OF lists

    //  CREATE A NEW REVIEW 
    function createSection(){
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO
                    " . $this->section_table . "
                SET
                    listsId=:listsId,
                    sectionName=:sectionName,
                    sectionDescription=:sectionDescription";

        $stmt = $this->conn->prepare($query);
        $this->listsId=htmlspecialchars(strip_tags($this->listsId));
        $this->sectionName=htmlspecialchars(strip_tags($this->sectionName));
        $this->sectionDescription=htmlspecialchars(strip_tags($this->sectionDescription));

        $stmt->bindParam(":listsId", $this->listsId);
        $stmt->bindParam(":sectionName", $this->sectionName);
        $stmt->bindParam(":sectionDescription", $this->sectionDescription);

        if($stmt->execute()){
            $lastId = $this->conn->lastInsertId();
            http_response_code(201);
            echo json_encode(array(
                "message" => "ECL Created Successfully!",
                "sectionId" => $lastId
            ));
        } else {
            $errors = $stmt->errorInfo();
            print_r($errors);
            http_response_code(503);
            echo json_encode(array("issues" => [
                "message" => "Unable to create ECL.",
                "status" => "ECL wasn't created.",
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
                $deleteComments = "DELETE FROM " . $this->comments_table . " WHERE reviewId = $this->id";
                $deleteCommentStmt = $this->conn->prepare($deleteComments);
                if($deleteCommentStmt->execute()) {   
                    http_response_code(200);
                    echo json_encode(array(
                        "message" => "Review and it's related Comments Deleted Successfully",
                        "id" => $this->id
                    ));
                }
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