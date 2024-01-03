<?php 
require_once './utils.php';
require_once '../structures/post.php';
require_once '../structures/img.php';

// hidden page
is_hidden();

try {
    $img_name = sanitize($_POST["img-name"]);

    if(isset($_FILES['img-path']) && $_FILES['img-path']['error'] === UPLOAD_ERR_OK) {
        $img = $_FILES['img-path'];
        $fmt = pathinfo($_FILES['img-data']['name'], PATHINFO_EXTENSION);

        // if ($img["size"] > $_ENV["max_img_size"]) { die("whoops max_img_size_exceeded"); }

        $mv_path = $_SERVER["DOCUMENT_ROOT"] . $_ENV["imgs_dir"] . "/" . $img["name"];
        $img_path = $_ENV["imgs_dir"] . "/" . $img["name"];
        move_uploaded_file($img["tmp_name"], $mv_path);
        $img_h = new img(1, $img_name, $img_path, $fmt, $img["size"]);
        $img_h->save();

        $resp = array (
            "img_name" => $img_name,
            "img_path" => $img_path
        );

        echo json_encode($resp);
        // img = new img(1, )
        
        
        // reading img data
        // $img_data = file_get_contents($tmp);
        // $img = new img(1, $img_name, $img_data, $fmt);
        // echo $img_data;
        // echo $img;
        // $img->save();
    }
}

catch (Exception $e) {
    echo $e->getMessage();
}
?>