<?php
// Conectar ao banco de dados (substitua as credenciais conforme necessário)
$conexao = new mysqli("localhost", "root", "", "petseven");

// Verificar a conexão
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Obter dados do formulário
$nomeCliente = $_POST['nomeCliente'];
$feedbackCliente = $_POST['feedbackCliente'];
$rating = $_POST['rating'];

// Inserir dados no banco de dados
$query = "INSERT INTO feedbacks (nomeCliente, feedbackCliente, rating) VALUES ('$nomeCliente', '$feedbackCliente', $rating)";
$conexao->query($query);

// Fechar a conexão
$conexao->close();

// Redirecionar de volta para a página principal ou exibir uma mensagem de confirmação
header("Location: index.html");
exit();
?>
