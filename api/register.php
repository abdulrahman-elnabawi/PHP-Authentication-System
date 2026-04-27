<?php
header("Content-Type: application/json");

require_once __DIR__ . "/../config/db.php";
require_once __DIR__ . "/../models/User.php";           
require_once __DIR__ . "/../controllers/AuthController.php";

$db = (new Database())->connect();

$user = new User($db);                                
$auth = new AuthController($user);

$data = json_decode(file_get_contents("php://input"), true);

$auth->register($data);