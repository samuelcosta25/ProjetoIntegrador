<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "petseven";

    // Cria a conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Recupera os dados do formulário, utilizando isset e mysqli_real_escape_string
    $nome = isset($_POST["inputNome"]) ? mysqli_real_escape_string($conn, $_POST["inputNome"]) : "";
    $cpf = isset($_POST["inputCPF"]) ? mysqli_real_escape_string($conn, $_POST["inputCPF"]) : "";
    $email = isset($_POST["inputEmail"]) ? mysqli_real_escape_string($conn, $_POST["inputEmail"]) : "";
    $cep = isset($_POST["inputCEP"]) ? mysqli_real_escape_string($conn, $_POST["inputCEP"]) : "";
    $endereco = isset($_POST["address"]) ? mysqli_real_escape_string($conn, $_POST["address"]) : "";
    $numero = isset($_POST["addressNumber"]) ? mysqli_real_escape_string($conn, $_POST["addressNumber"]) : "";
    $cidade = isset($_POST["inputCity"]) ? mysqli_real_escape_string($conn, $_POST["inputCity"]) : "";
    $estado = isset($_POST["inputState"]) ? mysqli_real_escape_string($conn, $_POST["inputState"]) : "";
    $senha = isset($_POST["inputPassword"]) ? mysqli_real_escape_string($conn, $_POST["inputPassword"]) : "";

    // Pet count e pets
    $cadastrar_pets = 0;

    // Inicializa as variáveis de pet
    for ($i = 1; $i <= 10; $i++) {
        ${"pet" . $i} = "";
    }

    // Verifica se a variável petInputs foi definida no formulário
    if (isset($_POST["petInputs"]) && is_array($_POST["petInputs"])) {
        $petInputs = $_POST["petInputs"];
        $cadastrar_pets = count($petInputs);

        // Adiciona os pets às colunas existentes
        for ($i = 1; $i <= 10; $i++) {
            $pet_column = "pet" . $i;
            if (isset($petInputs[$i - 1])) {
                ${$pet_column} = mysqli_real_escape_string($conn, $petInputs[$i - 1]);
            }
        }
    }

    // Insere os dados na tabela "cadastro"
    $sql = "INSERT INTO cadastro (nome, cpf, email, cep, endereco, enderecoNumero, cidade, estado, senha, cadastrar_pets, pet1, pet2, pet3, pet4, pet5, pet6, pet7, pet8, pet9, pet10) 
            VALUES ('$nome', '$cpf', '$email', '$cep', '$endereco', '$numero', '$cidade', '$estado', '$senha', '$cadastrar_pets', '$pet1', '$pet2', '$pet3', '$pet4', '$pet5', '$pet6', '$pet7', '$pet8', '$pet9', '$pet10')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
