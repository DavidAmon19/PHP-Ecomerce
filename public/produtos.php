<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Selecionar Produtos</title>
</head>
<body>
    <header class="content-header">
        <span>&#x270C; PHP-COMMERCE</span>
        <nav class="content-menu">
            <a href="/produtos">Produtos</a> |
            <a href="/carrinho">Carrinho</a>
        </nav>
    </header>
    <div class="container">
        <h1>Selecione os Produtos</h1>
        <table>
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><img src="<?php echo $produto->getImagem(); ?>" alt="<?php echo $produto->getNome(); ?>" style="width: 100px;"></td>
                        <td><?php echo $produto->getNome(); ?></td>
                        <td>R$ <?php echo number_format($produto->getPreco(), 2, ',', '.'); ?></td>
                        <td><?php echo $produto->getCategoria()->getNome(); ?></td>
                        <td>
                            <form method="POST" action="/carrinho/adicionar">
                                <input type="number" name="quantidade" value="1" min="1">
                                <input type="hidden" name="produto_nome" value="<?php echo $produto->getNome(); ?>">
                                <button class="success-btn" type="submit">Adicionar ao Carrinho</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
