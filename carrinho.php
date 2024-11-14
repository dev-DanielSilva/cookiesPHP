<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Carrinho</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">
                <img src="assets/logo.png" alt="">
            </div>
            <h1>IRON FIT</h1>
        </div>
    </nav>
    <main>
        <h1>Seu Carrinho de Compras</h1>
        <table border="1">
            <tr>
                <th>Imagem</th>
                <th>Produto</th>
                <th>Preço (R$)</th>
            </tr>
            <?php
            // Conexão com o banco de dados
            $servername = "localhost"; 
            $username = "root"; 
            $password = "";   
            $dbname = "ironfit";       

            // Cria a conexão
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica a conexão
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            // Consulta para obter os produtos
            $sql = "SELECT nomeProduto, nomeImagem FROM produto";
            $result = $conn->query($sql);

            // Inicializa o array de produtos
            $produtos = [];

            // Verifica se há resultados e os adiciona ao array
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Usa o nome como chave e armazena nome e imagem no array
                    $produtos[strtolower(str_replace(' ', '', $row['nomeProduto']))] = [
                        'nome' => $row['nomeProduto'],
                        'imagem' => $row['nomeImagem']
                    ];
                }
            } else {
                echo "Nenhum produto encontrado.";
            }

            $total = 0;

            // Loop pelos cookies para exibir os produtos selecionados
            foreach ($_COOKIE as $produto => $valor) {
                if (isset($produtos[$produto])) {
                    echo "<tr>";
                    echo "<td><img src='assets/" . $produtos[$produto]['imagem'] . "' alt='" . $produtos[$produto]['nome'] . "' width='100' height='100'></td>";
                    echo "<td>" . $produtos[$produto]['nome'] . "</td>";
                    echo "<td>" . number_format($valor, 2, ',', '.') . "</td>";
                    echo "</tr>";
                    $total += $valor;
                }
            }

            // Fecha a conexão com o banco de dados
            $conn->close();
            ?>

            <tr>
                <td colspan="2"><strong>Total</strong></td>
                <td><strong>R$ <?php echo number_format($total, 2, ',', '.'); ?></strong></td>
            </tr>
        </table>
        <div class="button-container">
            <a href="select.php"><button>Voltar para Produtos</button></a>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Iron Fit. Todos os direitos reservados.</p>
        <p>GitHub: dev-DanielSilva</p>
    </footer>
</body>

</html>
