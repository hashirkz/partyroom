<?php
require_once './utils.php';
require_once '../structures/user.php';

// hidden page
is_hidden();

$username = $password = "";

$username = sanitize($_POST["username"]);
$password = sanitize($_POST["password"]);

$user = new user($username, $password);
$user->save();

echo "success";


?>