<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $datapost = "";

    //$_SERVER
    $serverdata = "";
    echo "<div><b><h2>Server Data:</h2></b><br>";
    foreach ($_SERVER as $key => $value) {
        echo "$key: $value<br>";
    }
    echo "</br></br>";

    //$_POST une map qui contient les valeur posté attribut name de input (name="nom")
    $datapost = "";
    foreach ($_POST as $key => $value) {
        //concat
        $datapost = $datapost . $key . " : " . $value . "   </br>";
    }
    echo "<div><b><h2>Post Data:</h2></b>$datapost</div>";
    echo "</br></br>";


    $name = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);

    // Display submitted data
    echo "<h2>Submitted Information:</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
} else {
    // Redirect to the form if accessed directly without submitting
    header("Location: index.php");
    exit();
}
?>
