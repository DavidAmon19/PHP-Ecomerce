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
projeto-ecomerce/
├─ public/           # Arquivos principais da aplicação (index.php, produtos.php, resumo.php)
├─ src/              # Classes de domínio (Produto, Carrinho, Categoria)
├─ tests/            # Arquivos de testes (CarrinhoTest.php, CategoriaTest.php)
├─ composer.json     # Configuração do Composer
├─ composer.lock     # Lockfile do Composer
├─ .gitignore        # Arquivos e pastas ignorados no repositório
├─ imagens/          # Imagens dos produtos
└─ style.css         # Estilos da aplicação
```

## Funcionalidades
- Adicionar, remover e editar produtos no carrinho.
- Cálculo automático de impostos e valores.
- Testes automatizados para garantir a funcionalidade das principais partes do sistema.

## Contribuindo
- Fique à vontade para abrir uma issue ou enviar um pull request com sugestões de melhorias ou correções.

## Licença
- Este projeto está sob a licença MIT.