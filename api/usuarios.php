<?php

require_once('database.php');

function render_usuario($usuario_id) {
  try {
    $conn = database_connection();
    $sql = "SELECT * FROM usuarios WHERE id=$usuario_id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
  }
  catch(PDOException $e) {
    echo "Error: ".$e->getMessage();
  }
  $conn = null;
}

function save_and_render_usuario() {
  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $nome = $request->nome;
  $email = $request->email;
  $senha = $request->senha;

  try {
    $conn = database_connection();

    $sql = "INSERT INTO usuarios(nome, email, senha)
    VALUES('".$nome."','".$email."','".$senha."')";

    $conn->exec($sql);
    $id = $conn->lastInsertId();
    echo '{
      "id": "'.$id.'",
      "nome": "'.$nome.'",
      "email":"'.$email.'",
      "senha":"'.$senha.'"
    }';
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
};

switch($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    save_and_render_usuario();
    break;
  case 'GET':
    $url = $_SERVER['PHP_SELF'];
    $user_id = explode('/', $url)[4];
    if($user_id) {
      render_usuario($user_id);
    } else {
      render_usuarios();
    }
    break;
};

?>
