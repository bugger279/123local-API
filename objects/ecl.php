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
        $query = "SELECT * FROM " . $this->eventsItemsPhotos_table . " r WHERE r.eventsItemsId = $serviceItemsId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // END OF lists

    //  CREATE A NEW Section 
    function createSection(){
        $listsType = $this->listsType;

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
            $sectionId = $this->conn->lastInsertId();            
            // MENU TYPE
            if ($listsType === "MENUS" || $listsType === "MENUS") {
                // Inserting data in Menuitems table
                foreach ($this->items as $item) {
                    $insertQuery = "INSERT INTO
                        " . $this->menuItems_table . "
                    SET
                        sectionId= $sectionId,
                        menuItemsName=:menuItemsName,
                        menuItemsDescription=:menuItemsDescription,
                        menuItemsPhotoUrl=:menuItemsPhotoUrl,
                        menuItemsPhotoHeight=:menuItemsPhotoHeight,
                        menuItemsPhotoWidth=:menuItemsPhotoWidth,
                        menuItemsCaloriesType=:menuItemsCaloriesType,
                        menuItemsCalories=:menuItemsCalories,
                        menuItemsRangeTo=:menuItemsRangeTo";

                        // prepare query
                        $insertStmt = $this->conn->prepare($insertQuery);
                        // sanitize
                        $menuItemsName=htmlspecialchars(strip_tags($item->name));
                        $menuItemsDescription=htmlspecialchars(strip_tags($item->description));
                        $menuItemsPhotoUrl=htmlspecialchars(strip_tags($item->photo->url));
                        $menuItemsPhotoHeight=htmlspecialchars(strip_tags($item->photo->height));
                        $menuItemsPhotoWidth=htmlspecialchars(strip_tags($item->photo->width));
                        $menuItemsCaloriesType=htmlspecialchars(strip_tags($item->calories->type));
                        $menuItemsCalories=htmlspecialchars(strip_tags($item->calories->calorie));
                        $menuItemsRangeTo=htmlspecialchars(strip_tags($item->calories->rangeTo));
                        // bind values
                        $insertStmt->bindParam(":menuItemsName", $menuItemsName);
                        $insertStmt->bindParam(":menuItemsDescription", $menuItemsDescription);
                        $insertStmt->bindParam(":menuItemsPhotoUrl", $menuItemsPhotoUrl);
                        $insertStmt->bindParam(":menuItemsPhotoHeight", $menuItemsPhotoHeight);
                        $insertStmt->bindParam(":menuItemsPhotoWidth", $menuItemsPhotoWidth);
                        $insertStmt->bindParam(":menuItemsCaloriesType", $menuItemsCaloriesType);
                        $insertStmt->bindParam(":menuItemsCalories", $menuItemsCalories);
                        $insertStmt->bindParam(":menuItemsRangeTo", $menuItemsRangeTo);
                        if($insertStmt->execute()){
                            $menuItemId = $this->conn->lastInsertId();

                            foreach ($item->costs as $cost) {
                                $insertQuery = "INSERT INTO
                                    " . $this->menuItemsCost_table . "
                                SET
                                    menuItemsId= $menuItemId,
                                    sectionId= $sectionId,
                                    menuItemsCostType=:menuItemsCostType,
                                    menuItemsCostPrice=:menuItemsCostPrice,
                                    menuItemsCostUnit=:menuItemsCostUnit,
                                    menuItemsCostRangeTo=:menuItemsCostRangeTo,
                                    menuItemsCostOther=:menuItemsCostOther";

                            // prepare query
                            $insertStmt = $this->conn->prepare($insertQuery);
                            // sanitize
                            $menuItemsCostType=htmlspecialchars(strip_tags($cost->type));
                            $menuItemsCostPrice=htmlspecialchars(strip_tags($cost->price));
                            $menuItemsCostUnit=htmlspecialchars(strip_tags($cost->unit));
                            $menuItemsCostRangeTo=htmlspecialchars(strip_tags($cost->rangeTo));
                            $menuItemsCostOther=htmlspecialchars(strip_tags($cost->other));
                            // bind values
                            $insertStmt->bindParam(":menuItemsCostType", $menuItemsCostType);
                            $insertStmt->bindParam(":menuItemsCostPrice", $menuItemsCostPrice);
                            $insertStmt->bindParam(":menuItemsCostUnit", $menuItemsCostUnit);
                            $insertStmt->bindParam(":menuItemsCostRangeTo", $menuItemsCostRangeTo);
                            $insertStmt->bindParam(":menuItemsCostOther", $menuItemsCostOther);

                                if($insertStmt->execute()){
                                    $menuItemsCostId = $this->conn->lastInsertId();

                                    foreach ($cost->options as $option) {
                                        $insertQuery = "INSERT INTO
                                            " . $this->menuItemsCostOptions_table . "
                                        SET
                                            menuItemsCostId= $menuItemsCostId,
                                            sectionId= $sectionId,
                                            costOptionName=:costOptionName,
                                            costOptionPrice=:costOptionPrice,
                                            costOptionCalorie=:costOptionCalorie";

                                        // prepare query
                                        $insertStmt = $this->conn->prepare($insertQuery);
                                        // sanitize
                                        $costOptionName=htmlspecialchars(strip_tags($option->name));
                                        $costOptionPrice=htmlspecialchars(strip_tags($option->price));
                                        $costOptionCalorie=htmlspecialchars(strip_tags($option->calorie));
                                        // bind values
                                        $insertStmt->bindParam(":costOptionName", $costOptionName);
                                        $insertStmt->bindParam(":costOptionPrice", $costOptionPrice);
                                        $insertStmt->bindParam(":costOptionCalorie", $costOptionCalorie);
                                        $insertStmt->execute();
                                    }
                                }
                            }
                        }
                    }
                // End of insert MenuItems Code...
            }
            // End of insert ProductItems Code...
            // PRODUCT TYPE
            if ($listsType === "PRODUCTS" || $listsType === "PRODUCT") {
                // Inserting data in Menuitems table
                foreach ($this->items as $item) {
                    $insertQuery = "INSERT INTO
                        " . $this->serviceItems_table . "
                    SET
                        sectionId= $sectionId,
                        serviceItemsName=:serviceItemsName,
                        serviceItemsDescription=:serviceItemsDescription,
                        serviceItemsVideoUrl=:serviceItemsVideoUrl,
                        serviceItemsUrl=:serviceItemsUrl";

                        // prepare query
                        $insertStmt = $this->conn->prepare($insertQuery);
                        // sanitize
                        $serviceItemsName=htmlspecialchars(strip_tags($item->name));
                        $serviceItemsDescription=htmlspecialchars(strip_tags($item->description));
                        $serviceItemsVideoUrl=htmlspecialchars(strip_tags($item->video));
                        $serviceItemsUrl=htmlspecialchars(strip_tags($item->url));
                        // bind values
                        $insertStmt->bindParam(":serviceItemsName", $serviceItemsName);
                        $insertStmt->bindParam(":serviceItemsDescription", $serviceItemsDescription);
                        $insertStmt->bindParam(":serviceItemsVideoUrl", $serviceItemsVideoUrl);
                        $insertStmt->bindParam(":serviceItemsUrl", $serviceItemsUrl);
                        if($insertStmt->execute()){
                            $serviceItemsId = $this->conn->lastInsertId();

                            foreach ($item->photos as $photo) {
                                $insertPhotosQuery = "INSERT INTO
                                    " . $this->serviceItemsPhotos_table . "
                                SET
                                    serviceItemsId= $serviceItemsId,
                                    sectionId= $sectionId,
                                    serviceItemsPhotoUrl=:serviceItemsPhotoUrl,
                                    serviceItemsPhotoHeight=:serviceItemsPhotoHeight,
                                    serviceItemsPhotoWidth=:serviceItemsPhotoWidth";

                            // prepare query
                            $insertPhotoStmt = $this->conn->prepare($insertPhotosQuery);
                            // sanitize
                            $serviceItemsPhotoUrl=htmlspecialchars(strip_tags($photo->url));
                            $serviceItemsPhotoHeight=htmlspecialchars(strip_tags($photo->height));
                            $serviceItemsPhotoWidth=htmlspecialchars(strip_tags($photo->width));
                            // bind values
                            $insertPhotoStmt->bindParam(":serviceItemsPhotoUrl", $serviceItemsPhotoUrl);
                            $insertPhotoStmt->bindParam(":serviceItemsPhotoHeight", $serviceItemsPhotoHeight);
                            $insertPhotoStmt->bindParam(":serviceItemsPhotoWidth", $serviceItemsPhotoWidth);
                            $insertPhotoStmt->execute();
                            }

                            foreach ($item->costs as $cost) {
                                $insertQuery = "INSERT INTO
                                    " . $this->serviceItemsCost_table . "
                                SET
                                    serviceItemsId= $serviceItemsId,
                                    sectionId= $sectionId,
                                    serviceItemsCostType=:serviceItemsCostType,
                                    serviceItemsCostPrice=:serviceItemsCostPrice,
                                    serviceItemsCostUnit=:serviceItemsCostUnit,
                                    serviceItemsCostRangeTo=:serviceItemsCostRangeTo,
                                    serviceItemsCostOther=:serviceItemsCostOther";

                            // prepare query
                            $insertStmt = $this->conn->prepare($insertQuery);
                            // sanitize
                            $serviceItemsCostType=htmlspecialchars(strip_tags($cost->type));
                            $serviceItemsCostPrice=htmlspecialchars(strip_tags($cost->price));
                            $serviceItemsCostUnit=htmlspecialchars(strip_tags($cost->unit));
                            $serviceItemsCostRangeTo=htmlspecialchars(strip_tags($cost->rangeTo));
                            $serviceItemsCostOther=htmlspecialchars(strip_tags($cost->other));
                            // bind values
                            $insertStmt->bindParam(":serviceItemsCostType", $serviceItemsCostType);
                            $insertStmt->bindParam(":serviceItemsCostPrice", $serviceItemsCostPrice);
                            $insertStmt->bindParam(":serviceItemsCostUnit", $serviceItemsCostUnit);
                            $insertStmt->bindParam(":serviceItemsCostRangeTo", $serviceItemsCostRangeTo);
                            $insertStmt->bindParam(":serviceItemsCostOther", $serviceItemsCostOther);

                                if($insertStmt->execute()){
                                    $serviceItemsCostId = $this->conn->lastInsertId();

                                    foreach ($cost->options as $option) {
                                        $insertQuery = "INSERT INTO
                                            " . $this->serviceItemsCostOptions_table . "
                                        SET
                                            serviceItemsCostId= $serviceItemsCostId,
                                            sectionId= $sectionId,
                                            costOptionName=:costOptionName,
                                            costOptionPrice=:costOptionPrice,
                                            costOptionCalorie=:costOptionCalorie";

                                        // prepare query
                                        $insertStmt = $this->conn->prepare($insertQuery);
                                        // sanitize
                                        $costOptionName=htmlspecialchars(strip_tags($option->name));
                                        $costOptionPrice=htmlspecialchars(strip_tags($option->price));
                                        $costOptionCalorie=htmlspecialchars(strip_tags($option->calorie));
                                        // bind values
                                        $insertStmt->bindParam(":costOptionName", $costOptionName);
                                        $insertStmt->bindParam(":costOptionPrice", $costOptionPrice);
                                        $insertStmt->bindParam(":costOptionCalorie", $costOptionCalorie);
                                        $insertStmt->execute();
                                    }
                                }
                            }
                        }
                    }

            }
            // End of insert ProductItems Code...
            // EVENTS TYPE
            if ($listsType === "EVENTS" || $listsType === "EVENT") {
                // Inserting data in Menuitems table
                foreach ($this->items as $item) {
                    $insertQuery = "INSERT INTO
                        " . $this->eventsItems_table . "
                    SET
                        sectionId= $sectionId,
                        eventsItemsName=:eventsItemsName,
                        eventsItemsType=:eventsItemsType,
                        eventItemsStarts=:eventItemsStarts,
                        eventItemsEnds=:eventItemsEnds,
                        eventItemsDescription=:eventItemsDescription,
                        eventItemsVideo=:eventItemsVideo,
                        eventItemsUrl=:eventItemsUrl";

                        // prepare query
                        $insertStmt = $this->conn->prepare($insertQuery);
                        // sanitize
                        $eventsItemsName=htmlspecialchars(strip_tags($item->name));
                        $eventsItemsType=htmlspecialchars(strip_tags($item->type));
                        $eventItemsStarts=htmlspecialchars(strip_tags($item->starts));
                        $eventItemsEnds=htmlspecialchars(strip_tags($item->ends));
                        $eventItemsDescription=htmlspecialchars(strip_tags($item->description));
                        $eventItemsVideo=htmlspecialchars(strip_tags($item->video));
                        $eventItemsUrl=htmlspecialchars(strip_tags($item->url));
                        // bind values
                        $insertStmt->bindParam(":eventsItemsName", $eventsItemsName);
                        $insertStmt->bindParam(":eventsItemsType", $eventsItemsType);
                        $insertStmt->bindParam(":eventItemsStarts", $eventItemsStarts);
                        $insertStmt->bindParam(":eventItemsEnds", $eventItemsEnds);
                        $insertStmt->bindParam(":eventItemsDescription", $eventItemsDescription);
                        $insertStmt->bindParam(":eventItemsVideo", $eventItemsVideo);
                        $insertStmt->bindParam(":eventItemsUrl", $eventItemsUrl);

                        if($insertStmt->execute()){
                            $eventsItemsId = $this->conn->lastInsertId();

                            foreach ($item->photos as $photo) {
                                $insertPhotosQuery = "INSERT INTO
                                    " . $this->eventsItemsPhotos_table . "
                                SET
                                    eventsItemsId= $eventsItemsId,
                                    sectionId= $sectionId,
                                    eventsItemsPhotoUrl=:eventsItemsPhotoUrl,
                                    eventsItemsPhotoHeight=:eventsItemsPhotoHeight,
                                    eventsItemsPhotoWidth=:eventsItemsPhotoWidth";

                            // prepare query
                            $insertPhotoStmt = $this->conn->prepare($insertPhotosQuery);
                            // sanitize
                            $eventsItemsPhotoUrl=htmlspecialchars(strip_tags($photo->url));
                            $eventsItemsPhotoHeight=htmlspecialchars(strip_tags($photo->height));
                            $eventsItemsPhotoWidth=htmlspecialchars(strip_tags($photo->width));
                            // bind values
                            $insertPhotoStmt->bindParam(":eventsItemsPhotoUrl", $eventsItemsPhotoUrl);
                            $insertPhotoStmt->bindParam(":eventsItemsPhotoHeight", $eventsItemsPhotoHeight);
                            $insertPhotoStmt->bindParam(":eventsItemsPhotoWidth", $eventsItemsPhotoWidth);
                            $insertPhotoStmt->execute();
                            }
                        }
                    }
                }
            // End of insert ProductItems Code...
        http_response_code(201);
        echo json_encode(array(
            "message" => "ECL Created Successfully!",
            "sectionId" => $sectionId
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
    // END OF CREATE A NEW Section

    // DELETE THE EXISTING Section
    function deleteSection(){

        $sectionId = $this->sectionId;
        $listsType = $this->listsType;
        $deleteQuery = "DELETE FROM " . $this->section_table . " WHERE sectionId = $sectionId";
        $deleteStmt = $this->conn->prepare($deleteQuery);
        $this->id=htmlspecialchars(strip_tags($this->sectionId));
        $deleteStmt->bindParam(":sectionId", $this->sectionId);

        if ($listsType === "MENUS" || $listsType === "MENU") {
            if($deleteStmt->execute()) {
                $count = $deleteStmt->rowCount();
                if ($count > 0) {
                    $deleteMenuItems = "DELETE FROM " . $this->menuItems_table . " WHERE sectionId = $sectionId";
                    $deleteMenuItemsStmt = $this->conn->prepare($deleteMenuItems);
                    if($deleteMenuItemsStmt->execute()) {
                        $menuItemsCost = "DELETE FROM " . $this->menuItemsCost_table . " WHERE sectionId = $sectionId";
                        $menuItemsCostStmt = $this->conn->prepare($menuItemsCost);
                        if($menuItemsCostStmt->execute()) {
                            $menuItemsCostOptions = "DELETE FROM " . $this->menuItemsCostOptions_table . " WHERE sectionId = $sectionId";
                            $menuItemsCostOptionsStmt = $this->conn->prepare($menuItemsCostOptions);
                            $menuItemsCostOptionsStmt->execute();
                        }
                    }
                }
                http_response_code(200);
                echo json_encode(array(
                    "message" => "ECL deleted Successfully",
                    "sectionId" => $this->id
                ));
            }
        } else if ($listsType === "EVENT" || $listsType === "EVENTS") {
            if($deleteStmt->execute()) {
                $count = $deleteStmt->rowCount();
                if ($count > 0) {
                    $deleteEventsItems = "DELETE FROM " . $this->eventsItems_table . " WHERE sectionId = $sectionId";
                    $deleteEventsItemsStmt = $this->conn->prepare($deleteEventsItems);
                    if($deleteEventsItemsStmt->execute()) {
                        $eventItemsPhotos = "DELETE FROM " . $this->eventsItemsPhotos_table . " WHERE sectionId = $sectionId";
                        $eventItemsPhotosStmt = $this->conn->prepare($eventItemsPhotos);
                        $eventItemsPhotosStmt->execute();
                    }
                }
                http_response_code(200);
                echo json_encode(array(
                    "message" => "ECL deleted Successfully",
                    "sectionId" => $this->id
                ));
            }
        } else if ($listsType === "PRODUCTS" || $listsType === "PRODUCT") {
            if($deleteStmt->execute()) {
                $count = $deleteStmt->rowCount();
                if ($count > 0) {
                    $deleteMenuItems = "DELETE FROM " . $this->menuItems_table . " WHERE sectionId = $sectionId";
                    $deleteMenuItemsStmt = $this->conn->prepare($deleteMenuItems);
                    if($deleteMenuItemsStmt->execute()) {
                        $menuItemsCost = "DELETE FROM " . $this->menuItemsCost_table . " WHERE sectionId = $sectionId";
                        $menuItemsCostStmt = $this->conn->prepare($menuItemsCost);
                        if($menuItemsCostStmt->execute()) {
                            $menuItemsCostOptions = "DELETE FROM " . $this->menuItemsCostOptions_table . " WHERE sectionId = $sectionId";
                            $menuItemsCostOptionsStmt = $this->conn->prepare($menuItemsCostOptions);
                            $menuItemsCostOptionsStmt->execute();
                        }
                    }
                }
                http_response_code(200);
                echo json_encode(array(
                    "message" => "ECL deleted Successfully",
                    "sectionId" => $this->id
                ));
            }
        }
    }
    // END OF DELETE THE EXISTING Section

    //////////////// UPDATE THE EXISTING Section ////////////////////
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
    //////////////// END OF UPDATE THE EXISTING Section ////////////////////

}