<?php 
require_once './utils.php';
require_once './conf.php';

// hidden page
is_hidden();

$name = sanitize($_POST["img-name"]);
// $data = sanitize($_POST["img-data"]);


// var_dump($data);
try {

    if(isset($_FILES['img-data']) && $_FILES['img-data']['error'] === UPLOAD_ERR_OK) {
        $temp_name = $_FILES['img-data']['tmp_name'];
        
        // Read the file contents
        $data = file_get_contents($temp_name);
    

        $db = sqlite3_conn($_SERVER['DOCUMENT_ROOT'] . "../.." . $_ENV['db_path']);
        
        $query = "INSERT INTO imgs (img_name, img_data) VALUES (:img_name, :img_data);";
        $stmn = $db->prepare($query);
        $stmn->bindValue(':img_name', $name, SQLITE3_TEXT);
        $stmn->bindValue(':img_data', $data, SQLITE3_BLOB);
        
        $resp = $stmn->execute();
        var_dump($data);
    }
    else {
        echo 'file upload error';
    }
}

catch (Exception $e) {
    echo $e->errorMesage();
}
?>