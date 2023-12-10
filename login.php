<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petseven";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["cadastroEmail"];
    $senha = $_POST["cadastroSenha"];

    // Inserir dados na tabela
    $insertQuery = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}

$conn->close();
?>
