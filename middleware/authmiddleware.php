<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../config/jwt.php";

function verifyToken() {

    header("Content-Type: application/json");

    global $secret_key;

    $headers = getallheaders();

    if (!isset($headers['Authorization'])) {
        echo json_encode([
            "status" => "error",
            "message" => "Token required"
        ]);
        exit;
    }

    $token = str_replace("Bearer ", "", $headers['Authorization']);

    try {
        $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));

        return $decoded->data;

    } catch (Exception $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Invalid or expired token"
        ]);
        exit;
    }
}