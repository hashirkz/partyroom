<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/conf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/saveable.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/__utils__.php';

class user implements saveable {
    private string $username;
    private string $password;
    private string $hashword;
    private ?SQLite3 $conn;

    public function __construct(string $username, string $password) {
        $this->username = $username;
        $this->password = $password;
        $this->hashword = "";
        $this->conn = db::conn();
    }

    public function save(): void {
        // hash+salt password
        $this->hashword = password_hash($this->password, PASSWORD_DEFAULT);

        // save user to db
        $query = "INSERT INTO users (username, hashword) VALUES (:username, :hashword);";
        $stmn = $this->conn->prepare($query);
        $stmn->bindValue(':username', $this->username, SQLITE3_TEXT);
        $stmn->bindValue(':hashword', $this->hashword, SQLITE3_TEXT);
        $stmn->execute();
    }
    
    public function login(): string {
        $query = "SELECT * FROM users WHERE users.username == :username";
        $stmn = $this->conn->prepare($query);
        $stmn->bindValue(':username', $this->username, SQLITE3_TEXT);
        
        $resp = $stmn->execute();
        
        $user = read_resp($resp)[0];
        var_dump($user);
        var_dump($this->password);
        if (!password_verify($this->password, $user['hashword'])) {
            return 'oh no wrong username or password';
        }

        return 'yay u logged in';
    }

    public function __toString(): string {
        $__repr__ = sprintf(
            "user:\n\tname: %s\n\tpassword: %s\n\thashword: %s",
            $this->username, $this->password, $this->hashword
        );
        return $__repr__;
    } 
}

?>