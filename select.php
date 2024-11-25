<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['produtos'])) {
    foreach ($_POST['produtos'] as $idProduto => $valor) {
        // Armazena os produtos selecionados em cookies
        setcookie($idProduto, $valor, time() + 20, "/"); // Expira em 1 hora
    }
    header("Location: carrinho.php"); // Redireciona para o carrinho
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Produtos</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">
                <img src="assets/icon.png" alt="">
            </div>
            <h1>IRON FIT</h1>
        </div>
    </nav>
    <main>
        <h1>Produtos</h1>
        <?php
        // Conexão com o banco de dados
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "ironfit";

        $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        // Consulta para buscar os produtos
        $sql = "SELECT idProduto, nomeProduto, valor, nomeImagem FROM produto";
        $result = $conn->query($sql);
        ?>

        <form method="POST" action="select.php">
            <div id="produtos">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="produto">
                            <img src="assets/<?php echo htmlspecialchars($row['nomeImagem']); ?>"
                                alt="<?php echo htmlspecialchars($row['nomeProduto']); ?>">
                            <p><?php echo htmlspecialchars($row['nomeProduto']); ?></p>
                            <input type="checkbox" name="produtos[<?php echo htmlspecialchars($row['idProduto']); ?>]"
                                value="<?php echo htmlspecialchars($row['valor']); ?>">
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Nenhum produto encontrado.</p>";
                }
                ?>
            </div>
            <div class="button-container">
                <button type="submit">Adicionar ao Carrinho</button>
            </div>
        </form>

        <?php
        $conn->close();
        ?>

    </main>
    <footer>
        <p>&copy; 2024 Iron Fit. Todos os direitos reservados.</p>
        <p>GitHub: dev-DanielSilva</p>
    </footer>
</body>

</html>