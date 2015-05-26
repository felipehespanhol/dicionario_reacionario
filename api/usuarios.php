<?php

require_once('database.php');

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
};

?>
