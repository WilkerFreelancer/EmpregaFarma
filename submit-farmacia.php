<?php
// Inclui a conexão com o banco de dados
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome_farmacia = $_POST['nome-farmacia'];
    $localizacao = $_POST['localizacao-farmacia'];
    $telefone = $_POST['telefone-farmacia'];
    $email = $_POST['email-farmacia'];
    $descricao = $_POST['descricao-farmacia'];

    // Lida com o upload da foto
    $target_dir = "uploads/";
    $foto_farmacia = $target_dir . basename($_FILES["foto-farmacia"]["name"]);
    move_uploaded_file($_FILES["foto-farmacia"]["tmp_name"], $foto_farmacia);

    // Insere os dados no banco
    $sql = "INSERT INTO farmacias (nome_farmacia, localizacao, telefone, email, foto_farmacia, descricao)
            VALUES ('$nome_farmacia', '$localizacao', '$telefone', '$email', '$foto_farmacia', '$descricao')";

    if ($conn->query($sql) === TRUE) {
        echo "Farmácia cadastrada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>
