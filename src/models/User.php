<?php

namespace Nhmnazmul\UsersManagment\models;

use mysql_xdevapi\Exception;
use Nhmnazmul\UsersManagment\config\Database;
use PDO;
use PDOException;

class User
{
    private ?PDO $conn;

    public function __construct()
    {
        try {
            $this->conn = new Database()->connect();
        } catch (Exception $e) {
            $this->conn = null;
            error_log("[" . date("Y-m-d H:i:s") . "] Connection failed: " . $e->getMessage(), 3, '../../logs/error.log');
        }
    }

    public function getAllUser(): ?array
    {
        try {
            $query = "SELECT * FROM users";

            if ($this->conn === null) {
                throw new Exception("Database connection is null");
            }

            $stmt = $this->conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Query failed: " . $e->getMessage(), 3, '../../logs/error.log');
            return null;
        }
    }
}