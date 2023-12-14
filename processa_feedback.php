<?php
// Conecte-se ao banco de dados (substitua com suas credenciais)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petseven";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Coleta os dados do formulário
$nomeCliente = isset($_POST['nomeCliente']);
$feedbackCliente = isset($_POST['feedbackCliente']);
$rating = isset($_POST['rating']);

// Escapa caracteres especiais para evitar injeção de SQL
$nomeCliente = mysqli_real_escape_string($conn, $nomeCliente);
$feedbackCliente = mysqli_real_escape_string($conn, $feedbackCliente);

// Prepara a instrução SQL para inserção de dados
$sql = "INSERT INTO avaliacoesfeedbacks (nome_usuario, nota, comentario) VALUES ('$nomeCliente', $rating, '$feedbackCliente')";

// Executa a instrução SQL
if ($conn->query($sql) === TRUE) {
    echo "Feedback enviado com sucesso!";
    
} else {
    echo "Erro ao enviar feedback: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>