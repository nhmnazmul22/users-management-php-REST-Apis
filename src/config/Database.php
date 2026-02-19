<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Database {
    private string $DB_HOST;
    private string $DB_USER;
    private string $DB_PASS;
    private string $DB_NAME;
    public ?PDO $conn;

    public function __construct()
    {
       $this->DB_HOST = $_ENV["DB_HOST"];
        $this->DB_NAME = $_ENV["DB_NAME"];
        $this->DB_USER = $_ENV["DB_NAME"];
        $this->DB_PASS = $_ENV["DB_NAME"];
    }
}