<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petseven";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$input = file_get_contents('php://input');
$data = json_decode($input);

$email = $data->email;

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array('message' => 'Erro: Endereço de email inválido.'));
    exit();
}

$sqlVerificar = "SELECT * FROM email WHERE endereco = '$email'";
$resultado = $conn->query($sqlVerificar);

if ($resultado->num_rows > 0) {
    echo json_encode(array('message' => 'Erro: Este email já está cadastrado.'));
    exit();
}

$sqlInserir = "INSERT INTO email (endereco) VALUES ('$email')";

if ($conn->query($sqlInserir) === TRUE) {
    echo json_encode(array('message' => 'Sucesso: Email cadastrado com sucesso.'));
} else {
    echo json_encode(array('message' => 'Erro: ' . $conn->error));
}

$conn->close();
?>
