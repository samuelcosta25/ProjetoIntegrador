<?php
$conexao = new mysqli("localhost", "seu_usuario", "sua_senha", "feedback");

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

$query = "SELECT * FROM feedbacks";
$result = $conexao->query($query);

while ($row = $result->fetch_assoc()) {
    echo "<div class='feedback-item'>";
    echo "<p><strong>{$row['nomeCliente']}</strong></p>";
    echo "<p>{$row['feedbackCliente']}</p>";
    echo "<p>Avaliação: {$row['rating']} estrelas</p>";
    echo "</div>";
}

$conexao->close();
?>
