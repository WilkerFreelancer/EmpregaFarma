<?php
// Inclui a conexão com o banco de dados
include 'db_connection.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $area = $_POST['area'];
    $localizacao = $_POST['localizacao'];
    $experiencia = $_POST['experiencia'];
    $habilidades = $_POST['habilidades'];

    // Upload da foto do candidato
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_destino = "uploads/" . basename($foto);
    move_uploaded_file($foto_tmp, $foto_destino);

    // Upload do currículo em PDF
    $curriculo = $_FILES['curriculo']['name'];
    $curriculo_tmp = $_FILES['curriculo']['tmp_name'];
    $curriculo_destino = "uploads/" . basename($curriculo);
    move_uploaded_file($curriculo_tmp, $curriculo_destino);

    // Insere os dados no banco de dados
    $sql = "INSERT INTO curriculos (nome_candidato, area_interesse, localizacao, foto_candidato, experiencia, habilidades, curriculo) 
            VALUES ('$nome', '$area', '$localizacao', '$foto_destino', '$experiencia', '$habilidades', '$curriculo_destino')";

    if ($conn->query($sql) === TRUE) {
        echo "Currículo cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Fecha a conexão
$conn->close();
?>
