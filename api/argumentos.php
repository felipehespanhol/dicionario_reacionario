<?php

$servername = "localhost";
$username = "felipe";
$password = "";
$dbname = "dicionario_reacionario";

switch($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM argumentos");
      $stmt->execute();

      // set the resulting array to associative
      $result = $stmt->fetchAll();
      echo json_encode($result);
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;

    break;
  case 'POST':
    $postdata = file_get_contents("php://input");
    $request  = json_decode($postdata);

    $titulo       = $request->titulo;
    $argumentacao = $request->argumentacao;
    $explicacao   = $request->explicacao;

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "INSERT INTO argumentos(titulo, argumentacao, explicacao)
      VALUES('".$titulo."','".$argumentacao."','".$explicacao."')";

      $conn->exec($sql);
      echo 'Argumento criado com sucesso!';
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;

    break;
  case 'PUT':
    break;
  case 'DELETE':
    break;
};

?>
