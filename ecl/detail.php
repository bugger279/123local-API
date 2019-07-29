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
            while ($sectionRow = $sectionStmt->fetch(PDO::FETCH_ASSOC)) {
                // Extract Sections
                extract($sectionRow);

                $itemsStmt = $ecl->fetchItemsOfSection($sectionId);
                $itemsCount = $itemsStmt->rowCount();
                $items_arr=array();

                if ($itemsCount > 0) {
                    while ($itemsRow = $itemsStmt->fetch(PDO::FETCH_ASSOC)){
                        // Extract Items
                        extract($itemsRow);

                        $costsStmt = $ecl->fetchCostsOfItems($menuItemsId);
                        $costsCount = $costsStmt->rowCount();
                        $costs_arr=array();

                        if ($costsCount > 0) {
                            while ($costsRow = $costsStmt->fetch(PDO::FETCH_ASSOC)){
                                // Extract Costs
                                extract($costsRow);

                                $optionsStmt = $ecl->fetchOptionsOfCosts($menuItemsCostId);
                                $optionsCount = $optionsStmt->rowCount();
                                $options_arr=array();
                                $counter = 0;
                                if ($optionsCount > 0) {
                                    while ($optionsRow = $optionsStmt->fetch(PDO::FETCH_ASSOC)){
                                        $counter++;
                                        // Extract Cost Options
                                        extract($optionsRow);

                                        $options_arr[] = [
                                            "counter" => $counter,
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
                    "sectionName" => $sectionName,
                    "sectionDescription" => $sectionDescription,
                    "items" => $items_arr
                ];
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