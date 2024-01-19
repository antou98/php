<?php
IF(isset($_SESSION["connected"])){

}
else{

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>Simple PHP Form</title>
</head>
<body>
<div class="formulaire">
    <h2>Connexion</h2>
    <form action="http://localhost/php/slim_api/public/index.php/api/connexion" method="post" onsubmit="return validateInfoConn()">
        <label for="user">Username : </label>
        <input type="text" id="user" name="username" required>
        <br>
        <label for="pass">Password : </label>
        <input type="text" id="pass" name="password" required>
        <br>
        <input type="submit" value="Connect">
    </form>
</div>
<p id="errmsg"></p>
<script src="validation.js" defer></script>
</body>
</html>

