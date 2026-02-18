<?php
/**
 * Database Connection Class
 * Uses PDO for secure database access
 */

// Load environment variables
require_once __DIR__ . '/env.php';

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        // Get database config from environment variables
        $host = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?: 'localhost';
        $port = $_ENV['DB_PORT'] ?? getenv('DB_PORT') ?: '3306';
        $dbname = $_ENV['DB_NAME'] ?? getenv('DB_NAME') ?: '';
        $username = $_ENV['DB_USER'] ?? getenv('DB_USER') ?: 'root';
        $password = $_ENV['DB_PASS'] ?? getenv('DB_PASS') ?: '';
        $charset = $_ENV['DB_CHARSET'] ?? getenv('DB_CHARSET') ?: 'utf8mb4';

        if (empty($dbname)) {
            throw new Exception("Database name (DB_NAME) is required in .env file");
        }

        // Build DSN, handling optional port
        $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";
        if (!empty($port) && $port !== '3306') {
            $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset={$charset}";
        }

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }

    // Prevent cloning
    private function __clone() {}

    // Prevent unserialization
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }
}

// Helper function for easy access
function getDB() {
    return Database::getInstance()->getConnection();
}
