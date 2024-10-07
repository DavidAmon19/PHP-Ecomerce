<?php
require_once '../vendor/autoload.php';

use App\Carrinho;

session_start();
$carrinho = $_SESSION['carrinho'] ?? new Carrinho();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeProduto = $_POST['produto_nome'];
    $acao = $_POST['acao'];

    if ($acao === 'editar') {
        $novaQuantidade = (int)$_POST['quantidade'];

        if ($novaQuantidade === 0) {
            $carrinho->removerProduto($nomeProduto);
        } else {
            $carrinho->editarQuantidade($nomeProduto, $novaQuantidade);
        }
    }

    if ($acao === 'remover') {
        $carrinho->removerProduto($nomeProduto);
    }

    $_SESSION['carrinho'] = $carrinho;
}

$itens = $carrinho->listarItens();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Carrinho de Compras</title>
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
        <h1>Produtos no Carrinho</h1>

        <?php if (empty($itens)): ?>
            <p style="text-align: center;">Seu carrinho está vazio. Adicione produtos para continuar.&#x270C;</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($itens as $item): ?>
                        <tr>
                            <td><?php echo $item['produto']->getNome(); ?></td>
                            <td>R$ <?php echo number_format($item['produto']->getPreco(), 2, ',', '.'); ?></td>
                            <td>
                                <form method="POST" action="index.php">
                                    <input type="number" name="quantidade" value="<?php echo $item['quantidade']; ?>" min="0">
                                    <input type="hidden" name="produto_nome" value="<?php echo $item['produto']->getNome(); ?>">
                                    <button type="submit" name="acao" class="warning-btn" value="editar">Atualizar</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="index.php">
                                    <input type="hidden" name="produto_nome" value="<?php echo $item['produto']->getNome(); ?>">
                                    <button class="remove-btn" type="submit" name="acao" value="remover">Remover</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div style="margin-top: 20px;" class="content-buttons">
                <form action="produtos.php">
                    <button type="submit" class="success-btn">
                        &#x21d0; Adicionar mais Produtos
                    </button>
                </form>
                <form action="resumo.php">
                    <button type="submit" class="success-btn">
                        Finalizar Compra &#x21d2;
                    </button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
