<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root"; // seu nome de usuário MySQL
$password = ""; // sua senha MySQL
$dbname = "petseven"; // nome do database

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Processar o formulário de agendamento
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $servico = $_POST["servico"];
    $data = $_POST["data"];
    $horario = $_POST["horario"];

    // Verificar se o horário está disponível
    $disponivel = verificarDisponibilidade($conn, $data, $horario);

    if ($disponivel) {
        // Inserir agendamento no banco de dados
        $sql = "INSERT INTO agendamentos (servico, data, horario) VALUES ('$servico', '$data', '$horario')";

        if ($conn->query($sql) === TRUE) {
            // Exibir alerta de sucesso
            echo "<script>alert('Agendamento realizado com sucesso!');window.location.href = 'agenda.html';</script>";
        
        } else {
            // Exibir alerta de erro
            echo "<script>alert('Erro ao agendar: " . $conn->error . "');window.location.href = 'agenda.html';</script>";
        }
    } else {
        // Exibir alerta de horário indisponível
        echo "<script>alert('Horário não disponível. Escolha outro horário.');window.location.href = 'agenda.html';</script>";
    }
}

// Função para verificar a disponibilidade do horário
function verificarDisponibilidade($conn, $data, $horario) {
    $sql = "SELECT * FROM agendamentos WHERE data = '$data' AND horario = '$horario'";
    $result = $conn->query($sql);

    return $result->num_rows === 0; // Retorna verdadeiro se o horário estiver disponível
}

// Fechar a conexão
$conn->close();
?>
