<?php
is_hidden();

// reading .env db and aws-ec2 pass into _ENV
$env = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/../server/.env");

if ($env === false) {
    die("unable to read .env");
}

foreach ($env as $k => $v) {
    $_ENV[$k]= $v;
}


?>