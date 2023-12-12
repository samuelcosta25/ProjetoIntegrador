<?php
// Inicie a sessão
session_start();

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petseven";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se as chaves do array $_POST estão definidas
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : "";
    $senha = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : "";

    // Consulta o banco de dados para verificar se o e-mail e senha são válidos
    $sqlVerificar = "SELECT * FROM cadastro WHERE email = '$email' AND senha = '$senha'";
    $resultado = $conn->query($sqlVerificar);

    if ($resultado->num_rows > 0) {
        // E-mail e senha válidos
        $_SESSION['email'] = $email; // Inicia a sessão com o e-mail
        echo "Sucesso: Login realizado com sucesso.";
    } else {
        // E-mail ou senha inválidos
        echo "Erro: E-mail ou senha inválidos.";
    }
}

// Fechar a conexão
$conn->close();
?>