<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';
include_once '../objects/ecl.php';

$database = new Database();
$db = $database->getConnection();
$ecl = new Ecl($db);
$data = json_decode(file_get_contents("php://input"));

$id=isset($_GET["id"]) ? $_GET["id"] : "";

$field_data = array( "listsId" => $id);
foreach($field_data as $key => $val) {
    if (empty($val)) {
        // set response code - 400 bad request
        http_response_code(400);
        // tell the user
        echo json_encode(array("issues" => [
        "description" => "Unable to create ECL. Data is incomplete.",
        "errorCode" => "400",
        "issue" => "$key is empty"
        ]));
        die();
    }
}

$queryForId = "SELECT * FROM lists WHERE listsId = $id";
$stmt = $database->conn->prepare($queryForId);
$stmt->execute();
$count = $stmt->rowCount();

while ($listRow = $stmt->fetch(PDO::FETCH_ASSOC)){
    // Extract Costs
    extract($listRow);
    $ecl->listsType = $listsType;
}
if ($count <= 0) {
    http_response_code(404);
    echo json_encode(array(
        "issues" => [
            "description" => "No Such list",
            "errorCode" => "404",
            "issue" => "No ECL created."
        ]
    ));
    die();
}

// make sure data is not empty
if(
    !empty($id)
){
    // set product property values
    $ecl->listsId = $id;
    $ecl->sectionName = $data->name;
    $ecl->sectionDescription = $data->description;
    $ecl->items = $data->items;

    // Execute Create Review
    $ecl->createSection();
}

?>
