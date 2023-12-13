<?php
require_once './utils.php';
require_once './conf.php';

// hidden page
is_hidden();

$username = $password = "";

$username = sanitize($_POST["username"]);
$password = sanitize($_POST["password"]);
$hashword = password_hash($password, PASSWORD_DEFAULT);

// db conn
$db = sqlite3_conn($_SERVER['DOCUMENT_ROOT'] . "../.." . $_ENV['db_path']);


// query to save user to db

try {
    $query = "INSERT INTO users (username, hashword) VALUES (:username, :hashword);";
    $stmn = $db->prepare($query);
    $stmn->bindValue(':username', $username, SQLITE3_TEXT);
    $stmn->bindValue(':hashword', $hashword, SQLITE3_TEXT);
    
    $resp = $stmn->execute();
    
    echo 'success';
}

catch (Exception $e) {
    echo $e->errorMessage();
}
// $data = fetch_all($resp);

?>