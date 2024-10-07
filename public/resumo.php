<?php
require_once '../vendor/autoload.php'; 
use App\Carrinho;

session_start();

$carrinho = $_SESSION['carrinho'] ?? null;

if (!isset($_SESSION['numero_pedido'])) {
    $_SESSION['numero_pedido'] = rand(1000, 9999);
}
$numeroPedido = $_SESSION['numero_pedido'];

$totais = $carrinho ? $carrinho->calcularTotais() : [
    'total_bruto' => 0,
    'total_impostos' => 0,
    'total_liquido' => 0
];

$_SESSION['carrinho'] = new Carrinho();

unset($_SESSION['numero_pedido']); 
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resumo do Pedido</title>
</head>

<body>
    <header class="content-header">
        <span>&#x270C; PHP-COMERCE</span>
        <nav class="content-menu">
            <a href="produtos.php">Produtos</a>
            <a href="index.php">Carrinho</a>
        </nav>
    </header>
    <div class="container">

        <div class="content-resumo">
            <h1>Resumo do Pedido &#x2714;</h1>
            <p><strong>Número do Pedido:</strong> <?php echo $numeroPedido; ?></p>
            <p><strong>Total Bruto:</strong> R$ <?php echo number_format($totais['total_bruto'], 2, ',', '.'); ?></p>
            <p><strong>Impostos:</strong> R$ <?php echo number_format($totais['total_impostos'], 2, ',', '.'); ?></p>
            <p><strong>Total Líquido:</strong> R$ <?php echo number_format($totais['total_liquido'], 2, ',', '.'); ?></p>
            <button class="success-btn">&#x2756; Gerar chave pix</button>
        </div>
    </div>
</body>

</html>
