<?php

use Nhmnazmul\UsersManagment\controller\UserController;

$requestUrl = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$requestMethod = strtoupper($_SERVER["REQUEST_METHOD"]);


$userController = new UserController();


if ($requestUrl === "/") {
    switch ($requestMethod) {
        case "GET":
            sendResponse(200, ["success" => true, "message" => "Server is alive!"]);
            break;
        default:
            sendResponse(405, ["success" => false, "message" => "Method not allowed"]);
            break;
    }
} elseif ($requestUrl === "/api/users") {
    switch ($requestMethod) {
        case "GET":
            $userController->getAllUser();
            break;
        case "POST":
        default:
            sendResponse(405, ["success" => false, "message" => "Method not allowed"]);
            break;
    }
}


