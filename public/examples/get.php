<?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){

        if($_GET["nb1val"]!==null && $_GET["nb2val"]!==null){
            $val1 = $_GET["nb1val"];
            $val2 = $_GET["nb2val"];
            $somme = (int) $val2 + (int)$val1;
            echo "<pre>";
            echo $somme;
            echo "</pre>";
        }
        else{
            header("Location: index.php");
            exit();
        }
    }
?>
