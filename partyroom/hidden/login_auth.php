<?php
require_once './utils.php';
require_once './conf.php';

// hidden page
is_hidden();

$username = $password = "";

$username = sanitize($_POST["username"]);
$password = sanitize($_POST["password"]);
// $hash = password_hash($password, PASSWORD_DEFAULT);
// [$hash, $salt] = hash_salt($password);

// db conn
$db = sqlite3_conn($_SERVER['DOCUMENT_ROOT'] . "../.." . $_ENV['db_path']);

// query for username / hashword
$query = "SELECT * FROM users WHERE users.username == :username";
$stmn = $db->prepare($query);
$stmn->bindValue(':username', $username, SQLITE3_TEXT);

$resp = $stmn->execute();

$user = fetch_all($resp)[0];
if (!password_verify($password, $user['hashword'])) {
    die('oh no wrong username or password');
}

echo 'yay logged in ';




// var_dump($data);
// // bad username
// if (empty($data)) { echo "$username does not exist"; }

// // fetch salt and hash and compare given password
// foreach ($data as $row) {
//     $hashword_in_db = $row['hashword'];
//     $salt = $row['salt'];
// }
// $p1 = password_hash($password . $salt, PASSWORD_DEFAULT);
// printf("client: %s\non db: %s\n", $p1, $hashword_in_db);


?>