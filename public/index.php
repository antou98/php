<?php
//phpinfo();
//print_r($SERVER);
//echo "test"

function functionHello($message)
{
    echo '<pre>';
    echo $message;
    echo '</pre>';
}

$var = "hello";
//functionHello($var);

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
<div class="formulaire" >
    <span>Connect : </span><a href="connection.php">link</a>
    <br>
    <span>Register : </span><a href="register.php">link</a>
</div>
</body>
</html>
<?php

//functionHello("test");

?>

