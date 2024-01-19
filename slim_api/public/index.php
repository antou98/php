<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
//use Slim\Factory\AppFactory;

#le auto loader nécessaire
require '../vendor/autoload.php';

// comme =  var app = express();
$app = new \Slim\App;

require '../src/config/db.php';
$db = new db();
//connection database
function dbconnection()
{
    global $db;
    return $db->connect();
}

function validateCredentialsDontExist($username,$password)
{
    $conn = dbconnection();
    $sql = "SELECT * FROM users where username = '" . $username . "' and password = '"  . $password . "'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        return false;
    }else{
        return true;
    }
}

$app->post("/api/register", function (Request $request,Response $response, array $array){
    $messageRet = "";

    // Create a connection
    $conn = dbconnection();

    //parsedbody of request
    $parsedBody = $request->getParsedBody();


    // Check the connection
    if ($conn->connect_error) {
        return "Connection failed: " . $conn->connect_error;
    }else{
        if(isset($parsedBody['username']) && isset($parsedBody['password'])){

            if(validateCredentialsDontExist($parsedBody['username'],$parsedBody['password'])){


                $insertStatement = "INSERT INTO users (username, password) VALUES ('" . $parsedBody['username'] . "', '" . $parsedBody['password'] . "')";
                $conn->query($insertStatement);
                if ($conn->connect_error) {
                    $response->getBody()->write("error : insert error");
                    return $response->withStatus(400);
                }else{
                    $response->getBody()->write("succes : compte créer");
                    return $response->withStatus(200);
                }

            }else{
                $response->getBody()->write("error : account already exists");

                return $response->withStatus(400);
            }

        }else{

            $response->getBody()->write("error : request body error");
            return $response->withStatus(500);

        }

    }

});

$app->post("/api/connexion", function (Request $request,Response  $response, array $args){

    $parsedRequest = $request->getParsedBody();

    if(isset($parsedRequest["username"] ) && isset($parsedRequest["password"])){
        $user = $parsedRequest["username"];
        $password = $parsedRequest["password"];

        $conn = dbconnection();

        $notExists = validateCredentialsDontExist($parsedRequest["username"],$parsedRequest["password"]);

        if(!$notExists){
            $response->getBody()->write("Succes : connexion valide");
            return $response->withStatus(200);
        }else{
            $response->getBody()->write("Erreur : credentials don't match an account");
            return $response->withStatus(400);
        }
    }else{

        $response->getBody()->write("Erreur : no credentials entered");
        return $response->withStatus(500);
    }
});

$app->run();

/*$app->get('/api/sayhello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->post("/api/testPost", function (Request $request, Response $response, array $args){

    $returnmessage =  "";
    $parsedBody = $request->getParsedBody();
    if(isset($parsedBody['val1']) && isset($parsedBody['val2'])){
        $value1 = $parsedBody['val1'];
        $value2 = $parsedBody['val2'];
        $total = 0;
        try {
            $total = ((double) $value1) + ((double) $value2);
            $returnmessage = "la somme est de : " . $total;
        }catch (Exception $e){
            echo $e;
            $returnmessage = "input invalide";
        }

    }
    else{
        $returnmessage = "no input";
    }

    $response->getBody()->write($returnmessage);


    return $response;
});

$app->get("/api/getPojosPHP",function (Request $request,Response $response, array $args){
    $apiUrl = 'http://localhost:8080/getPojosJAVA';

    //url appelé
    $ch = curl_init($apiUrl);

    // Set cURL options
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPGET, true);

    // Execute cURL session and fetch the response
    $resp = curl_exec($ch);

    //  curl_errno Check for nombre de cURL errors
    if (curl_errno($ch)!=0) {
        $error = ['error' => 'Curl error: ' . curl_error($ch)];
        $response->getBody()->write(json_encode($error));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
    } else {
        // Decode JSON response to an object
        $data = json_decode($resp, true);

        // Check if JSON decoding was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            $error = ['error' => 'Error decoding JSON: ' . json_last_error_msg()];
            $response->getBody()->write(json_encode($error));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }

        // Write the JSON data to the response autre facons de faire:
        //$response->getBody()->write(json_encode($data));
        //$response->getBody()->write($json)->withHeader('Content-Type', 'application/json')->;

        // Close cURL session
        curl_close($ch);


        //write data en string
        $json = json_encode($data);
        //test  $response->withStatus(200)->withJson($data)

        return $response->withStatus(200)->withJson($data);
    }
});*/