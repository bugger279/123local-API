<?php
class Product{

    // database connection and table name
    private $conn;
    private $location_table = "locations";
    private $categories_table = "categories";
    private $emails_table = "emails";
    private $images_table = "images";
    private $lists_table = "lists";
    private $phones_table = "phones";
    private $urls_table = "urls";
    private $videos_table = "videos";
    private $keywords_table = "keywords";
    private $specialities_table = "specialities";
    private $brands_table = "brands";
    private $products_table = "products";
    private $associations_table = "associations";
    private $languages_table = "languages";
    private $sunday_table = "sunday";
    private $monday_table = "monday";
    private $tuesday_table = "tuesday";
    private $wednesday_table = "wednesday";
    private $thursday_table = "thursday";
    private $friday_table = "friday";
    private $saturday_table = "saturday";
    private $services_table = "services";
    // Locations object properties
    public $locationId;
    public $yextID;
    // public $partnerID;
    public $status;
    public $name;
    public $address;
    public $visible;
    public $address2;
    public $city;
    public $displayAddress;
    public $countryCode;
    public $postalCode;
    public $state;
    public $description;
    public $displayLatitude;
    public $displayLongitude;
    public $routableLatitude;
    public $routableLongitude;
    public $hoursDisplayText;
    public $specialOfferMessage;
    public $specialOfferUrl;
    public $paymentOptions;
    public $twitterHandle;
    public $facebookPageUrl;
    public $attributionImageWidth;
    public $attributionImageDescription;
    public $attributionImageUrl;
    public $attributionImageHeight;
    public $attributionUrl;
    public $closed;
    public $yearEstablished;
    // Categories Object Properties
    public $categoriesName;
    public $categoriesId;
    public $categoryID;
    // Emails Object Properties
    public $emailsId;
    public $emailsAddress;
    public $emailsDescription;
    // images Object Properties
    public $imagesId;
    public $width;
    public $imagesType;
    public $imagesUrl;
    public $height;
    // Lists Object Properties
    public $listsId;
    public $listsName;
    public $listsDescription;
    public $listsType;
    // phones Object Properties
    public $numbers;
    public $phonesCountryCode;
    public $phonesDescription;
    public $phonesType;
    // urls Object Properties
    public $displayUrl;
    public $urlsDescription;
    public $urlsType;
    public $urls;
    // videos Object Properties
    public $videosUrl;
    public $videosDescription;
    // Keywords Table
    public $keywordsName;
    // Specialities Table
    public $specialitiesName;
    // Brands Table
    public $brandsName;
    // Products Table
    public $productsName;
    // Associatons Table
    public $associationsName;
    // Languages Table
    public $languagesName;
    // Days Table
    public $starts;
    public $ends;
    // Services Table
    public $servicesName;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    //////////////// READ ALL LISTINGS ////////////////////
    // read products
    function read(){
        $query = "SELECT * FROM " . $this->location_table . " p ORDER BY p.locationId DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readCategories($locationId){
        $query = "SELECT categoryID, categoriesName FROM " . $this->categories_table . " c WHERE c.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();    
        return $stmt;
    }

    function readPhones($locationId){
        $query = "SELECT numbers, phonesCountryCode, phonesDescription, phonesType FROM " . $this->phones_table . " phone WHERE phone.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();    
        return $stmt;
    }

    function readEmails($locationId){
        $query = "SELECT emailsAddress, emailsDescription FROM " . $this->emails_table . " email WHERE email.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readImages($locationId){
        $query = "SELECT width, imagesType, imagesUrl, height FROM " . $this->images_table . " images WHERE images.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();    
        return $stmt;
    }

    function readVideos($locationId){
        $query = "SELECT videosUrl,videosDescription FROM " . $this->videos_table . " videos WHERE videos.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();    
        return $stmt;
    }

    function readUrls($locationId){
        $query = "SELECT displayUrl, urlsDescription, urlsType,urls FROM " . $this->urls_table . " urls WHERE urls.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();    
        return $stmt;
    }

