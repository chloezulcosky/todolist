<?php
require_once 'TaskService.php';

$CORS_ORIGIN_ALLOWED = "http://localhost:4200";
function applyCorsHeaders()
{
    global $CORS_ORIGIN_ALLOWED;
    header("Access-Control-Allow-Origin: {$CORS_ORIGIN_ALLOWED}");
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Accept');
}

applyCorsHeaders();
$taskServ = new TaskService();
$taskServ->createDbObj();
$request = $_SERVER['REQUEST_METHOD'];

switch($request) {
    case 'GET':
        header('Content-type: application/json');
        echo json_encode($taskServ->displayTable());
        break;

    case 'DELETE':
        $url = $_SERVER['REQUEST_URI'];
        $id = substr(parse_url($url, PHP_URL_PATH), 1);
        $taskServ->deleteTask($id);
        http_response_code(204);
        break;

    case 'PUT':
        $url = $_SERVER['REQUEST_URI'];
        $id = substr(parse_url($url, PHP_URL_PATH), 1);
        $taskServ->updateTask($id);
        http_response_code(204);
        break;

    case 'POST':
        $json = json_decode(file_get_contents('php://input'), TRUE);
        $taskServ->addTask($json['tName'], $json['tDescription']);
        http_response_code(204);
        break;
}
?>


