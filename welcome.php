<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petseven";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter dados do usuário atual
$userID = $_SESSION['user_id'];
$userEmail = $_SESSION['user_email'];
$userName = $_SESSION['user_name'];

// Consultar o banco de dados para verificar as credenciais do usuário atual
$sql = "SELECT * FROM cadastro WHERE id = '$userID' AND email = '$userEmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuário autenticado com sucesso, continue com o conteúdo da página

    // Exibir mensagem de boas-vindas
    echo "<!DOCTYPE html>
            <html lang='pt-br'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Bem-vindo</title>
            </head>
            <body>
                <div>
                    <h1>Bem-vindo, $userName!</h1>
                    <!-- Botão para voltar ao index.html -->
                    <a href='index.html'><button type='button'>Voltar para a Página Inicial</button></a>
                </div>
            </body>
            </html>";
} else {
    // Dados do usuário não encontrados no banco de dados, exibir alerta
    echo "<!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>ERRO</title>
    </head>
    <body>
        <div>
            <h1>Dados inválidos!</h1>
            <!-- Botão para voltar ao index.html -->
            <a href='login.html'><button type='button'>Voltar para Login</button></a>
        </div>
    </body>
    </html>";
}

$conn->close();
?>
