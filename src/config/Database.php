<?php

namespace Nhmnazmul\UsersManagment\config;

use Dotenv\Dotenv;
use PDO;
use PDOException;

$dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

class Database
{
    private string $DB_HOST;
    private string $DB_USER;
    private string $DB_PASS;
    private string $DB_NAME;
    public ?PDO $conn;

    public function __construct()
    {
        $this->DB_HOST = $_ENV["DB_HOST"];
        $this->DB_NAME = $_ENV["DB_NAME"];
        $this->DB_USER = $_ENV["DB_USER"];
        $this->DB_PASS = $_ENV["DB_PASS"];
    }

    public function connect(): ?PDO
    {
        $this->conn = null;

        try {
            $dns = "mysql:host={$this->DB_HOST};dbname={$this->DB_NAME};charset=utf8";
            $this->conn = new PDO($dns, $this->DB_USER, $this->DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->conn = null;
            error_log("[" . date("Y-m-d H:i:s") . "] Connection failed: " . $e->getMessage(), 3, __DIR__ . "/../logs/error.log");
        }

        return $this->conn;
    }
}