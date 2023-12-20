<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partyroom</title>

    <!-- themes -->
    <link rel="stylesheet" href="../stuff/themes/lunar.css">

    <!--js libraries -->
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <form id="upload-img">
        <div class="button-container">
            
            <input id="img-name" type="text" name="img-name" placeholder="name?" 
            value="<?php echo $img_name; ?>">

            <input id="img-data" type="file" placeholder="img?">
        </div>
    </form>

<script src="/stuff/js/upload_img.js" defer></script>
</body>
</html>
