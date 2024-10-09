# PHP E-commerce

- Este projeto é uma aplicação de e-commerce simples, desenvolvida em PHP, com funcionalidades de carrinho de compras, cálculo de impostos e valores, e testes automatizados. A seguir, você encontrará as instruções para rodar o projeto localmente.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação principal.
- **Composer**: Gerenciador de dependências para PHP.
- **PHPUnit**: Framework para testes automatizados.
- **HTML/CSS**: Para a interface do usuário.
- **PHP Sessions**: Para gerenciamento de sessão do carrinho.
- **Docker**: Para criar e gerenciar contêineres da aplicação.

## Clonando o Projeto
Para clonar o repositório, execute o seguinte comando no seu terminal:

```bash

git clone https://github.com/DavidAmon19/PHP-Ecomerce.git

```

## Acesse a pasta

```bash
cd projeto-ecomerce

```

## Configuração com Docker
- Requisitos: Certifique-se de que você tem o Docker e o Docker Compose instalados.

## 1. Build do contêiner
- Após clonar o projeto, utilize o Docker Compose para construir o contêiner:

```bash
docker-compose build

```

## 2. Subir o contêiner
- Para subir o contêiner e rodar a aplicação, execute:

```bash
docker-compose up

```

- A aplicação estará acessível em http://localhost:8080.


## 3. Derrubar o contêiner
- Para parar e remover os contêineres, você pode usar o comando:

```bash
docker-compose down

```

## Rodando os testes com o Docker
- Acesse o contêiner em execução:

```bash
docker exec -it ecomerce-app bash

```

- Rode os testes com o PHPUnit dentro do contêiner:

```bash
./vendor/bin/phpunit --testdox tests/

```

## Rodando sem o Docker

- caso você prefira rodar o projeto sem o Docker, você pode usar o servidor embutido do PHP.

```bash
php -S localhost:8000 -t public

```

## Instalação das Dependências
- Após clonar o projeto, é necessário instalar as dependências via Composer:

``` bash
composer install

```


## Estrutura de Diretórios

```bash
projeto-ecomerce
├─ .gitattributes                 
├─ .gitignore                     
├─ .htaccess                      
├─ apache.conf                    
├─ composer.json                  
├─ composer.lock                  
├─ docker-compose.yml             
├─ Dockerfile                     
├─ public/                       
│  ├─ carrinho.php               
│  ├─ imagens/                  
│  ├─ index.php                  
│  ├─ produtos.php               
│  ├─ resumo.php                 
│  └─ style.css                  
├─ routes.php                    
├─ src/                          
│  ├─ Carrinho.php               
│  ├─ Categoria.php              
│  ├─ Controller/                
│  ├─ Produto.php                
│  ├─ Router.php                 
│  └─ Service/                   
└─ tests/                        

```

## Funcionalidades
- Adicionar, remover e editar produtos no carrinho.
- Cálculo automático de impostos e valores.
- Testes automatizados para garantir a funcionalidade das principais partes do sistema.

## Contribuindo
- Fique à vontade para abrir uma issue ou enviar um pull request com sugestões de melhorias ou correções.

## Licença
- Este projeto está sob a licença MIT.