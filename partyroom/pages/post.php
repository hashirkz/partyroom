<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partyroom</title>

    <!-- themes -->
    <link rel="stylesheet" href="../stuff/themes/lunar.css">
    <link rel="stylesheet" href="../stuff/css/tile.css">

    <!--js libraries -->
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <div class="row-card">
        <?php 
            include '../components/tile.php';
        ?>
        <form id="upload-post">
            <div class="button-container">
                
                <input id="img-name" type="text" name="img-name" placeholder="name?" 
                value="<?php echo $img_name; ?>">

                <input id="img-path" name="img-path" type="file" placeholder="img?">
            </div>
        </form>
    

    </div>

<script src="/stuff/js/post.js" defer></script>
</body>
</html>