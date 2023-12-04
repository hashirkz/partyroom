<?php

// hidden page
is_hidden();

// sanitize data for xss / sql inj
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// returns hash and salt for password to store in db
function hash_salt($password) {
    $salt = bin2hex(random_bytes(16));
    $hash = password_hash($password . $salt, PASSWORD_DEFAULT);
    return [$hash, $salt];
}

// regex patterns for validating username password etc fields
$username_regex = '/^[A-Za-z][A-Za-z0-9]{5,31}$/';

/* 
    pass requirements:
    length      : >8
    lowercase   : >0
    number      : >0         
    special     : >0
*/
// pass: str -> str | NULL
function valid_password($pass) {
    $lower = '@[a-z]@';
    $number = '@[0-9]@';
    $special = '@[^\w]@';

    if (!$lower || !$number || $special || strlen($pass) < 8) {
        return NULL;
    }
}

// reroute to error page if hidden / config php file
// -> NULL
function is_hidden() {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        $error_pg = "/pages/error.php";
    
        header("Location: $error_pg");
    }
}

function sqlite3_conn($path) {  
    try {
        $db = new SQLite3($path);
        
        if (!$db) {
            die("unable to connect to db");
        }
        return $db;
    }

    catch (Exception $e) {
        die("error: " . $e->getMessage());
    }
}
?>