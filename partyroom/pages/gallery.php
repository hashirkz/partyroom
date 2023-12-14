<?php 
   
    $directory = "../stuff/imgs";
    $files = scandir($directory);
    $imgs = array();
    foreach($files as $file) {
        if ($file === "." || $file === "..") {
            continue;
        }
        $imgs[] = $directory . '/' . $file;
    }

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
    <div id="gallery">
        <?php 
            foreach($imgs as $img) {
                $name = basename($img);
                $name = preg_replace('/\.\w+$/', '', $name);
                include '../components/tile.php';
            }
        ?>
    </div>
</body>
</html>
