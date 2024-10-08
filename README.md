# PHP E-commerce

- Este projeto é uma aplicação de e-commerce simples, desenvolvida em PHP, com funcionalidades de carrinho de compras, cálculo de impostos e valores, e testes automatizados. A seguir, você encontrará as instruções para rodar o projeto localmente.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação principal.
- **Composer**: Gerenciador de dependências para PHP.
- **PHPUnit**: Framework para testes automatizados.
- **HTML/CSS**: Para a interface do usuário.
- **PHP Sessions**: Para gerenciamento de sessão do carrinho.

## Clonando o Projeto
Para clonar o repositório, execute o seguinte comando no seu terminal:

```bash

git clone https://github.com/DavidAmon19/PHP-Ecomerce.git

```

## Acesse a pasta

```bash
cd projeto-ecomerce

```


## Instalação das Dependências
- Após clonar o projeto, é necessário instalar as dependências via Composer:

``` bash
composer install

```

## Como Rodar o Projeto

- Para rodar o projeto, você pode usar o servidor embutido do PHP:

```bash
php -S localhost:8000 -t public

```

## Em seguida, abra o navegador e acesse http://localhost:8000.

## Rodando os Testes
- Os testes foram desenvolvidos utilizando o PHPUnit. Para executá-los, siga as instruções abaixo:

- Certifique-se de que o PHPUnit está instalado. Caso contrário, instale-o via Composer:

```bash
composer require --dev phpunit/phpunit

```

## Execute os testes com o seguinte comando:

```bash
./vendor/bin/phpunit --testdox tests/

```

- Os testes cobrem funcionalidades de carrinho de compras e cálculo de valores.

## Estrutura de Diretórios

```bash
projeto-ecomerce
├─ composer.json                 # Arquivo de configuração do Composer com dependências do projeto
├─ composer.lock                 # Arquivo que bloqueia as versões instaladas das dependências
├─ public/                       # Pasta pública contendo arquivos acessíveis via URL
│  ├─ carrinho.php               # Página para visualizar e gerenciar o carrinho de compras
│  ├─ imagens/                   # Pasta com imagens dos produtos
│  │  ├─ geladeira-electrolux.jpg
│  │  ├─ iphone-12.jpg
│  │  ├─ laptop-dell.jpg
│  │  └─ micro-ondas-panasonic.jpg
│  ├─ index.php                  # Arquivo principal de entrada para a aplicação
│  ├─ produtos.php               # Página para listar os produtos disponíveis para compra
│  ├─ resumo.php                 # Página para visualizar o resumo final do pedido
│  └─ style.css                  # Arquivo de estilos CSS para o layout da aplicação
├─ routes.php                    # Arquivo de definição das rotas da aplicação
├─ src/                          # Diretório contendo a lógica principal do projeto
│  ├─ Carrinho.php               # Classe de gerenciamento de itens no carrinho de compras
│  ├─ Categoria.php              # Classe que define a categoria de produtos e seu imposto
│  ├─ Controller/                # Diretório com os controladores da aplicação
│  │  ├─ CarrinhoController.php  # Controlador para o carrinho de compras
│  │  ├─ ProdutoController.php   # Controlador para listagem e manipulação de produtos
│  │  └─ ResumoController.php    # Controlador para exibição do resumo do pedido
│  ├─ Produto.php                # Classe que define o produto e suas características
│  ├─ Router.php                 # Classe responsável por roteamento de URLs e redirecionamento
│  └─ Service/                   # Diretório com serviços específicos do projeto
│     └─ CarrinhoService.php     # Serviço para cálculo de totais do carrinho
└─ tests/                        # Diretório com os testes automatizados
   ├─ CarrinhoTest.php           # Testes para a classe Carrinho
   └─ CategoriaTest.php          # Testes para a classe Categoria

```

## Funcionalidades
- Adicionar, remover e editar produtos no carrinho.
- Cálculo automático de impostos e valores.
- Testes automatizados para garantir a funcionalidade das principais partes do sistema.

## Contribuindo
- Fique à vontade para abrir uma issue ou enviar um pull request com sugestões de melhorias ou correções.

## Licença
- Este projeto está sob a licença MIT.