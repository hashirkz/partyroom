<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partyroom</title>

    <!-- themes -->
    <link rel="stylesheet" href="./stuff/css/lunar.css">

    <!--js libraries -->
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <!-- <form id="login" action="./hidden/login_auth.php" method="post"> -->
    <form id="login">
        <div class="button_wrapper">
            username: <input type="text" name="username" value="<?php echo $username; ?>"><br>
            password: <input type="text" name="password" value="<?php echo $password; ?>"><br>
            <input type="submit" value="login">
        </div>
    </form>

<script src="/stuff/js/login.js" defer></script>
</body>
</html>
