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
        <span>&#x270C; PHP-COMMERCE</span>
        <nav class="content-menu">
            <a href="/produtos">Produtos</a>
            <a href="/carrinho">Carrinho</a>
        </nav>
    </header>
    <div class="container">
        <form action="/produtos">
            <button type="submit" class="success-btn">
                &#x21d0; Voltar as compras
            </button>
        </form>
        <h1>Resumo do Pedido &#x2714;</h1>
        <div class="content-resumo">
            <p><strong>Número do Pedido:</strong> <?php echo $numeroPedido; ?></p>
            <p><strong>Total Bruto:</strong> R$ <?php echo number_format($totais['total_bruto'], 2, ',', '.'); ?></p>
            <p><strong>Impostos:</strong> R$ <?php echo number_format($totais['total_impostos'], 2, ',', '.'); ?></p>
            <p><strong>Total Líquido:</strong> R$ <?php echo number_format($totais['total_liquido'], 2, ',', '.'); ?></p>
            <button class="success-btn">&#x2756; Gerar chave pix</button>
        </div>
    </div>
</body>

</html>