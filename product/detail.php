<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Product($db);

// get product id
$data = json_decode(file_get_contents("php://input"));
$id=isset($_GET["id"]) ? $_GET["id"] : "";
// set product id to be deleted
$product->id = $id;

// print_r($product->id); die();

if (empty($product->id)){
    http_response_code(400);
    echo json_encode(array("issues" => [
        "description" => "Malformed request sent.",
        "errorCode" => "400",
        "issue" => "No id Provided"
    ]));
    die();
}

// read products will be here
// query products
$stmt = $product->readOne($product->id);
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
    $location_arr=array();
    $location_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        // Categories
        $categoryStmt = $product->readCategories($locationId);
        $categoryCount = $categoryStmt->rowCount();
        $category_arr=array();
        if ($categoryCount > 0) {
            while ($categoryRow = $categoryStmt->fetch(PDO::FETCH_ASSOC)){
                extract($categoryRow);
                $category_arr[] = [
                    "name" => $categoriesName,
                    "id" => $categoryID
                ];
            }
        }

        // Emails
        $emailStmt = $product->readEmails($locationId);
        $emailCount = $emailStmt->rowCount();
        $email_arr=array();
        if ($emailCount > 0) {
            while ($emailRow = $emailStmt->fetch(PDO::FETCH_ASSOC)){
                extract($emailRow);
                $email_arr[] = [
                    "address" => $emailsAddress,
                    "description" => $emailsDescription
                    ];
            }
        }

        // Phones
        $phoneStmt = $product->readPhones($locationId);
        $phoneCount = $phoneStmt->rowCount();
        $phone_arr=array();
        if ($phoneCount > 0) {
            while ($phoneRow = $phoneStmt->fetch(PDO::FETCH_ASSOC)){
                extract($phoneRow);
                $phone_arr[] = [
                    "number" => array(
                        "number" => $numbers,
                        "countryCode" => $phonesCountryCode
                    ),
                    "description" => $phonesDescription,
                    "type" => $phonesType
                    ];
            }
        }
    
        // Images
        $imageStmt = $product->readImages($locationId);
        $imageCount = $imageStmt->rowCount();
        $image_arr=array();
        if ($imageCount > 0) {
            while ($imageRow = $imageStmt->fetch(PDO::FETCH_ASSOC)){
                extract($imageRow);
                $image_arr[] = [
                    "width" => $width,
                    "type" => $imagesType,
                    "url" => $imagesUrl,
                    "height" => $height
                ];
            }
        }
            
        // Videos
        $videoStmt = $product->readVideos($locationId);
        $videoCount = $videoStmt->rowCount();
        $video_arr=array();
        if ($videoCount > 0) {
            while ($videoRow = $videoStmt->fetch(PDO::FETCH_ASSOC)){
                extract($videoRow);
                $video_arr[] = [
                    "url" => $videosUrl,
                    "description" => $videosDescription
                ];
            }
        }

        // Urls
        $urlStmt = $product->readUrls($locationId);
        $urlCount = $urlStmt->rowCount();
        $url_arr=array();
        if ($urlCount > 0) {
            while ($urlRow = $urlStmt->fetch(PDO::FETCH_ASSOC)){
                extract($urlRow);
                $url_arr[] = [
                    "displayUrl" => $displayUrl,
                    "description" => $urlsDescription,
                    "type" => $urlsType,
                    "url" => $urls
                ];
            }
        }

        // List
        $listStmt = $product->readLists($locationId);
        $listCount = $listStmt->rowCount();
        $list_arr=array();
        if ($listCount > 0) {
            while ($listRow = $listStmt->fetch(PDO::FETCH_ASSOC)){
                extract($listRow);
                $list_arr[] = [
                    "name" => $listsName,
                    "description" => $listsDescription,
                    "id" => $listsId,
                    "type" => $listsType
                ];
            }
        }
        
        // Keywords
        $keywordStmt = $product->readKeywords($locationId);
        $keywordCount = $keywordStmt->rowCount();
        $keyword_arr=array();
        if ($keywordCount > 0) {
            while ($keywordRow = $keywordStmt->fetch(PDO::FETCH_ASSOC)){
                extract($keywordRow);
                $keyword_arr[] = $keywordsName;
            }
        }

        // specialities
        $specialityStmt = $product->readSpecialities($locationId);
        $specialityCount = $specialityStmt->rowCount();
        $speciality_arr=array();
        if ($specialityCount > 0) {
            while ($specialityRow = $specialityStmt->fetch(PDO::FETCH_ASSOC)){
                extract($specialityRow);
                $speciality_arr[] = $specialitiesName;
            }
        }

        // brands
        $brandStmt = $product->readBrands($locationId);
        $brandCount = $brandStmt->rowCount();
        $brand_arr=array();
        if ($brandCount > 0) {
            while ($brandRow = $brandStmt->fetch(PDO::FETCH_ASSOC)){
                extract($brandRow);
                $brand_arr[] = $brandsName;
            }
        }

        // Payments
        $paymentStmt = $product->readPaymentOptions($locationId);
        $paymentCount = $paymentStmt->rowCount();
        $payment_arr=array();
        if ($paymentCount > 0) {
            while ($paymentRow = $paymentStmt->fetch(PDO::FETCH_ASSOC)){
                extract($paymentRow);
                $payment_arr[] = $paymentOptionsName;
            }
        }

        // products
        $productStmt = $product->readProducts($locationId);
        $productCount = $productStmt->rowCount();
        $product_arr=array();
        if ($productCount > 0) {
            while ($productRow = $productStmt->fetch(PDO::FETCH_ASSOC)){
                extract($productRow);
                $product_arr[] = $productsName;
            }
        }

        // associations
        $associationStmt = $product->readAssociations($locationId);
        $associationCount = $associationStmt->rowCount();
        $association_arr=array();
        if ($associationCount > 0) {
            while ($associationRow = $associationStmt->fetch(PDO::FETCH_ASSOC)){
                extract($associationRow);
                $association_arr[] = $associationsName;
            }
        }

        // languages
        $languageStmt = $product->readLanguages($locationId);
        $languagesCount = $languageStmt->rowCount();
        $language_arr=array();
        if ($languagesCount > 0) {
            while ($languageRow = $languageStmt->fetch(PDO::FETCH_ASSOC)){
                extract($languageRow);
                $language_arr[] = $languagesName;
            }
        }

        // monday
        $mondayStmt = $product->readMonday($locationId);
        $intervalCount = $mondayStmt->rowCount();
        $monday_arr=array();
        if ($intervalCount > 0) {
            while ($intervalRow = $mondayStmt->fetch(PDO::FETCH_ASSOC)){
                extract($intervalRow);
                $monday_arr[] =  [
                    "starts" => $starts,
                    "ends" => $ends,
                ];
            }
        }

        // tuesday
        $tuesdayStmt = $product->readTuesday($locationId);
        $intervalCount = $tuesdayStmt->rowCount();
        $tuesday_arr=array();
        if ($intervalCount > 0) {
            while ($intervalRow = $tuesdayStmt->fetch(PDO::FETCH_ASSOC)){
                extract($intervalRow);
                $tuesday_arr[] =  [
                    "starts" => $starts,
                    "ends" => $ends,
                ];
            }
        }

        // wednesday
        $wednesdayStmt = $product->readWednesday($locationId);
        $intervalCount = $wednesdayStmt->rowCount();
        $wednesday_arr=array();
        if ($intervalCount > 0) {
            while ($intervalRow = $wednesdayStmt->fetch(PDO::FETCH_ASSOC)){
                extract($intervalRow);
                $wednesday_arr[] =  [
                    "starts" => $starts,
                    "ends" => $ends,
                ];
            }
        }

        // thursday
        $thursdayStmt = $product->readThursday($locationId);
        $intervalCount = $thursdayStmt->rowCount();
        $thursday_arr=array();
        if ($intervalCount > 0) {
            while ($intervalRow = $thursdayStmt->fetch(PDO::FETCH_ASSOC)){
                extract($intervalRow);
                $thursday_arr[] =  [
                    "starts" => $starts,
                    "ends" => $ends,
                ];
            }
        }

        // friday
        $fridayStmt = $product->readFriday($locationId);
        $intervalCount = $fridayStmt->rowCount();
        $friday_arr=array();
        if ($intervalCount > 0) {
            while ($intervalRow = $fridayStmt->fetch(PDO::FETCH_ASSOC)){
                extract($intervalRow);
                $friday_arr[] =  [
                    "starts" => $starts,
                    "ends" => $ends,
                ];
            }
        }

        // saturday
        $saturdayStmt = $product->readSaturday($locationId);
        $intervalCount = $saturdayStmt->rowCount();
        $saturday_arr=array();
        if ($intervalCount > 0) {
            while ($intervalRow = $saturdayStmt->fetch(PDO::FETCH_ASSOC)){
                extract($intervalRow);
                $saturday_arr[] =  [
                    "starts" => $starts,
                    "ends" => $ends,
                ];
            }
        }

        // sunday
        $sundayStmt = $product->readSunday($locationId);
        $intervalCount = $sundayStmt->rowCount();
        $sunday_arr=array();
        if ($intervalCount > 0) {
            while ($intervalRow = $sundayStmt->fetch(PDO::FETCH_ASSOC)){
                extract($intervalRow);
                $sunday_arr[] =  [
                    "starts" => $starts,
                    "ends" => $ends,
                ];
            }
        }

        // services
        $serviceStmt = $product->readServices($locationId);
        $servicesCount = $serviceStmt->rowCount();
        $services_arr=array();
        if ($servicesCount > 0) {
            while ($servicesRow = $serviceStmt->fetch(PDO::FETCH_ASSOC)){
                extract($servicesRow);
                $services_arr[] = $servicesName;
            }
        }

        // Reviews Count
        $reviewCountStmt = $product->readReview($locationId);
        $reviewsCount = $reviewCountStmt->rowCount();

        // Review Average
        $reviewAvgStmt = $product->reviewsAvg($locationId);
        $reviewAvgCount = $reviewAvgStmt->rowCount();

        if ($reviewAvgCount > 0) {
            while ($reviewAvgRow = $reviewAvgStmt->fetch(PDO::FETCH_ASSOC)){
                $avgRating = round($reviewAvgRow['avgTotal'],2);
            }
        }

        // main Array
        $location_item=array(
            "partnerID" => $locationId,
            "yextID" => $yextID,
            // "partnerID" => $partnerID,
            "status" => $status, 
            "name" => $name, 
            "address" => array(
                "address" => $address, 
                "visible" => $visible, 
                "address2" => $address2, 
                "city" => $city, 
                "displayAddress" => $displayAddress, 
                "countryCode" => $countryCode,
                "postalCode" => $postalCode,
                "state" => $state
            ),
            "phones" => $phone_arr,
            "categories" => $category_arr,
            "description" => $description,
            "emails" => $email_arr,
            "geoData" => array(
                "displayLatitude" => $displayLatitude,
                "displayLongitude" => $displayLongitude,
                "routableLatitude" => $routableLatitude,
                "routableLongitude" => $routableLongitude
            ),
            "hours" => array(
                array(
                    "day" => "MONDAY",
                    "intervals" => $monday_arr
                ),
                array(
                    "day" => "TUESDAY",
                    "intervals" => $tuesday_arr
                ),
                array(
                    "day" => "WEDNESDAY",
                    "intervals" => $wednesday_arr
                ),
                array(
                    "day" => "THURSDAY",
                    "intervals" => $thursday_arr
                ),
                array(
                    "day" => "FRIDAY",
                    "intervals" => $friday_arr
                ),
                array(
                    "day" => "SATURDAY",
                    "intervals" => $saturday_arr
                ),
                array(
                    "day" => "SUNDAY",
                    "intervals" => $sunday_arr
                ),
            ),
            "hoursText" => array(
                "display" => $hoursDisplayText
            ),
            "images" => $image_arr,
            "videos" => $video_arr,
            "specialOffer" => array(
                "message" => $specialOfferMessage,
                "url" => $specialOfferUrl,
            ),
            "paymentOptions" => $payment_arr,
            "urls" => $url_arr,
            "rating" => $avgRating,
            "total_reviews" => $reviewsCount,
            "twitterHandle" => $twitterHandle,
            "facebookPageUrl" => $facebookPageUrl,
            "attribution" => array(
                "image" => array(
                    "width" => $attributionImageWidth,
                    "description" => $attributionImageDescription,
                    "url" => $attributionImageUrl,
                    "height" => $attributionImageHeight,
                ),
                "attributionUrl" => $attributionUrl
            ),
            "keywords" => $keyword_arr,
            "lists" => $list_arr,
            "closed" => $closed,
            "specialities" => $speciality_arr,
            "brands" => $brand_arr,
            "products" => $product_arr,
            "services" => $services_arr,
            "yearEstablished" => $yearEstablished,
            "associations" => $association_arr,
            "languages" => $language_arr
        );
        array_push($location_arr["records"], $location_item);
    }
    http_response_code(200);
    echo json_encode($location_arr);
}

// No Locations Found
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No locations found.")
    );
}