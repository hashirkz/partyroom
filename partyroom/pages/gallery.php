<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/db.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/structures/__utils__.php';
    $q = "SELECT i.img_name, i.img_path FROM imgs AS i";
    $stmn = db::conn()->prepare($q);
    $imgs = read_resp($stmn->execute());
    // $directory = "../stuff/imgs";
    // $files = scandir($directory);
    // $imgs = array();
    // foreach($files as $file) {
    //     if ($file === "." || $file === "..") {
    //         continue;
    //     }
    //     $imgs[] = $directory . '/' . $file;
    // }

    // $imgs = array_diff($files, array('.', '..'));
?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partyroom</title>
    <link rel="stylesheet" href="/stuff/themes/lunar.css">
    <link rel="stylesheet" href="/stuff/css/tile.css">
    
</head>
<body>
    <div class="column-wrapper">
        <!-- <h1>gallery</h1> -->
        <ul id="ribbon">
            <li class="ribbon-item">
                <img src="/stuff/svgs/placeholder.svg" alt="ribbon-item">
            </li>
            <li class="ribbon-item">
                <img src="/stuff/svgs/placeholder.svg" alt="ribbon-item">
            </li>
            <li class="ribbon-item">
                <img src="/stuff/svgs/placeholder.svg" alt="ribbon-item">
            </li>
            <li class="ribbon-item">
                <img src="/stuff/svgs/placeholder.svg" alt="ribbon-item">
            </li>
        </ul>
        <div id="gallery">
            <?php 
                foreach($imgs as $img) {
                    $img_name = $img["img_name"];
                    $img_path = $img["img_path"];
                    // $name = preg_replace('/\.\w+$/', '', $name);
                    include '../components/tile.php';
                }
            ?>
        </div>
    </div>
</body>
</html>
