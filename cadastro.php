<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petseven";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recupera os dados do formulário
$nome = $_POST['inputNome'];
$cpf = $_POST['inputCPF'];
$email = $_POST['inputEmail'];
$cep = $_POST['inputCEP'];
$endereco = $_POST['address'];
$enderecoNumero = $_POST['addressNumber'];
$cidade = $_POST['inputCity'];
$estado = $_POST['inputState'];
$senha = $_POST['inputPassword'];

// Verifica se o CPF já está cadastrado
$sqlVerificarCPF = "SELECT * FROM cadastro WHERE cpf = '$cpf'";
$resultadoCPF = $conn->query($sqlVerificarCPF);

if ($resultadoCPF->num_rows > 0) {
    echo "Erro: Este CPF já está cadastrado.";
    exit();
}

// Insere os dados na tabela
$sqlInserir = "INSERT INTO cadastro (cpf, email, senha, endereco, enderecoNumero, cidade, estado) VALUES ('$cpf', '$email', '$senha', '$endereco', '$enderecoNumero', '$cidade', '$estado')";

if ($conn->query($sqlInserir) === TRUE) {
    echo "Sucesso: Usuário cadastrado com sucesso.";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
