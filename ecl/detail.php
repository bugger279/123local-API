<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/ecl.php';
 
$database = new Database();
$db = $database->getConnection();
$ecl = new Ecl($db);

$id=isset($_GET["id"]) ? $_GET["id"] : "";
$ecl->listsId = $id;

if (empty($ecl->listsId)){
    http_response_code(400);
    echo json_encode(array("issues" => [
        "description" => "Malformed request sent.",
        "errorCode" => "400",
        "issue" => "No id Provided"
        ]));
    die();
}

// Fetch Lists by Id
$eclStmt = $ecl->fetchListsById($ecl->listsId);
$eclCount = $eclStmt->rowCount();

if ($eclCount > 0) {
    while ($eclRow = $eclStmt->fetch(PDO::FETCH_ASSOC)){
        // extract Lists
        extract($eclRow);

        $sectionStmt = $ecl->fetchSectionOfList($ecl->listsId);
        $sectionCount = $sectionStmt->rowCount();
        $section_arr=array();

        if ($sectionCount > 0) {
            if ($listsType === "MENUS" || $listsType === "MENU") {
                // lists Type is MENU ITEM 
                while ($sectionRow = $sectionStmt->fetch(PDO::FETCH_ASSOC)) {
                    // Extract Sections
                    extract($sectionRow);
                    $itemsStmt = $ecl->fetchMenuItemsOfSection($sectionId);
                    $itemsCount = $itemsStmt->rowCount();
                    $items_arr=array();
    
                    if ($itemsCount > 0) {
                        while ($itemsRow = $itemsStmt->fetch(PDO::FETCH_ASSOC)){
                            // Extract Items
                            extract($itemsRow);
    
                            $costsStmt = $ecl->fetchCostsOfMenuItems($menuItemsId);
                            $costsCount = $costsStmt->rowCount();
                            $costs_arr=array();
    
                            if ($costsCount > 0) {
                                while ($costsRow = $costsStmt->fetch(PDO::FETCH_ASSOC)){
                                    // Extract Costs
                                    extract($costsRow);
    
                                    $optionsStmt = $ecl->fetchMenuOptionsOfCosts($menuItemsCostId);
                                    $optionsCount = $optionsStmt->rowCount();
                                    $options_arr=array();
                                    $counter = 0;
                                    if ($optionsCount > 0) {
                                        while ($optionsRow = $optionsStmt->fetch(PDO::FETCH_ASSOC)){
                                            $counter++;
                                            // Extract Cost Options
                                            extract($optionsRow);
    
                                            $options_arr[] = [
                                                "name" => $costOptionName,
                                                "price" => $costOptionPrice,
                                                "calorie" => $costOptionCalorie
                                            ];
                                        }
                                    }
    
                                    $costs_arr[] = [
                                        "type" => $menuItemsCostType,
                                        "price" => $menuItemsCostPrice,
                                        "unit" => $menuItemsCostUnit,
                                        "rangeTo" => $menuItemsCostRangeTo,
                                        "other" => $menuItemsCostOther,
                                        "options" => $options_arr
                                    ];
                                }
                            }

                            $items_arr[] = [
                                "name" => $menuItemsName,
                                "costs" => $costs_arr,
                                "description" => $menuItemsDescription,
                                "photo" => array(
                                    "url" => $menuItemsPhotoUrl,
                                    "height" => $menuItemsPhotoHeight,
                                    "width" => $menuItemsPhotoWidth
                                ),
                                "calories" => array(
                                    "type" => $menuItemsCaloriesType,
                                    "calorie" => $menuItemsCalories,
                                    "rangeTo" => $menuItemsRangeTo
                                )
                            ];
                        }
                    }
                
                    $section_arr[] = [
                        "sectionID" => $sectionId,
                        "listsID" => $listsId,
                        "name" => $sectionName,
                        "description" => $sectionDescription,
                        "items" => $items_arr
                    ];
                }
            } elseif ($listsType === "BIOS" || $listsType === "BIO") {
                // Lists Type id BIO ITEMS
                while ($sectionRow = $sectionStmt->fetch(PDO::FETCH_ASSOC)) {
                    // Extract Sections
                    extract($sectionRow);
                    $bioStmt = $ecl->fetchBioItemsOfSection($sectionId);
                    $biosCount = $bioStmt->rowCount();
                    $items_arr=array();
    
                    if ($biosCount > 0) {
                        while ($itemsRow = $bioStmt->fetch(PDO::FETCH_ASSOC)){
                            // Extract Items
                            extract($itemsRow);
                            // Fetch Certificate
                            $certificationsStmt = $ecl->fetchCertificationsOfBioItems($bioItemsId);
                            $certificationsCount = $certificationsStmt->rowCount();
                            $certification_arr=array();

                            if ($certificationsCount > 0) {
                                while ($certificationRow = $certificationsStmt->fetch(PDO::FETCH_ASSOC)){
                                    // Extract Costs
                                    extract($certificationRow);
                                    $certification_arr[] = $bioItemsCertificationName;
                                }
                            }

                            // Fetch Educations
                            $educationsStmt = $ecl->fetchEducationsOfBioItems($bioItemsId);
                            $educationsCount = $educationsStmt->rowCount();
                            $education_arr=array();

                            if ($educationsCount > 0) {
                                while ($educationRow = $educationsStmt->fetch(PDO::FETCH_ASSOC)){
                                    // Extract Costs
                                    extract($educationRow);

                                    $education_arr[] = $bioItemsEducationName;
                                }
                            }

                            // Fetch Services
                            $servicesStmt = $ecl->fetchServicesOfBioItems($bioItemsId);
                            $servicesCount = $servicesStmt->rowCount();
                            $services_arr=array();

                            if ($servicesCount > 0) {
                                while ($serviceRow = $servicesStmt->fetch(PDO::FETCH_ASSOC)){
                                    // Extract Costs
                                    extract($serviceRow);

                                    $services_arr[] = $bioItemsServiceName;
                                }
                            }

                            $items_arr[] = [
                                "name" => $bioItemsName,
                                "title" => $bioItemsTitle,
                                "description" => $bioItemsDescription,
                                "photo" => array(
                                    "url" => $bioItemsPhotoUrl,
                                    "height" => $bioItemsPhotoHeight,
                                    "width" => $bioItemsPhotoWidth
                                ),
                                "education" => $education_arr,
                                "certifications" => $certification_arr,
                                "services" => $services_arr,
                                "url" => $bioItemsUrl
                            ];
                        }
                    }
                
                    $section_arr[] = [
                        "sectionID" => $sectionId,
                        "listsID" => $listsId,
                        "name" => $sectionName,
                        "description" => $sectionDescription,
                        "items" => $items_arr
                    ];
                }
            } elseif ($listsType === "PRODUCTS" || $listsType === "PRODUCT") {
                // Lists Type is PRODUCT ITEMS
                while ($sectionRow = $sectionStmt->fetch(PDO::FETCH_ASSOC)) {
                    // Extract Sections
                    extract($sectionRow);
                    $productsStmt = $ecl->fetchProductItemsOfSection($sectionId);
                    $productsCount = $productsStmt->rowCount();
                    $items_arr=array();
    
                    if ($productsCount > 0) {
                        while ($productsRow = $productsStmt->fetch(PDO::FETCH_ASSOC)){
                            // Extract Items
                            extract($productsRow);

                            $costsStmt = $ecl->fetchCostsOfProductItems($serviceItemsId);
                            $costsCount = $costsStmt->rowCount();
                            $costs_arr=array();
    
                            if ($costsCount > 0) {
                                while ($costsRow = $costsStmt->fetch(PDO::FETCH_ASSOC)){
                                    // Extract Costs
                                    extract($costsRow);

                                    $optionsStmt = $ecl->fetchProductOptionsOfCosts($serviceItemsCostId);
                                    $optionsCount = $optionsStmt->rowCount();
                                    $options_arr=array();
                                    if ($optionsCount > 0) {
                                        while ($optionsRow = $optionsStmt->fetch(PDO::FETCH_ASSOC)){
                                            // Extract Cost Options
                                            extract($optionsRow);
                                            $options_arr[] = [
                                                "name" => $costOptionName,
                                                "price" => $costOptionPrice,
                                                "calorie" => $costOptionCalorie
                                            ];
                                        }
                                    }
    
                                    $costs_arr[] = [
                                        "type" => $serviceItemsCostType,
                                        "price" => $serviceItemsCostPrice,
                                        "unit" => $serviceItemsCostUnit,
                                        "rangeTo" => $serviceItemsCostRangeTo,
                                        "other" => $serviceItemsCostOther,
                                        "options" => $options_arr
                                    ];
                                }
                            }

                            $eventPhotosStmt = $ecl->fetchPhotosOfProductItems($serviceItemsId);
                            $eventPhotosCount = $eventPhotosStmt->rowCount();
                            $eventPhotos_arr=array();

                            if ($eventPhotosCount > 0) {
                                while ($eventPhotosRow = $eventPhotosStmt->fetch(PDO::FETCH_ASSOC)){
                                    // Extract Costs
                                    extract($eventPhotosRow);
                                    $eventPhotos_arr[] = array(
                                        "url" => $serviceItemsPhotoUrl,
                                        "height" => $serviceItemsPhotoHeight,
                                        "width" => $serviceItemsPhotoWidth
                                    );
                                }
                            }

                            $items_arr[] = [
                                "name" => $serviceItemsName,
                                "description" => $serviceItemsDescription,
                                "costs" => $costs_arr,
                                "photo" => $eventPhotos_arr,
                                "videos" => $serviceItemsVideoUrl,
                                "url" => $serviceItemsUrl
                            ];
                        }
                    }
                
                    $section_arr[] = [
                        "sectionID" => $sectionId,
                        "listsID" => $listsId,
                        "name" => $sectionName,
                        "description" => $sectionDescription,
                        "items" => $items_arr
                    ];
                }
            } elseif ($listsType === "EVENTS" || $listsType === "EVENT") {
                // Lists Type is EVENTS ITEMS
                while ($sectionRow = $sectionStmt->fetch(PDO::FETCH_ASSOC)) {
                    // Extract Sections
                    extract($sectionRow);
                    $eventsStmt = $ecl->fetchEventsItemsOfSection($sectionId);
                    $eventsCount = $eventsStmt->rowCount();
                    $events_arr=array();

                    if ($eventsCount > 0) {
                        while ($itemsRow = $eventsStmt->fetch(PDO::FETCH_ASSOC)){
                            // Extract Items
                            extract($itemsRow);
                            // Fetch Photos
                            $eventPhotosStmt = $ecl->fetchPhotosOfEventsItems($eventsItemsId);
                            $eventPhotosCount = $eventPhotosStmt->rowCount();
                            $eventPhotos_arr=array();
                            
                            if ($eventPhotosCount > 0) {
                                while ($eventPhotosRow = $eventPhotosStmt->fetch(PDO::FETCH_ASSOC)){
                                    // Extract Costs
                                    extract($eventPhotosRow);
                                    $eventPhotos_arr[] = array(
                                        "url" => $eventsItemsPhotoUrl,
                                        "height" => $eventsItemsPhotoHeight,
                                        "width" => $eventsItemsPhotoWidth
                                    );
                                }
                            }
                            
                            $events_arr[] = [
                                "type" => $eventsItemsType,
                                "name" => $eventsItemsName,
                                "starts" => $eventItemsStarts,
                                "ends" => $eventItemsEnds,
                                "description" => $eventItemsDescription,
                                "starts" => $eventItemsStarts,
                                "photos" => $eventPhotos_arr,
                                "video" => $eventItemsVideo,
                                "url" => $eventItemsUrl
                            ];
                        }
                    }
                
                    $section_arr[] = [
                        "sectionID" => $sectionId,
                        "listsID" => $listsId,
                        "name" => $sectionName,
                        "description" => $sectionDescription,
                        "items" => $events_arr
                    ];
                }
            }
        }


        $lists_arr=array();
        $lists_arr[] = [
            "id" => $listsId,
            "name" => $listsName,
            "description" => $listsDescription,
            "type" => $listsType,
            "sections" => $section_arr
        ];

        $ecl_arr = [
            "lists" => $lists_arr
        ];
    }
    http_response_code(200);
    echo json_encode($ecl_arr);
}

// No Reviews Found
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No Lists found.")
    );
}