<?php

function sendResponse($statusCode, $data): void
{
    header("Content-type:application/json");
    http_response_code($statusCode);
    echo json_encode($data);
}