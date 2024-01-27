<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/conf.php';

class db {
    private static ?SQLite3 $conn = null;
    private string $path;

    private function __construct() {
        $this->path = $_SERVER['DOCUMENT_ROOT'] . '/..' . $_ENV['db_path'];
    }

    private function sqlite3_conn(): void {  
        try {
            $db = new SQLite3($this->path);
            if (!$db) { die("unable to connect to db at $this->path"); }
            self::$conn = $db;
        }
    
        catch (Exception $e) {
            die("error: " . $e->getMessage());
        }
    }

    public static function conn(): SQLite3 {
        if (self::$conn === null) {
            $db = new self();
            $db->sqlite3_conn();
        }
        return self::$conn;
    }

    // read query results into array
    public static function read_resp(SQLite3Result $resp): array {
        $rows = array();
        while ($row = $resp->fetchArray(SQLITE3_ASSOC)) {
            $rows[] = $row;
        }
        return $rows;
    }
}

?>