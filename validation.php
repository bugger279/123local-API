<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded; charset=UTF-8");
header("Content-Type: application/json; charset=UTF-8");

// $headers = apache_request_headers();
// $keyAPI = $headers['key'];

// if (!function_exists('getallheaders')) {
//     function getallheaders() {
//         $headers = [];
//         foreach ($_SERVER as $name => $value) {
//             if (substr($name, 0, 5) == 'HTTP_') {
//                 $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
//             }
//         }
//         return $headers;
//     }
// }

function getRequestHeaders() {
    $headers = array();
    foreach($_SERVER as $key => $value) {
        if (substr($key, 0, 5) <> 'HTTP_') {
            continue;
        }
        $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
        $headers[$header] = $value;
    }
    return $headers;
}
$headerKey = array();
$headerKey = getRequestHeaders();
// echo $headerKey['Key'];
// die();

$headers = getRequestHeaders();
$keyAPI = $headers['Key'];
// echo $keyAPI;

$authKey = "ieurtjkosakwehua1457821244amsnashjad";
if ($authKey === $keyAPI) {
    return 1;
} else {
    http_response_code(400);
    echo json_encode(
        array("message" => "Key doesn't Match")
    );
    die();
}

// $allow = array("13.114.169.137", "18.182.102.71", "18.209.187.112", "18.210.165.248", "34.192.213.24", "35.168.5.96", "38.122.228.136/29", "38.140.166.48/29", "52.6.217.131", "52.194.116.21", "52.204.2.163", "52.72.86.153", "54.208.79.152", "54.208.187.51", "69.25.87.0/24", "70.42.219.0/24", "98.191.214.83", "98.191.214.84/31", "107.23.146.193", "149.11.140.96/29", "152.179.207.6", "206.71.246.50", "206.71.250.80/29", "202.124.144.66", "202.124.144.228");
// if (!in_array ($_SERVER['REMOTE_ADDR'], $allow)) {
//    header("location: noaccess.php");
//    exit();
// }

?>