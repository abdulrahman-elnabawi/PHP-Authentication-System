<?php

header("Content-Type: application/json");

require_once __DIR__ . "/../middleware/authmiddleware.php";

$user = verifyToken();

echo json_encode([
    "status" => "success",
    "user" => $user
]);