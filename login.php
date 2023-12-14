<?php
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

// Obter dados do formulário
$email = $_POST['email'];
$senha = $_POST['password'];

// Consultar o banco de dados para verificar as credenciais
$sql = "SELECT * FROM cadastro WHERE email = '$email' AND senha = '$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login bem-sucedido, iniciar a sessão
    session_start();

    // Armazenar dados do usuário na sessão
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_name'] = $row['nome']; 

    // Redirecionar para a página de boas-vindas ou qualquer outra página após o login
    header("Location: welcome.php");
    exit();
} else {
    // Login falhou, redirecionar de volta para a página de login com mensagem de erro
    header("Location: login.html?error=1");
    exit();
}

$conn->close();
?>
