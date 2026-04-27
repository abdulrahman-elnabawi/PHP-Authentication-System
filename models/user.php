<?php

class User {

    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function findByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $email, $password) {
        $stmt = $this->conn->prepare(
            "INSERT INTO $this->table (name, email, password) VALUES (?, ?, ?)"
        );
        return $stmt->execute([$name, $email, $password]);
    }
}