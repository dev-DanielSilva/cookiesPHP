<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST['produtos'] as $produto => $valor) {
        setcookie($produto, $valor, time() + 20);
    }
    header("Location: carrinho.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
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
        <h1>Produtos</h1>
        <form method="POST" action="index.php">
            <div id="produtos">
                <!-- Produtos individuais -->
                <div class="produto">
                    <img src="assets/anilhas.png" alt="">
                    <p>Anilhas</p>
                    <input type="checkbox" name="produtos[anilhas]" value="250.00">
                </div>
                <div class="produto">
                    <img src="assets/barraReta.png" alt="">
                    <p>Barra Reta</p>
                    <input type="checkbox" name="produtos[barraReta]" value="120.00">
                </div>
                <div class="produto">
                    <img src="assets/halter.png" alt="">
                    <p>Kit Halteres</p>
                    <input type="checkbox" name="produtos[halter]" value="200.00">
                </div>
                <div class="produto">
                    <img src="assets/rack.png" alt="">
                    <p>Rack</p>
                    <input type="checkbox" name="produtos[rack]" value="500.00">
                </div>
                <div class="produto">
                    <img src="assets/barraFixa.png" alt="">
                    <p>Barra Fixa</p>
                    <input type="checkbox" name="produtos[barraFixa]" value="150.00">
                </div>
            </div>
            <div class="button-container">
                <button type="submit">Adicionar ao Carrinho</button>
            </div>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Iron Fit. Todos os direitos reservados.</p>
        <p>GitHub: dev-DanielSilva</p>
    </footer>
</body>

</html>