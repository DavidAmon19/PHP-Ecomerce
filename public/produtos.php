<?php
require_once '../vendor/autoload.php';

use App\Categoria;
use App\Produto;
use App\Carrinho;

session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = new Carrinho();
}

$carrinho = $_SESSION['carrinho'];


$categoriaNotebook = new Categoria('Notebooks', 6);
$categoriaSmartphone = new Categoria('Smart Phones', 8);
$categoriaEletrodomesticos = new Categoria('Eletrodomésticos', 10);

$produtos = [
    new Produto('Laptop Dell', 3000, $categoriaNotebook, 'imagens/laptop-dell.jpg'),
    new Produto('iPhone 12', 4000, $categoriaSmartphone, 'imagens/iphone-12.jpg'),
    new Produto('Geladeira Electrolux', 2500, $categoriaEletrodomesticos, 'imagens/geladeira-electrolux.jpg'),
    new Produto('Micro-ondas Panasonic', 800, $categoriaEletrodomesticos, 'imagens/micro-ondas-panasonic.jpg')
];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeProduto = $_POST['produto_nome'];
    $quantidade = (int)$_POST['quantidade'];

    foreach ($produtos as $produto) {
        if ($produto->getNome() === $nomeProduto) {
            $carrinho->adicionarProduto($produto, $quantidade);
            break;
        }
    }

    header('Location: produtos.php?acao=escolher');
    exit;
}


if (isset($_GET['acao']) && $_GET['acao'] === 'escolher') {
    $mostrarOpcoes = true;
} else {
    $mostrarOpcoes = false;
}
?>

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
        <span>&#x270C; PHP-COMERCE</span>
        <nav class="content-menu">
            <a href="produtos.php">Produtos</a> 
            <a href="index.php">Carrinho</a>
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
                            <form method="POST" action="produtos.php">
                                <input type="number" name="quantidade" value="1" min="1">
                                <input type="hidden" name="produto_nome" value="<?php echo $produto->getNome(); ?>">
                                <button class="success-btn" type="submit">Adicionar ao Carrinho</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if ($mostrarOpcoes): ?>
            <div class="actions-container">
                <form action="produtos.php">
                    <button class="success-btn" type="submit" id="btn-continuar">Continuar comprando</button>
                </form>
                <form action="index.php" style="display: inline;">
                    <button type="submit" id="btn-finalizar" class="success-btn">
                        &#x2714; Conferir carrinho
                    </button>
                </form>
            </div>
            <div class="progress-bar-container">
                <div id="progress-bar"></div>
            </div>
        <?php endif; ?>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.location.href.includes('acao=escolher')) {
                document.querySelector('.actions-container').scrollIntoView({
                    behavior: 'smooth'
                });
                startProgressBar();
            }
        });

        function startProgressBar() {
            const progressBar = document.getElementById('progress-bar');
            const buttonsContainer = document.querySelector('.actions-container');
            const progressBarContainer = document.querySelector('.progress-bar-container');


            let width = 0;
            const interval = setInterval(function() {
                width += 1;
                progressBar.style.width = width + '%';
                if (width >= 100) {
                    clearInterval(interval);
                    buttonsContainer.classList.add('hidden');
                    progressBarContainer.classList.add('hidden');
                }
            }, 80);

            document.getElementById('btn-continuar').addEventListener('click', function() {
                buttonsContainer.classList.add('hidden');
                progressBarContainer.classList.add('hidden');
            });

        }
    </script>


</body>

</html>