    function readLists($locationId){
        $query = "SELECT listsId, listsName, listsDescription, listsType FROM " . $this->lists_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readKeywords($locationId){
        $query = "SELECT keywordsName FROM " . $this->keywords_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readSpecialities($locationId){
        $query = "SELECT specialitiesName FROM " . $this->specialities_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    function readBrands($locationId){
        $query = "SELECT brandsName FROM " . $this->brands_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readProducts($locationId){
        $query = "SELECT productsName FROM " . $this->products_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readAssociations($locationId){
        $query = "SELECT associationsName FROM " . $this->associations_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readLanguages($locationId){
        $query = "SELECT languagesName FROM " . $this->languages_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readMonday($locationId){
        $query = "SELECT starts, ends FROM " . $this->monday_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readTuesday($locationId){
        $query = "SELECT starts, ends FROM " . $this->tuesday_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readWednesday($locationId){
        $query = "SELECT starts, ends FROM " . $this->wednesday_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readThursday($locationId){
        $query = "SELECT starts, ends FROM " . $this->thursday_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readFriday($locationId){
        $query = "SELECT starts, ends FROM " . $this->friday_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readSaturday($locationId){
        $query = "SELECT starts, ends FROM " . $this->saturday_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readSunday($locationId){
        $query = "SELECT starts, ends FROM " . $this->sunday_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readServices($locationId){
        $query = "SELECT servicesName FROM " . $this->services_table . " lists WHERE lists.locationId = $locationId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readAllCategories () {
        $query = "SELECT DISTINCT categoriesName, categoryID  FROM " . $this->categories_table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();    
        return $stmt;
    }
//////////////// END OF READ ALL LISTINGS ////////////////////

///////////////// CREATING A NEW LISTINGS /////////////////////
function create(){
    // query to insert record
    $query = "INSERT INTO
                " . $this->location_table . "
            SET
                yextID=:yextID,
                status=:status,
                name=:name,
                address=:address,
                visible=:visible,
                address2=:address2,
                city=:city,
                displayAddress=:displayAddress,
                countryCode=:countryCode,
                postalCode=:postalCode,
                state=:state,
                description=:description,
                displayLatitude=:displayLatitude,
                displayLongitude=:displayLongitude,
                routableLatitude=:routableLatitude,
                routableLongitude=:routableLongitude,
                hoursDisplayText=:hoursDisplayText,
                specialOfferMessage=:specialOfferMessage,
                specialOfferUrl=:specialOfferUrl,
                twitterHandle=:twitterHandle,
                facebookPageUrl=:facebookPageUrl,
                attributionImageWidth=:attributionImageWidth,
                attributionImageDescription=:attributionImageDescription,
                attributionImageUrl=:attributionImageUrl,
                attributionImageHeight=:attributionImageHeight,
                attributionUrl=:attributionUrl,
                closed=:closed,
                yearEstablished=:yearEstablished";

    // prepare query
    $stmt = $this->conn->prepare($query);
    // sanitize
    $this->yextID=htmlspecialchars(strip_tags($this->yextID));
    $this->status=htmlspecialchars(strip_tags($this->status));
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->visible=htmlspecialchars(strip_tags($this->visible));
    $this->address2=htmlspecialchars(strip_tags($this->address2));
    $this->city=htmlspecialchars(strip_tags($this->city));
    $this->displayAddress=htmlspecialchars(strip_tags($this->displayAddress));
    $this->countryCode=htmlspecialchars(strip_tags($this->countryCode));
    $this->postalCode=htmlspecialchars(strip_tags($this->postalCode));
    $this->state=htmlspecialchars(strip_tags($this->state));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->displayLatitude=htmlspecialchars(strip_tags($this->displayLatitude));
    $this->displayLongitude=htmlspecialchars(strip_tags($this->displayLongitude));
    $this->routableLatitude=htmlspecialchars(strip_tags($this->routableLatitude));
    $this->routableLongitude=htmlspecialchars(strip_tags($this->routableLongitude));
    $this->hoursDisplayText=htmlspecialchars(strip_tags($this->hoursDisplayText));
    $this->specialOfferMessage=htmlspecialchars(strip_tags($this->specialOfferMessage));
    $this->specialOfferUrl=htmlspecialchars(strip_tags($this->specialOfferUrl));
    $this->twitterHandle=htmlspecialchars(strip_tags($this->twitterHandle));
    $this->facebookPageUrl=htmlspecialchars(strip_tags($this->facebookPageUrl));
    $this->attributionImageWidth=htmlspecialchars(strip_tags($this->attributionImageWidth));
    $this->attributionImageDescription=htmlspecialchars(strip_tags($this->attributionImageDescription));
    $this->attributionImageUrl=htmlspecialchars(strip_tags($this->attributionImageUrl));
    $this->attributionImageHeight=htmlspecialchars(strip_tags($this->attributionImageHeight));
    $this->attributionUrl=htmlspecialchars(strip_tags($this->attributionUrl));
    $this->closed=htmlspecialchars(strip_tags($this->closed));
    $this->yearEstablished=htmlspecialchars(strip_tags($this->yearEstablished));

    // bind values
    $stmt->bindParam(":yextID", $this->yextID);
    $stmt->bindParam(":status", $this->status);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":address", $this->address);
    $stmt->bindParam(":visible", $this->visible);
    $stmt->bindParam(":address2", $this->address2);
    $stmt->bindParam(":city", $this->city);
    $stmt->bindParam(":displayAddress", $this->displayAddress);
    $stmt->bindParam(":countryCode", $this->countryCode);
    $stmt->bindParam(":postalCode", $this->postalCode);
    $stmt->bindParam(":state", $this->state);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":displayLatitude", $this->displayLatitude);
    $stmt->bindParam(":displayLongitude", $this->displayLongitude);
    $stmt->bindParam(":routableLatitude", $this->routableLatitude);
    $stmt->bindParam(":routableLongitude", $this->routableLongitude);
    $stmt->bindParam(":hoursDisplayText", $this->hoursDisplayText);
    $stmt->bindParam(":specialOfferMessage", $this->specialOfferMessage);
    $stmt->bindParam(":specialOfferUrl", $this->specialOfferUrl);
    $stmt->bindParam(":twitterHandle", $this->twitterHandle);
    $stmt->bindParam(":facebookPageUrl", $this->facebookPageUrl);
    $stmt->bindParam(":attributionImageWidth", $this->attributionImageWidth);
    $stmt->bindParam(":attributionImageDescription", $this->attributionImageDescription);
    $stmt->bindParam(":attributionImageUrl", $this->attributionImageUrl);
    $stmt->bindParam(":attributionImageHeight", $this->attributionImageHeight);
    $stmt->bindParam(":attributionUrl", $this->attributionUrl);
    $stmt->bindParam(":closed", $this->closed);
    $stmt->bindParam(":yearEstablished", $this->yearEstablished);

    // execute query
    if($stmt->execute()){
        $lastId = $this->conn->lastInsertId();
        // Phones insert Code...
        foreach ($this->phones as $value) {
            $insertQuery = "INSERT INTO
                " . $this->phones_table . "
            SET
                locationId= $lastId,
                numbers=:numbers,
                phonesCountryCode=:phonesCountryCode,
                phonesDescription=:phonesDescription,
                phonesType=:phonesType";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $numbers=htmlspecialchars(strip_tags($value->number->number));
                $phonesCountryCode=htmlspecialchars(strip_tags($value->number->countryCode));
                $phonesDescription=htmlspecialchars(strip_tags($value->description));
                $phonesType=htmlspecialchars(strip_tags($value->description));
                // bind values
                $insertStmt->bindParam(":numbers", $numbers);
                $insertStmt->bindParam(":phonesCountryCode", $phonesCountryCode);
                $insertStmt->bindParam(":phonesDescription", $phonesDescription);
                $insertStmt->bindParam(":phonesType", $phonesType);
                $insertStmt->execute();
            }
        // End of Phones insert Code...

        // Categories insert Code...
        foreach ($this->categories as $value) {
            $insertQuery = "INSERT INTO
                " . $this->categories_table . "
            SET
                locationId= $lastId,
                categoryID=:categoryID,
                categoriesName=:categoriesName";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->categoryID=htmlspecialchars(strip_tags($value->id));
                $this->categoriesName=htmlspecialchars(strip_tags($value->name));
                // bind values
                $insertStmt->bindParam(":categoryID", $this->categoryID);
                $insertStmt->bindParam(":categoriesName", $this->categoriesName);
                $insertStmt->execute();
            }
        // End of Categories insert Code...

        // Emails Insert Code...
        foreach ($this->emails as $value) {
            $insertQuery = "INSERT INTO
                " . $this->emails_table . "
            SET
                locationId= $lastId,
                emailsAddress=:emailsAddress,
                emailsDescription=:emailsDescription";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->emailsAddress=htmlspecialchars(strip_tags($value->address));
                $this->emailsDescription=htmlspecialchars(strip_tags($value->description));
                // bind values
                $insertStmt->bindParam(":emailsAddress", $this->emailsAddress);
                $insertStmt->bindParam(":emailsDescription", $this->emailsDescription);
                $insertStmt->execute();
            }
        // End of Emails insert Code...

        // Images Insert Code...
        foreach ($this->images as $value) {
            $insertQuery = "INSERT INTO
                " . $this->images_table . "
            SET
                locationId= $lastId,
                width=:width,
                imagesType=:imagesType,
                imagesUrl=:imagesUrl,
                height=:height";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->width=htmlspecialchars(strip_tags($value->width));
                $this->type=htmlspecialchars(strip_tags($value->type));
                $this->url=htmlspecialchars(strip_tags($value->url));
                $this->height=htmlspecialchars(strip_tags($value->height));
                // bind values
                $insertStmt->bindParam(":width", $this->width);
                $insertStmt->bindParam(":imagesType", $this->type);
                $insertStmt->bindParam(":imagesUrl", $this->url);
                $insertStmt->bindParam(":height", $this->height);
                $insertStmt->execute();
            }
        // End of Images insert Code...

        // Videos Insert Code...
        foreach ($this->videos as $value) {
            $insertQuery = "INSERT INTO
                " . $this->videos_table . "
            SET
                locationId= $lastId,
                videosUrl=:url,
                videosDescription=:videosDescription";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->url=htmlspecialchars(strip_tags($value->url));
                $this->videosDescription=htmlspecialchars(strip_tags($value->description));
                // bind values
                $insertStmt->bindParam(":url", $this->url);
                $insertStmt->bindParam(":videosDescription", $this->videosDescription);
                $insertStmt->execute();
            }
        // End of Videos insert Code...

        // Urls Insert Code...
        foreach ($this->urls as $value) {
            $insertQuery = "INSERT INTO
                " . $this->urls_table . "
            SET
                locationId= $lastId,
                displayUrl=:displayUrl,
                urlsDescription=:urlsDescription,
                urlsType=:urlsType,
                urls=:urls";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->displayUrl=htmlspecialchars(strip_tags($value->displayUrl));
                $this->description=htmlspecialchars(strip_tags($value->description));
                $this->type=htmlspecialchars(strip_tags($value->type));
                $this->url=htmlspecialchars(strip_tags($value->url));
                // bind values
                $insertStmt->bindParam(":displayUrl", $this->displayUrl);
                $insertStmt->bindParam(":urlsDescription", $this->description);
                $insertStmt->bindParam(":urlsType", $this->type);
                $insertStmt->bindParam(":urls", $this->url);
                $insertStmt->execute();
            }
        // End of Urls insert Code...

        // Lists Insert Code...
        foreach ($this->lists as $value) {
            $insertQuery = "INSERT INTO
                " . $this->lists_table . "
            SET
                locationId= $lastId,
                listsName=:listsName,
                listsDescription=:listsDescription,
                listsType=:listsType";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->name=htmlspecialchars(strip_tags($value->name));
                $this->description=htmlspecialchars(strip_tags($value->description));
                $this->type=htmlspecialchars(strip_tags($value->type));
                // bind values
                $insertStmt->bindParam(":listsName", $this->name);
                $insertStmt->bindParam(":listsDescription", $this->description);
                $insertStmt->bindParam(":listsType", $this->type);
                $insertStmt->execute();
            }
        // End of Lists insert Code...

        // Keywords Insert Code...
        foreach ($this->keywordsName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->keywords_table . "
            SET
                locationId= $lastId,
                keywordsName=:keywords";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->keywordsName=htmlspecialchars(strip_tags($value));
                // print_r($this->keywordsName);
                // bind values
                $insertStmt->bindParam(":keywords", $this->keywordsName);
                $insertStmt->execute();
            }
        // End of Keywords insert Code...

        // Specialities Insert Code...
        foreach ($this->specialitiesName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->specialities_table . "
            SET
                locationId= $lastId,
                specialitiesName=:specialitiesName";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->specialitiesName=htmlspecialchars(strip_tags($value));
                // bind values
                $insertStmt->bindParam(":specialitiesName", $this->specialitiesName);
                $insertStmt->execute();
        }
        // End of Specialities insert Code...

        // Brands Insert Code...
        foreach ($this->brandsName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->brands_table . "
            SET
                locationId= $lastId,
                brandsName=:brandsName";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->brandsName=htmlspecialchars(strip_tags($value));
                // bind values
                $insertStmt->bindParam(":brandsName", $this->brandsName);
                $insertStmt->execute();
        }
        // End of Brands insert Code...

        // Products Insert Code...
        foreach ($this->productsName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->products_table . "
            SET
                locationId= $lastId,
                productsName=:productsName";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->productsName=htmlspecialchars(strip_tags($value));
                // bind values
                $insertStmt->bindParam(":productsName", $this->productsName);
                $insertStmt->execute();
        }
        // End of Products insert Code...

        // Assocaiotions Insert Code...
        foreach ($this->associationsName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->associations_table . "
            SET
                locationId= $lastId,
                associationsName=:associationsName";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->associationsName=htmlspecialchars(strip_tags($value));
                // bind values
                $insertStmt->bindParam(":associationsName", $this->associationsName);
                $insertStmt->execute();
        }
        // End of Assocaiotions insert Code...

        // languages Insert Code...
        foreach ($this->languagesName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->languages_table . "
            SET
                locationId= $lastId,
                languagesName=:languagesName";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->languagesName=htmlspecialchars(strip_tags($value));
                // bind values
                $insertStmt->bindParam(":languagesName", $this->languagesName);
                $insertStmt->execute();
        }
        // End of languages insert Code...
        
        // Monday Code...
        foreach ($this->mondays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->monday_table . "
            SET
                locationId= $lastId,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Monday Code...

        // Tuesday Code...
        foreach ($this->tuesdays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->tuesday_table . "
            SET
                locationId= $lastId,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Tuesday Code...

        // Wednesday Code...
        foreach ($this->wednesdays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->wednesday_table . "
            SET
                locationId= $lastId,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Wednesday Code...

        // Thursday Code...
        foreach ($this->thursdays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->thursday_table . "
            SET
                locationId= $lastId,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Thursday Code...

        // Friday Code...
        foreach ($this->fridays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->friday_table . "
            SET
                locationId= $lastId,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Friday Code...

        // Saturday Code...
        foreach ($this->saturdays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->saturday_table . "
            SET
                locationId= $lastId,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Saturday Code...

        // Sunday Code...
        foreach ($this->sundays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->sunday_table . "
            SET
                locationId= $lastId,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Sunday Code...

        // Services Insert Code...
        foreach ($this->servicesName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->services_table . "
            SET
                locationId= $lastId,
                servicesName=:servicesName";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->servicesName=htmlspecialchars(strip_tags($value));
                // bind values
                $insertStmt->bindParam(":servicesName", $this->servicesName);
                $insertStmt->execute();
        }
        // End of Services insert Code...

        http_response_code(201);
        // tell the user
        echo json_encode(array(
            "id" => $lastId,
            "status" => $this->status,
            "url" => "https://123local.com/single.php?id=".$lastId,
            "issue" => []
        ));
    } else{
        $errors = $stmt->errorInfo();
        print_r($errors);
        http_response_code(503);
        echo json_encode(array("issues" => [
            "message" => "Unable to create Location.",
            "status" => "Listing wasn't created.",
            "errorCode" => "503",
            "issue" => "Service is unavailable"
        ]));
    }
}

//////////////// END OF CREATING A NEW LISTINGS ////////////////////

//////////////// UPDATE THE EXISTING LISTINGS ////////////////////
// update the product
function update(){
    // update query
    $query = "UPDATE
                " . $this->location_table . "
            SET
            yextID=:yextID,
            status=:status,
            name=:name,
            address=:address,
            visible=:visible,
            address2=:address2,
            city=:city,
            displayAddress=:displayAddress,
            countryCode=:countryCode,
            postalCode=:postalCode,
            state=:state,
            description=:description,
            displayLatitude=:displayLatitude,
            displayLongitude=:displayLongitude,
            routableLatitude=:routableLatitude,
            routableLongitude=:routableLongitude,
            hoursDisplayText=:hoursDisplayText,
            specialOfferMessage=:specialOfferMessage,
            specialOfferUrl=:specialOfferUrl,
            twitterHandle=:twitterHandle,
            facebookPageUrl=:facebookPageUrl,
            attributionImageWidth=:attributionImageWidth,
            attributionImageDescription=:attributionImageDescription,
            attributionImageUrl=:attributionImageUrl,
            attributionImageHeight=:attributionImageHeight,
            attributionUrl=:attributionUrl,
            closed=:closed,
            yearEstablished=:yearEstablished
            WHERE
                locationId=:id";

    // prepare query statement
    $stmt = $this->conn->prepare($query);
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->yextID=htmlspecialchars(strip_tags($this->yextID));
    $this->status=htmlspecialchars(strip_tags($this->status));
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->visible=htmlspecialchars(strip_tags($this->visible));
    $this->address2=htmlspecialchars(strip_tags($this->address2));
    $this->city=htmlspecialchars(strip_tags($this->city));
    $this->displayAddress=htmlspecialchars(strip_tags($this->displayAddress));
    $this->countryCode=htmlspecialchars(strip_tags($this->countryCode));
    $this->postalCode=htmlspecialchars(strip_tags($this->postalCode));
    $this->state=htmlspecialchars(strip_tags($this->state));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->displayLatitude=htmlspecialchars(strip_tags($this->displayLatitude));
    $this->displayLongitude=htmlspecialchars(strip_tags($this->displayLongitude));
    $this->routableLatitude=htmlspecialchars(strip_tags($this->routableLatitude));
    $this->routableLongitude=htmlspecialchars(strip_tags($this->routableLongitude));
    $this->hoursDisplayText=htmlspecialchars(strip_tags($this->hoursDisplayText));
    $this->specialOfferMessage=htmlspecialchars(strip_tags($this->specialOfferMessage));
    $this->specialOfferUrl=htmlspecialchars(strip_tags($this->specialOfferUrl));
    // $this->paymentOptions=htmlspecialchars(strip_tags($this->paymentOptions));
    $this->twitterHandle=htmlspecialchars(strip_tags($this->twitterHandle));
    $this->facebookPageUrl=htmlspecialchars(strip_tags($this->facebookPageUrl));
    $this->attributionImageWidth=htmlspecialchars(strip_tags($this->attributionImageWidth));
    $this->attributionImageDescription=htmlspecialchars(strip_tags($this->attributionImageDescription));
    $this->attributionImageUrl=htmlspecialchars(strip_tags($this->attributionImageUrl));
    $this->attributionImageHeight=htmlspecialchars(strip_tags($this->attributionImageHeight));
    $this->attributionUrl=htmlspecialchars(strip_tags($this->attributionUrl));
    $this->closed=htmlspecialchars(strip_tags($this->closed));
    $this->yearEstablished=htmlspecialchars(strip_tags($this->yearEstablished));

    // bind new values
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(":yextID", $this->yextID);
    $stmt->bindParam(":status", $this->status);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":address", $this->address);
    $stmt->bindParam(":visible", $this->visible);
    $stmt->bindParam(":address2", $this->address2);
    $stmt->bindParam(":city", $this->city);
    $stmt->bindParam(":displayAddress", $this->displayAddress);
    $stmt->bindParam(":countryCode", $this->countryCode);
    $stmt->bindParam(":postalCode", $this->postalCode);
    $stmt->bindParam(":state", $this->state);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":displayLatitude", $this->displayLatitude);
    $stmt->bindParam(":displayLongitude", $this->displayLongitude);
    $stmt->bindParam(":routableLatitude", $this->routableLatitude);
    $stmt->bindParam(":routableLongitude", $this->routableLongitude);
    $stmt->bindParam(":hoursDisplayText", $this->hoursDisplayText);
    $stmt->bindParam(":specialOfferMessage", $this->specialOfferMessage);
    $stmt->bindParam(":specialOfferUrl", $this->specialOfferUrl);
    // $stmt->bindParam(":paymentOptions", $this->paymentOptions);
    $stmt->bindParam(":twitterHandle", $this->twitterHandle);
    $stmt->bindParam(":facebookPageUrl", $this->facebookPageUrl);
    $stmt->bindParam(":attributionImageWidth", $this->attributionImageWidth);
    $stmt->bindParam(":attributionImageDescription", $this->attributionImageDescription);
    $stmt->bindParam(":attributionImageUrl", $this->attributionImageUrl);
    $stmt->bindParam(":attributionImageHeight", $this->attributionImageHeight);
    $stmt->bindParam(":attributionUrl", $this->attributionUrl);
    $stmt->bindParam(":closed", $this->closed);
    // $stmt->bindParam(":services", $this->services);
    $stmt->bindParam(":yearEstablished", $this->yearEstablished);
    // execute the query
    if ($stmt->execute()) {
        // DELETE Existing Data
        $deleteCategories = "DELETE FROM categories WHERE locationId = $this->id";
        $catStmt = $this->conn->prepare($deleteCategories);
        $catStmt->execute();

        $deleteEmails = "DELETE FROM emails WHERE locationId = $this->id";
        $emailStmt = $this->conn->prepare($deleteEmails);
        $emailStmt->execute();

        $deleteImg = "DELETE FROM images WHERE locationId = $this->id";
        $imgStmt = $this->conn->prepare($deleteImg);
        $imgStmt->execute();

        $deleteList = "DELETE FROM lists WHERE locationId = $this->id";
        $listStmt = $this->conn->prepare($deleteList);
        $listStmt->execute();

        $deletePhone = "DELETE FROM phones WHERE locationId = $this->id";
        $phoneStmt = $this->conn->prepare($deletePhone);
        $phoneStmt->execute();

        $deleteUrl = "DELETE FROM urls WHERE locationId = $this->id";
        $urlStmt = $this->conn->prepare($deleteUrl);
        $urlStmt->execute();

        $deleteVideo = "DELETE FROM videos WHERE locationId = $this->id";
        $videoStmt = $this->conn->prepare($deleteVideo);
        $videoStmt->execute();

        $deleteKeywords = "DELETE FROM keywords WHERE locationId = $this->id";
        $keywordStmt = $this->conn->prepare($deleteKeywords);
        $keywordStmt->execute();

        $deleteSpecialities = "DELETE FROM specialities WHERE locationId = $this->id";
        $specialityStmt = $this->conn->prepare($deleteSpecialities);
        $specialityStmt->execute();

        $deleteBrands = "DELETE FROM brands WHERE locationId = $this->id";
        $Stmt = $this->conn->prepare($deleteBrands);
        $Stmt->execute();

        $deleteProducts = "DELETE FROM products WHERE locationId = $this->id";
        $productStmt = $this->conn->prepare($deleteProducts);
        $productStmt->execute();

        $deleteAssociations = "DELETE FROM associations WHERE locationId = $this->id";
        $associationStmt = $this->conn->prepare($deleteAssociations);
        $associationStmt->execute();

        $deleteLanguages = "DELETE FROM languages WHERE locationId = $this->id";
        $languageStmt = $this->conn->prepare($deleteLanguages);
        $languageStmt->execute();

        $deleteMondays = "DELETE FROM monday WHERE locationId = $this->id";
        $mondayStmt = $this->conn->prepare($deleteMondays);
        $mondayStmt->execute();

        $deleteTuesdays = "DELETE FROM tuesday WHERE locationId = $this->id";
        $tuesdayStmt = $this->conn->prepare($deleteTuesdays);
        $tuesdayStmt->execute();

        $deleteWednesdays = "DELETE FROM wednesday WHERE locationId = $this->id";
        $wednesdayStmt = $this->conn->prepare($deleteWednesdays);
        $wednesdayStmt->execute();

        $deleteThursdays = "DELETE FROM thursday WHERE locationId = $this->id";
        $thursdayStmt = $this->conn->prepare($deleteThursdays);
        $thursdayStmt->execute();

        $deleteFridays = "DELETE FROM friday WHERE locationId = $this->id";
        $fridayStmt = $this->conn->prepare($deleteFridays);
        $fridayStmt->execute();

        $deleteSaturdays = "DELETE FROM saturday WHERE locationId = $this->id";
        $saturdayStmt = $this->conn->prepare($deleteSaturdays);
        $saturdayStmt->execute();

        $deleteSundays = "DELETE FROM sunday WHERE locationId = $this->id";
        $sundayStmt = $this->conn->prepare($deleteSundays);
        $sundayStmt->execute();

        $deleteServices = "DELETE FROM services WHERE locationId = $this->id";
        $serviceStmt = $this->conn->prepare($deleteServices);
        $serviceStmt->execute();
        // End of DELETE EXISTING DATA

        // //// INSERT UPDATED DATA
        // Phones insert Code...
        foreach ($this->phones as $value) {
            $insertQuery = "INSERT INTO
                " . $this->phones_table . "
            SET
                locationId=$this->id,
                numbers=:numbers,
                phonesCountryCode=:phonesCountryCode,
                phonesDescription=:phonesDescription,
                phonesType=:phonesType";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->numbers=htmlspecialchars(strip_tags($value->number->number));
                $this->phonesCountryCode=htmlspecialchars(strip_tags($value->number->countryCode));
                $this->phonesDescription=htmlspecialchars(strip_tags($value->description));
                $this->phonesType=htmlspecialchars(strip_tags($value->description));
                // bind values
                $insertStmt->bindParam(":numbers", $this->numbers);
                $insertStmt->bindParam(":phonesCountryCode", $this->phonesCountryCode);
                $insertStmt->bindParam(":phonesDescription", $this->phonesDescription);
                $insertStmt->bindParam(":phonesType", $this->phonesType);
                $insertStmt->execute();
            }
        // End of Phones insert Code...

        // Categories insert Code...
        foreach ($this->categories as $value) {
            $insertQuery = "INSERT INTO
                " . $this->categories_table . "
            SET
                locationId=$this->id,
                categoryID=:categoryID,
                categoriesName=:categoriesName";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->categoryID=htmlspecialchars(strip_tags($value->id));
                $this->categoriesName=htmlspecialchars(strip_tags($value->name));
                // bind values
                $insertStmt->bindParam(":categoryID", $this->categoryID);
                $insertStmt->bindParam(":categoriesName", $this->categoriesName);
                $insertStmt->execute();
            }
        // End of Categories insert Code...

        // Emails Insert Code...
        foreach ($this->emails as $value) {
            $insertQuery = "INSERT INTO
                " . $this->emails_table . "
            SET
                locationId=$this->id,
                emailsAddress=:emailsAddress,
                emailsDescription=:emailsDescription";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->emailsAddress=htmlspecialchars(strip_tags($value->address));
                $this->emailsDescription=htmlspecialchars(strip_tags($value->description));
                // bind values
                $insertStmt->bindParam(":emailsAddress", $this->emailsAddress);
                $insertStmt->bindParam(":emailsDescription", $this->emailsDescription);
                $insertStmt->execute();
            }
        // End of Emails insert Code...

        // Images Insert Code...
        foreach ($this->images as $value) {
            $insertQuery = "INSERT INTO
                " . $this->images_table . "
            SET
                locationId=$this->id,
                width=:width,
                imagesType=:imagesType,
                imagesUrl=:imagesUrl,
                height=:height";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->width=htmlspecialchars(strip_tags($value->width));
                $this->type=htmlspecialchars(strip_tags($value->type));
                $this->url=htmlspecialchars(strip_tags($value->url));
                $this->height=htmlspecialchars(strip_tags($value->height));
                // bind values
                $insertStmt->bindParam(":width", $this->width);
                $insertStmt->bindParam(":imagesType", $this->type);
                $insertStmt->bindParam(":imagesUrl", $this->url);
                $insertStmt->bindParam(":height", $this->height);
                $insertStmt->execute();
            }
        // End of Images insert Code...

        // Videos Insert Code...
        foreach ($this->videos as $value) {
            $insertQuery = "INSERT INTO
                " . $this->videos_table . "
            SET
                locationId= $this->id,
                videosUrl=:url,
                videosDescription=:videosDescription";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->url=htmlspecialchars(strip_tags($value->url));
                $this->videosDescription=htmlspecialchars(strip_tags($value->description));
                // bind values
                $insertStmt->bindParam(":url", $this->url);
                $insertStmt->bindParam(":videosDescription", $this->videosDescription);
                $insertStmt->execute();
            }
        // End of Videos insert Code...

        // Urls Insert Code...
        foreach ($this->urls as $value) {
            $insertQuery = "INSERT INTO
                " . $this->urls_table . "
            SET
                locationId=$this->id,
                displayUrl=:displayUrl,
                urlsDescription=:urlsDescription,
                urlsType=:urlsType,
                urls=:urls";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->displayUrl=htmlspecialchars(strip_tags($value->displayUrl));
                $this->description=htmlspecialchars(strip_tags($value->description));
                $this->type=htmlspecialchars(strip_tags($value->type));
                $this->url=htmlspecialchars(strip_tags($value->url));
                // bind values
                $insertStmt->bindParam(":displayUrl", $this->displayUrl);
                $insertStmt->bindParam(":urlsDescription", $this->description);
                $insertStmt->bindParam(":urlsType", $this->type);
                $insertStmt->bindParam(":urls", $this->url);
                $insertStmt->execute();
            }
        // End of Urls insert Code...

        // Lists Insert Code...
        foreach ($this->lists as $value) {
            $insertQuery = "INSERT INTO
                " . $this->lists_table . "
            SET
                locationId=$this->id,
                listsName=:listsName,
                listsDescription=:listsDescription,
                listsType=:listsType";
        
                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->name=htmlspecialchars(strip_tags($value->name));
                $this->description=htmlspecialchars(strip_tags($value->description));
                $this->type=htmlspecialchars(strip_tags($value->type));
                // bind values
                $insertStmt->bindParam(":listsName", $this->name);
                $insertStmt->bindParam(":listsDescription", $this->description);
                $insertStmt->bindParam(":listsType", $this->type);
                $insertStmt->execute();
            }
        // End of Lists insert Code...

        // Keywords Insert Code...
        foreach ($this->keywordsName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->keywords_table . "
            SET
                locationId= $this->id,
                keywordsName=:keywords";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->keywordsName=htmlspecialchars(strip_tags($value));
                // print_r($this->keywordsName);
                // bind values
                $insertStmt->bindParam(":keywords", $this->keywordsName);
                $insertStmt->execute();
            }
            // die();
        // End of Keywords insert Code...

        // Specialities Insert Code...
        foreach ($this->specialitiesName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->specialities_table . "
            SET
                locationId= $this->id,
                specialitiesName=:specialitiesName";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->specialitiesName=htmlspecialchars(strip_tags($value));
                // bind values
                $insertStmt->bindParam(":specialitiesName", $this->specialitiesName);
                $insertStmt->execute();
        }
        // End of Specialities insert Code...

        // Brands Insert Code...
        foreach ($this->brandsName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->brands_table . "
            SET
                locationId= $this->id,
                brandsName=:brandsName";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->brandsName=htmlspecialchars(strip_tags($value));
                // bind values
                $insertStmt->bindParam(":brandsName", $this->brandsName);
                $insertStmt->execute();
        }
        // End of Brands insert Code...

        // Products Insert Code...
        foreach ($this->productsName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->products_table . "
            SET
                locationId= $this->id,
                productsName=:productsName";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->productsName=htmlspecialchars(strip_tags($value));
                // bind values
                $insertStmt->bindParam(":productsName", $this->productsName);
                $insertStmt->execute();
        }
        // End of Products insert Code...

        // Assocaiotions Insert Code...
        foreach ($this->associationsName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->associations_table . "
            SET
                locationId= $this->id,
                associationsName=:associationsName";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->associationsName=htmlspecialchars(strip_tags($value));
                // bind values
                $insertStmt->bindParam(":associationsName", $this->associationsName);
                $insertStmt->execute();
        }
        // End of Assocaiotions insert Code...

        // languages Insert Code...
        foreach ($this->languagesName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->languages_table . "
            SET
                locationId= $this->id,
                languagesName=:languagesName";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->languagesName=htmlspecialchars(strip_tags($value));
                // bind values
                $insertStmt->bindParam(":languagesName", $this->languagesName);
                $insertStmt->execute();
        }
        // End of languages insert Code...

        // Monday Code...
        foreach ($this->mondays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->monday_table . "
            SET
                locationId= $this->id,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Monday Code...

        // Tuesday Code...
        foreach ($this->tuesdays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->tuesday_table . "
            SET
                locationId= $this->id,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Tuesday Code...

        // Wednesday Code...
        foreach ($this->wednesdays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->wednesday_table . "
            SET
                locationId= $this->id,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Wednesday Code...

        // Thursday Code...
        foreach ($this->thursdays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->thursday_table . "
            SET
                locationId= $this->id,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Thursday Code...

        // Friday Code...
        foreach ($this->fridays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->friday_table . "
            SET
                locationId= $this->id,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Friday Code...

        // Saturday Code...
        foreach ($this->saturdays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->saturday_table . "
            SET
                locationId= $this->id,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Saturday Code...

        // Sunday Code...
        foreach ($this->sundays as $value) {
            $insertQuery = "INSERT INTO
                " . $this->sunday_table . "
            SET
                locationId= $this->id,
                starts=:starts,
                ends=:ends";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->starts=htmlspecialchars(strip_tags($value->starts));
                $this->ends=htmlspecialchars(strip_tags($value->ends));
                // bind values
                $insertStmt->bindParam(":starts", $this->starts);
                $insertStmt->bindParam(":ends", $this->ends);
                $insertStmt->execute();
        }
        // End of Sunday Code...

        
        // Services Insert Code...
        foreach ($this->servicesName as $value) {
            $insertQuery = "INSERT INTO
                " . $this->services_table . "
            SET
                locationId= $this->id,
                servicesName=:servicesName";

                // prepare query
                $insertStmt = $this->conn->prepare($insertQuery);
                // sanitize
                $this->servicesName=htmlspecialchars(strip_tags($value));
                // bind values
                $insertStmt->bindParam(":servicesName", $this->servicesName);
                $insertStmt->execute();
        }
        // End of Services insert Code...
        // //// END OF INSERT UPDATE DATA
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

// Read One Listing
function readOne($locationId){
    $query = "SELECT * FROM " . $this->location_table . " p WHERE locationId = $locationId";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}
// End of Read One Listings
// Read Reviews count
function readReview($locationId){
    $query = "SELECT * FROM reviews c WHERE c.locationId = $locationId";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}
// End of Read Reviews Count
// Read reviews Avg
function reviewsAvg($locationId){
    $query = "SELECT AVG(reviewRating) as avgTotal FROM reviews r WHERE r.locationId = $locationId";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}
// End of Read Reviews Avg

//////////////// DELETE THE EXISTING LISTINGS ////////////////////
    function delete(){
        // $query = "DELETE FROM " . $this->location_table . " WHERE locationId = $this->id";
        $query = "DELETE FROM locations WHERE locationId = $this->id";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // print_r($stmt);
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));

        // print_r($this->id);
        // bind id of record to delete
        $stmt->bindParam(":locationId", $this->id);
        if($stmt->execute()) {
            $deleteCategories = "DELETE FROM categories WHERE locationId = $this->id";
            $catStmt = $this->conn->prepare($deleteCategories);
            $catStmt->execute();

            $deleteEmails = "DELETE FROM emails WHERE locationId = $this->id";
            $emailStmt = $this->conn->prepare($deleteEmails);
            $emailStmt->execute();

            $deleteImg = "DELETE FROM images WHERE locationId = $this->id";
            $imgStmt = $this->conn->prepare($deleteImg);
            $imgStmt->execute();

            $deleteList = "DELETE FROM lists WHERE locationId = $this->id";
            $listStmt = $this->conn->prepare($deleteList);
            $listStmt->execute();

            $deletePhone = "DELETE FROM phones WHERE locationId = $this->id";
            $phoneStmt = $this->conn->prepare($deletePhone);
            $phoneStmt->execute();

            $deleteUrl = "DELETE FROM urls WHERE locationId = $this->id";
            $urlStmt = $this->conn->prepare($deleteUrl);
            $urlStmt->execute();

            $deleteVideo = "DELETE FROM videos WHERE locationId = $this->id";
            $videoStmt = $this->conn->prepare($deleteVideo);
            $videoStmt->execute();

            $deleteKeywords = "DELETE FROM keywords WHERE locationId = $this->id";
            $keywordStmt = $this->conn->prepare($deleteKeywords);
            $keywordStmt->execute();

            $deleteSpecialities = "DELETE FROM specialities WHERE locationId = $this->id";
            $specialityStmt = $this->conn->prepare($deleteSpecialities);
            $specialityStmt->execute();

            $deleteBrands = "DELETE FROM brands WHERE locationId = $this->id";
            $brandStmt = $this->conn->prepare($deleteBrands);
            $brandStmt->execute();

            $deleteProducts = "DELETE FROM products WHERE locationId = $this->id";
            $productStmt = $this->conn->prepare($deleteProducts);
            $productStmt->execute();

            $deleteAssociations = "DELETE FROM associations WHERE locationId = $this->id";
            $associationStmt = $this->conn->prepare($deleteAssociations);
            $associationStmt->execute();

            $deleteLanguages = "DELETE FROM languages WHERE locationId = $this->id";
            $languageStmt = $this->conn->prepare($deleteLanguages);
            $languageStmt->execute();

            $deleteMondays = "DELETE FROM monday WHERE locationId = $this->id";
            $mondayStmt = $this->conn->prepare($deleteMondays);
            $mondayStmt->execute();

            $deleteTuesdays = "DELETE FROM tuesday WHERE locationId = $this->id";
            $tuesdayStmt = $this->conn->prepare($deleteTuesdays);
            $tuesdayStmt->execute();

            $deleteWednesdays = "DELETE FROM wednesday WHERE locationId = $this->id";
            $wednesdayStmt = $this->conn->prepare($deleteWednesdays);
            $wednesdayStmt->execute();

            $deleteThursdays = "DELETE FROM thursday WHERE locationId = $this->id";
            $thursdayStmt = $this->conn->prepare($deleteThursdays);
            $thursdayStmt->execute();

            $deleteFridays = "DELETE FROM friday WHERE locationId = $this->id";
            $fridayStmt = $this->conn->prepare($deleteFridays);
            $fridayStmt->execute();

            $deleteSaturdays = "DELETE FROM saturday WHERE locationId = $this->id";
            $saturdayStmt = $this->conn->prepare($deleteSaturdays);
            $saturdayStmt->execute();

            $deleteSundays = "DELETE FROM sunday WHERE locationId = $this->id";
            $sundayStmt = $this->conn->prepare($deleteSundays);
            $sundayStmt->execute();

            $deleteServices = "DELETE FROM services WHERE locationId = $this->id";
            $serviceStmt = $this->conn->prepare($deleteServices);
            $serviceStmt->execute();
        }
        $count = $stmt->rowCount();
            if ($count > 0) {
                http_response_code(200);
                echo json_encode(array(
                    "message" => "The CANCEL operation was committed to durable storage.",
                    "id" => $this->id
                ));
            } else {
                http_response_code(404);
                echo json_encode(array("issue" => "The requested listing does not exist on your site."));
            }
        return false;
    }
//////////////// END OF DELETE THE EXISTING LISTINGS ////////////////////
}
