<?php
require_once('./utils.php');

// hidden page
is_hidden();

// reading .env db and aws-ec2 pass into _ENV
$env = parse_ini_file('../../server_stuff/.env');

if ($env === false) {
    die("unable to read .env");
}

foreach ($env as $k => $v) {
    // printf("key: $k, val: $v\n");
    $_ENV[$k]= $v;
}

?>