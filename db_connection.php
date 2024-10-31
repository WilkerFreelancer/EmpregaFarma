<?php
$servername = "localhost";
$username = "root";  // O XAMPP geralmente usa 'root' como usuário padrão
$password = "";  // Deixe a senha em branco se não configurou nenhuma
$dbname = "site_farmacias";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
