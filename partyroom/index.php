<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partyroom</title>

    <!-- fav -->
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- themes -->
    <link rel="stylesheet" href="./stuff/themes/lunar.css">

    <!--js libraries -->
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <!-- <form id="login" action="./hidden/login_auth.php" method="post"> -->
    <form id="login">
        <div class="login-container">
            <div class="button-container">
                <input id="username" type="text" name="username" placeholder="username?" 
                value="<?php echo $username ? $username : ""; ?>">
            </div>
            <div class="button-container">
                <input id="password" type="password" name="password" placeholder="password?" 
                value="<?php echo $password ? $password : ""; ?>">
            </div>
            <input class='hidden' type="submit" value="login">
        </div>
    </form>

<script src="/stuff/js/login.js" defer></script>
</body>
</html>
