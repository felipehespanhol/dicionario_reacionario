<?php

require_once('database.php');

session_start();

function handle_login() {
  $postdata = file_get_contents("php://input");
  $request  = json_decode($postdata);

  $email = $request->email;
  $senha = $request->senha;

  try {
    $conn = database_connection();
    $sql = "SELECT * FROM usuarios WHERE email='".$email."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    http_response_code(500);
    echo "Error: " . $e->getMessage();
  }

  if($result['senha'] == $senha) {
    $_SESSION['USER_ID'] = $result['id'];
    echo '{
      "id":"'.$result['id'].'",
      "user": {
        "id":"'.$result['id'].'",
        "email": "'.$email.'",
        "nome": "'.$result['nome'].'",
        "role": "'.$result['role'].'"
      }
    }';
  } else {
    http_response_code(401);
  }
}

switch($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    handle_login();
}

?>
