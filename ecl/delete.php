<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../config/database.php';
include_once '../objects/ecl.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$ecl = new Ecl($db);

// get product id
$data = json_decode(file_get_contents("php://input"));
$id=isset($_GET["id"]) ? $_GET["id"] : "";
$ecl->sectionId = $id;

// Count if row exists or not
$queryForId = "SELECT * FROM sections WHERE sectionId = $ecl->sectionId";
$stmt = $database->conn->prepare($queryForId);
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    while ($listRow = $stmt->fetch(PDO::FETCH_ASSOC)){
        // Extract Costs
        extract($listRow);
        $ecl->sectionId = $sectionId;
        $ecl->listsId = $listsId;
    
        $queryForId = "SELECT * FROM lists WHERE listsId = $ecl->listsId";
        $stmtLists = $database->conn->prepare($queryForId);
        $stmtLists->execute();
        while ($listsRow = $stmtLists->fetch(PDO::FETCH_ASSOC)){
            extract($listsRow);
            $ecl->listsType = $listsType;
        }
    }
} else {
    http_response_code(404);
    echo json_encode(array("issue" => "The requested list section does not exist on your site."));
}

if (empty($ecl->sectionId)){
    http_response_code(400);
    echo json_encode(array("issues" => [
        "description" => "Malformed request sent.",
        "errorCode" => "400",
        "issue" => "No id Provided"
        ]));
    die();
} else {
    $ecl->deleteSection();
}
?>