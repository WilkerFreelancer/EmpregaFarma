<?php
// Inclui a conexão com o banco de dados
include 'db_connection.php';

// Seleciona as farmácias do banco de dados
$sql = "SELECT nome_farmacia, localizacao, telefone, email, foto_farmacia, descricao FROM farmacias";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagas Disponíveis</title>
    <link rel="stylesheet" href="style.css">
    <style>/* Estilo para a lista de farmácias */
.farmacias-list {
    display: flex; /* Usado para criar um layout flexível */
    flex-wrap: wrap; /* Permite que os itens quebrem para a próxima linha se não houver espaço */
    gap: 20px; /* Espaçamento entre os itens */
}

.farmacia-item {
    width: 230px; /* Largura fixa para cada item */
    padding: 15px; /* Espaçamento interno */
    background-color: #f9f9f9; /* Cor de fundo clara */
    border: 1px solid #ddd; /* Borda sutil */
    border-radius: 5px; /* Bordas arredondadas */
    text-align: center; /* Centraliza o texto */
}

.farmacia-item img {
    width: 100%; /* A imagem ocupa toda a largura do item */
    height: auto; /* Mantém a proporção da imagem */
    border-radius: 5px; /* Bordas arredondadas para a imagem */
}

.farmacia-item h3 {
    font-size: 1.5em; /* Tamanho da fonte do nome da farmácia */
    margin: 10px 0; /* Margem acima e abaixo do título */
}

.farmacia-item p {
    font-size: 0.9em; /* Tamanho da fonte para os detalhes */
    color: #555; /* Cor do texto (cinza) */
}
</style>
</head>
<body>

    <!-- Menu de navegação -->
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="vagas.php">Vagas</a></li>
                <li><a href="curriculos.php">Currículos</a></li>
                <li><a href="cadastro-curriculo.html">Cadastrar Currículo</a></li>
                <li><a href="cadastro-farmacia.html">Cadastrar Vaga</a></li>
                <li><a href="sobre.html">Sobre o Site</a></li>
            </ul>
        </nav>
    </header>


    

    <!-- Exibe as farmácias cadastradas -->
    <section id="vagas">
        <h2>Farmácias Disponíveis</h2>
        <div class="farmacias-list">
            <?php
            if ($result->num_rows > 0) {
                // Exibe cada farmácia
                while($row = $result->fetch_assoc()) {
                    echo "<div class='farmacia-item'>";
                    echo "<img src='" . $row['foto_farmacia'] . "' alt='Foto da Farmácia'>";
                    echo "<h3>" . $row['nome_farmacia'] . "</h3>";
                    echo "<p>Localização: " . $row['localizacao'] . "</p>";
                    echo "<p>Telefone: " . $row['telefone'] . "</p>";
                    echo "<p>Email: " . $row['email'] . "</p>";
                    echo "<p>Descrição: " . $row['descricao'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "Nenhuma farmácia cadastrada ainda.";
            }
            ?>
        </div>
    </section>

</body>
</html>
