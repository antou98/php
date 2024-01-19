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
functionHello($var);

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
<h2>Contact Form</h2>

<div class="formulaire">
    <form action="process_form.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="nom" required>

        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <br>

        <input type="submit" value="Submit">
    </form>
</div>
<br>
<br>
<div class="formulaire">
    <form action="get.php" method="get" onsubmit="return validateForm()">
        <label for="nb1">Number 1:</label>
        <input type="number" id="nb1" name="nb1val" required>
        <br>
        <label for="nb2">Number 2:</label>
        <input type="number" id="nb2" name="nb2val" required>
        <br>
        <input type="submit" value="Get Somme">
    </form>
</div>
<br>
<br>

<div class="formulaire">
    <input type="submit" value="Get Somme" onclick="getPojos()">
    <div id="resJson"></div>
</div>
<br>
<br>
<div class="formulaire">
    <h2>Connexion</h2>
    <form action="get.php" method="get" onsubmit="return validateForm()">
        <label for="nb1">Number 1:</label>
        <input type="number" id="nb1" name="nb1val" required>
        <br>
        <label for="nb2">Number 2:</label>
        <input type="number" id="nb2" name="nb2val" required>
        <br>
        <input type="submit" value="Get Somme">
    </form>
</div>
<br>
<br>
<div class="formulaire">
    <h2>Register</h2>
    <form action="get.php" method="get" onsubmit="return validateForm()">
        <label for="nb1">Number 1:</label>
        <input type="number" id="nb1" name="nb1val" required>
        <br>
        <label for="nb2">Number 2:</label>
        <input type="number" id="nb2" name="nb2val" required>
        <br>
        <input type="submit" value="Get Somme">
    </form>
</div>

</body>
</html>

<?php

functionHello("test");

?>
<script>

    function getPojos() {
        fetch("http://localhost/slim_api/public/index.php/api/getPojosPHP", {method: "GET"}).then((res) => {
            return res.json();
        }).then((response) => {
            let affichage = document.getElementById("resJson");
            affichage.innerText = affichage.innerText + JSON.stringify(response);
        }).catch((err) => {
            console.log("Erreur :" + err);
        });
    }


    function validateForm() {
        var nb1 = document.getElementById("nb1").value;
        var nb2 = document.getElementById("nb2").value;

        if (nb1 === "" || isNaN(nb1)) {
            alert("Please enter a valid number for nb1.");
            return false;
        }

        if (nb2 === "" || isNaN(nb2)) {
            alert("Please enter a valid number for nb2.");
            return false;
        }

        return true;
    }
</script>
