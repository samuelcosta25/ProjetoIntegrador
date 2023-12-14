<?php
session_start();

// Adicione mensagens de depuração
error_log("Início do logout.php");

// Destruir a sessão
session_destroy();

// Adicione mais mensagens de depuração
error_log("Sessão destruída");

// Redirecionar para a página de login ou outra página após o logout
header("Location: index.html");
exit();
?>

