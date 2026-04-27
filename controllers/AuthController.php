<?php
use Firebase\JWT\JWT;
require_once __DIR__ . "/../vendor/autoload.php";
header("Content-Type: application/json");
class AuthController {

    private $user;

    public function __construct($userModel) {
        $this->user = $userModel;
    }

  public function login($data) {

    if (empty($data['email']) || empty($data['password'])) {
        echo json_encode(["status"=>"error","message"=>"Email & password required"]);
        exit;
    }

    $user = $this->user->findByEmail($data['email']);

    if (!$user) {
        echo json_encode(["status"=>"error","message"=>"User not found"]);
        exit;
    }

    if (!password_verify(trim($data['password']), $user['password'])) {
        echo json_encode(["status"=>"error","message"=>"Wrong password"]);
        exit;
    }

  require_once __DIR__ . "/../config/jwt.php";

if (!$secret_key) {
    echo json_encode(["status"=>"error","message"=>"Server error"]);
    exit;
}

$payload = [
    "iss" => $issuer,
    "aud" => $audience,
    "iat" => $issued_at,
    "exp" => $expiration_time,
    "data" => [
        "id" => $user['id'],
        "email" => $user['email'],
        "name" => $user['name']
    ]
];


$jwt = JWT::encode($payload, $secret_key, 'HS256');
    echo json_encode([
        "status" => "success",
        "token" => $jwt
    ]);

}    public function register($data) {
    if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
        echo json_encode(["status"=>"error","message"=>"All fields required"]);
        exit;
    }

    if ($this->user->findByEmail($data['email'])) {
        echo json_encode(["status"=>"error","message"=>"Email exists"]);
        exit;
    }

    $hashed = password_hash($data['password'], PASSWORD_DEFAULT);

    if ($this->user->create($data['name'], $data['email'], $hashed)) {
        echo json_encode(["status"=>"success","message"=>"User created"]);
        exit;
    }

    echo json_encode(["status"=>"error","message"=>"Failed"]);
}
}