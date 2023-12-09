<?php
// Conectar ao banco de dados (substitua as informações do banco de dados conforme necessário)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petseven";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Processar os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["inputCPF"];
    $email = $_POST["inputEmail"];
    $senha = password_hash($_POST["inputPassword"], PASSWORD_DEFAULT);
    $endereco = $_POST["inputAddress"];
    $cidade = $_POST["inputCity"];
    $estado = $_POST["estado"];
    $cadastrar_pets = isset($_POST["checkbox2"]) ? 1 : 0;

    // Inserir dados na tabela cadastro
    $sql = "INSERT INTO cadastro (cpf, email, senha, endereco, cidade, estado, cadastrar_pets) 
            VALUES ('$cpf', '$email', '$senha', '$endereco', '$cidade', '$estado', $cadastrar_pets)";

    if ($conn->query($sql) === TRUE) {
        // Obter o ID do último registro inserido
        $last_id = $conn->insert_id;

        // Inserir dados de pets na tabela
        for ($i = 1; $i <= 10; $i++) {
            $petField = "pet" . $i;
            if (isset($_POST[$petField])) {
                $petName = $_POST[$petField];
                $sqlPet = "UPDATE cadastro SET $petField = '$petName' WHERE id = $last_id";
                $conn->query($sqlPet);
            }
        }

        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>
