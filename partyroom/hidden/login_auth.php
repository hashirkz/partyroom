<?php
require_once './utils.php';
require_once './conf.php';

// hidden page
is_hidden();

$username = $password = "";

$username = sanitize($_POST["username"]);
$password = sanitize($_POST["password"]);
$hash = password_hash($password, PASSWORD_DEFAULT);
// [$hash, $salt] = hash_salt($password);

// db conn
$db = sqlite3_conn($_ENV['db_path']);
printf "$_ENV['db_path']\n";

// query for username / hashword
$query = "SELECT * FROM users AS u WHERE u.username == $username;";

// $query.bindValue(":username", $username);
$resp = $db->query($query);
echo "[$resp]";
// username not in db
if (!$resp) {
    echo "user: $username does not exist";
}
// $user = $resp->fetchArray(SQLITE3_ASSOC);
// $pass_on_db = $user['hashword'];

// if ($hashword != $hashword_on_db) {
//     echo "incorrect password for $username";
// }


// auth hashword
// printf("username: %s\n\nhash: %s\n\nsalt: %s", $username, $hash, $salt);


?>