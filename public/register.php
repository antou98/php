<?php ?>
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
    <h2>Register</h2>
    <form action="http://localhost/php/slim_api/public/index.php/api/register" method="post" onsubmit="return validateInfoRegister()">
        <label for="user">Username : </label>
        <input type="text" id="user1" name="username" required>
        <br>
        <label for="pass">Password : </label>
        <input type="text" id="pass1" name="password" required>
        <br>
        <label for="pass">Confirm Password : </label>
        <input type="text" id="pass2" name="password" required>
        <br>
        <input type="submit" value="Register">
    </form>
</div>
<script src="validation.js" defer></script>
</body>
</html>