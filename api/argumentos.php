<?php

function database_connection() {
  $servername = "localhost";
  $username = "felipe";
  $password = "";
  $dbname = "dicionario_reacionario";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  return $conn;
}

function render_argumento($argumento_id) {
  try {
    $conn = database_connection();
    $sql = "SELECT * FROM argumentos WHERE id=$argumento_id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
}

function render_argumentos() {
  try {
    $conn = database_connection();
    $stmt = $conn->prepare("SELECT * FROM argumentos");
    $stmt->execute();

    $result = $stmt->fetchAll();
    echo json_encode($result);
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
}

function save_and_render_argumento() {
  $postdata = file_get_contents("php://input");
  $request  = json_decode($postdata);

  $titulo       = $request->titulo;
  $argumentacao = $request->argumentacao;
  $explicacao   = $request->explicacao;

  try {
    $conn = database_connection();

    $sql = "INSERT INTO argumentos(titulo, argumentacao, explicacao)
    VALUES('".$titulo."','".$argumentacao."','".$explicacao."')";

    $conn->exec($sql);
    $id = $conn->lastInsertId();
    echo '{
      "id": "'.$id.'",
      "titulo": "'.$titulo.'",
      "argumentacao":"'.$argumentacao.'",
      "explicacao":"'.$explicacao.'"
    }';
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
}

switch($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    $url = $_SERVER['PHP_SELF'];
    $argumento_id = explode('/', $url)[4];

    if($argumento_id) { 
      render_argumento($argumento_id);
    } else {
      render_argumentos();
    }

    break;
  case 'POST':
    save_and_render_argumento();

    break;
  case 'PUT':
    break;
  case 'DELETE':
    break;
};

?>
