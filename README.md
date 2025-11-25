📌 README (PT-BR)
PLATV – Sistema de Cadastro e Consulta

Um sistema web desenvolvido em PHP, com MySQL, contendo login seguro, gerenciamento de usuários, busca, cadastro e edição de dados.

🚀 Funcionalidades do Sistema

✔ Tela de login protegida
✔ Controle de sessão (impede acesso via URL sem login)
✔ Painel principal com 3 funções:

Buscar registros

Cadastrar registros

Alterar dados de acesso (usuário/senha)
✔ CRUD completo:

Criar

Ler

Atualizar

Deletar
✔ Edição do usuário do sistema (table entrar)
✔ Sistema estilizado com CSS moderno
✔ Banco de dados MySQL hospedado no InfinityFree

🗂 Estrutura do Projeto
/formulario
│── home.php           → Login do sistema
│── login.php          → Menu principal
│── sistema.php        → Tela de busca/listagem
│── formulario.php     → Cadastro de novos registros
│── edit.php           → Edição dos registros
│── usuario.php        → Troca de usuário/senha
│── usuarioEdit.php    → Atualização no banco (table entrar)
│── delete.php         → Exclusão de registros
│── config.php         → Conexão MySQL
│── fotos.jpeg         → Imagem de fundo

🗄 Banco de Dados
🔹 Tabela: usuarios

Usada para armazenar os registros cadastrados.

Campo	Tipo
id	INT (PK)
nome	VARCHAR
setor	VARCHAR
email	VARCHAR
telefone	VARCHAR
sexo	VARCHAR
data_nasc	DATE
cidade	VARCHAR
estado	VARCHAR
endereco	VARCHAR
🔹 Tabela: entrar

Usada para o login do sistema.

Campo	Tipo
id	INT (PK)
usuario	VARCHAR
senha	VARCHAR
🧩 Tecnologias Utilizadas

PHP 8+

MySQL

HTML5 / CSS3

InfinityFree Hosting

phpMyAdmin

🌐 Hospedagem no InfinityFree

Criar conta em
https://infinityfree.net

Criar domínio gratuito (ex.: seuprojeto.infinityfreeapp.com)

Enviar os arquivos para htdocs/ usando:

Gerenciador de Arquivos OU

FileZilla (FTP)

Criar banco de dados em:

vPanel → MySQL Databases

Configurar config.php com seus dados:

<?php
$dbHost = 'sqlXXX.infinityfree.com';
$dbUsername = 'seu_usuario';
$dbPassword = 'sua_senha';
$dbName = 'seu_banco';
$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
?>


Importar o arquivo .sql no phpMyAdmin

Acessar seu site normalmente pelo domínio.

🔐 Segurança Básica

Sessão impede acesso via URL direta

Editar usuário/senha passa por validação

O sistema não funciona sem login ativo

📎 Contribuindo

Pull Requests são bem-vindos!
Se quiser melhorar design, segurança ou adicionar funções novas, fique à vontade.

🧑‍💻 Autor

Projeto desenvolvido por João Mantovano.
Obrigado por acompanhar até o final! 🙌🔥

📘 README (ENGLISH)
PLATV – Registration & Search System

A web system built using PHP and MySQL, featuring login authentication, record management, user editing, and a modern UI.

🚀 System Features

✔ Protected login page
✔ Session control (blocks direct URL access)
✔ Main Menu:

Search Records

Register New Records

Change Login Credentials
✔ Full CRUD:

Create

Read

Update

Delete
✔ Edit system login credentials (table entrar)
✔ Styled layout with modern CSS
✔ Database hosted on InfinityFree

🗂 Project Structure
/formulario
│── home.php
│── login.php
│── sistema.php
│── formulario.php
│── edit.php
│── usuario.php
│── usuarioEdit.php
│── delete.php
│── config.php
│── fotos.jpeg

🗄 Database
Table: usuarios (main data)
Table: entrar (login credentials)
🧩 Technologies Used

PHP 8+

MySQL

HTML5 / CSS3

InfinityFree Hosting

phpMyAdmin

🌐 Hosting on InfinityFree

Create account

Upload project to htdocs/

Create MySQL database

Configure config.php

Import your .sql dump

Access your site

🧑‍💻 Author

Developed by João Mantovano.
