<?php
session_start(); // Inicia a sessão ou retoma a sessão existente

// Credenciais fixas (para fins de demonstração)
$valid_username = "exemplo";
$valid_password_hash = md5("123"); 
 
// Recebe dados do formulário
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Verifica se as credenciais estão corretas
if ($username === $valid_username && md5($password) === $valid_password_hash) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("Location: select.php"); // Redireciona para a página restrita
    exit(); // Garante que o redirecionamento ocorra e o script pare aqui
} else {
    echo "Login inválido. <a href='index.php'>Tente novamente</a>."; // Mensagem de erro
}
?>