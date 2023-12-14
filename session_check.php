<?php
session_start();

// Verifica se o usuário está autenticado
$isAuthenticated = isset($_SESSION['user_name']);

// Se o usuário estiver autenticado, obtemos o nome do usuário
$userName = $isAuthenticated ? $_SESSION['user_name'] : "";

// Monta um array com os dados para enviar ao JavaScript
$data = [
    "isAuthenticated" => $isAuthenticated,
    "userName" => $userName,
];

// Converte o array para JSON
echo json_encode($data);
?>
