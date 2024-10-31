<?php
// Inclui a conexão com o banco de dados
include 'db_connection.php';

// Seleciona os currículos do banco de dados
$sql = "SELECT nome_candidato, area_interesse, localizacao, telefone, email, foto_candidato, experiencia, habilidades, curriculo FROM curriculos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículos Disponíveis</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilo para a lista de currículos */
        .curriculos-list {
            display: flex; /* Usado para criar um layout flexível */
            flex-wrap: wrap; /* Permite que os itens quebrem para a próxima linha se não houver espaço */
            gap: 20px; /* Espaçamento entre os itens */
        }

        .curriculo-item {
            width: 230px; /* Largura fixa para cada item */
            padding: 15px; /* Espaçamento interno */
            background-color: #f9f9f9; /* Cor de fundo clara */
            border: 1px solid #ddd; /* Borda sutil */
            border-radius: 5px; /* Bordas arredondadas */
            text-align: center; /* Centraliza o texto */
        }

        .curriculo-item img {
            width: 100%; /* A imagem ocupa toda a largura do item */
            height: auto; /* Mantém a proporção da imagem */
            border-radius: 5px; /* Bordas arredondadas para a imagem */
        }

        .curriculo-item h3 {
            font-size: 1.5em; /* Tamanho da fonte do nome do candidato */
            margin: 10px 0; /* Margem acima e abaixo do título */
        }

        .curriculo-item p {
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

    

    <!-- Exibe os currículos cadastrados -->
    <section id="curriculos">
        <h2>Currículos Disponíveis</h2>
        <div class="curriculos-list">
            <?php
            if ($result->num_rows > 0) {
                // Exibe cada currículo
                while($row = $result->fetch_assoc()) {
                    echo "<div class='curriculo-item'>";
                    echo "<img src='" . $row['foto_candidato'] . "' alt='Foto do Candidato'>";
                    echo "<h3>" . $row['nome_candidato'] . "</h3>";
                    echo "<p>Área de Interesse: " . $row['area_interesse'] . "</p>";
                    echo "<p>Localização: " . $row['localizacao'] . "</p>";
                    echo "<p>Telefone: " . $row['telefone'] . "</p>";
                    echo "<p>Email: " . $row['email'] . "</p>";
                    echo "<p>Experiência: " . nl2br($row['experiencia']) . "</p>";
                    echo "<p>Habilidades: " . nl2br($row['habilidades']) . "</p>";
                    echo "<p><a href='" . $row['curriculo'] . "' target='_blank'>Ver Currículo (PDF)</a></p>";
                    echo "</div>";
                }
            } else {
                echo "Nenhum currículo cadastrado ainda.";
            }
            ?>
        </div>
    </section>

</body>
</html>
