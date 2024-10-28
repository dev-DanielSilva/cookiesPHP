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
            $produtos = [
                'anilhas' => ['nome' => 'Anilhas', 'imagem' => 'assets/anilhas.png'],
                'barraReta' => ['nome' => 'Barra Reta', 'imagem' => 'assets/barraReta.png'],
                'halter' => ['nome' => 'Kit Halteres', 'imagem' => 'assets/halter.png'],
                'rack' => ['nome' => 'Rack', 'imagem' => 'assets/rack.png'],
                'barraFixa' => ['nome' => 'Barra Fixa', 'imagem' => 'assets/barraFixa.png']
            ];

            $total = 0;

            foreach ($_COOKIE as $produto => $valor) {
                if (isset($produtos[$produto])) {
                    echo "<tr>";
                    echo "<td><img src='" . $produtos[$produto]['imagem'] . "' alt='" . $produtos[$produto]['nome'] . "' width='100' height='100'></td>";
                    echo "<td>" . $produtos[$produto]['nome'] . "</td>";
                    echo "<td>" . number_format($valor, 2, ',', '.') . "</td>";
                    echo "</tr>";
                    $total += $valor;
                }
            }
            ?>

            <tr>
                <td colspan="2"><strong>Total</strong></td>
                <td><strong>R$ <?php echo number_format($total, 2, ',', '.'); ?></strong></td>
            </tr>
        </table>
        <div class="button-container">
            <a href="index.php"><button>Voltar para Produtos</button></a>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Iron Fit. Todos os direitos reservados.</p>
        <p>GitHub: dev-DanielSilva</p>
    </footer>
</body>

</html>