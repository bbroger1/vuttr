# API VUTTR

Desafio Back-end da BossaBox

Sua tarefa é construir uma API e banco de dados para a aplicação VUTTR (Very Useful Tools to Remember). A aplicação é um simples repositório para gerenciar ferramentas com seus respectivos nomes, links, descrições e tags. Utilize um repositório Git (público, de preferência) para versionamento e disponibilização do código.

A aplicação pode ser construída utilizando qualquer linguagem, banco de dados, frameworks, libraries e ferramentas de sua preferência (Ex: Node + Express + Mongoose + MongoDB, PHP + Lumen + RedBean + PostgreSQL, etc). Apesar disso, a stack mais comum para squads aqui na BossaBox é Node.js, seguida por PHP. Ruby é incomum, mas aparece em raros casos.

A API deverá ser documentada utilizando o formato API Blueprint ou Swagger.

## Linguagem utilizada

Na construção da API foi utilizada a linguagem PHP, com a utilização do microframework Lumen. Além de autenticação com o pacote jwt-auth, mysql como banco de dados.

## Instalação

- Clone esse repositório ou faça o download;
- Instale o Composer - Composer install;
- Crie o banco de dados;
- Altere o arquivo .env.example para .env e altere as configurações do seu banco de dados;
- Gere a chave secret do pacote JWT - php artisan jwt:secret;
- Rode as migrations para criação das tabelas users e tools - php artisan migrate.

## Utilização

- suba o servidor interno do PHP - php -S 127.0.0.1:3000 -t public;
- utilize o Postman, ou outra ferramenta de sua preferência, para realização dos testes:
    - crie um usuário na rota http://127.0.0.1:3000/api/register;
    - faça login com os dados desse usuário;
    - teste as demais rotas.

## Documentação

A documentação foi feita no formato API Blueprint e está disponível no caminho: public/documentation/index.html

## Vídeo de apresentação

O vídeo de apresentação está disponível no link: https://youtu.be/CSGia6UCNlU
