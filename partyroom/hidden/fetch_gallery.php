<?php 
require_once './conf.php';
require_once './util.php';

// hidden page
is_hidden();

$db = sqlite3_conn($_SERVER['DOCUMENT_ROOT'] . "../.." . $_ENV['db_path']);
$query = "SELECT imgs.name, imgs.data, imgs.created_at FROM imgs";

$stmn = $db->prepare($query);
$resp = $stmn->execute();

$imgs = fetch_all($resp);
var_dump($imgs);
?>

<!-- CREATE TABLE imgs (
    iid INTEGER PRIMARY KEY,
    pid INTEGER UNQIUE,

    img_name TEXT NOT NULL,
    img_data BLOB NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (pid) REFERENCES posts(pid)
); -->