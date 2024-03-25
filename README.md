## Configurando o projeto

### 1. Criar database
CREATE DATABASE `frederighi_todo_api`;


### 2. Configurar .env com dados da conexão do banco de dados.

### 3. Executar migration.

### 4. Gerar chave jwt
php artisan jwt:secret

### 5. Configurar endpoint no env do front end
Certifique-se de configurar o endpoint correto na configuração do front end, caso esteja utilizando um ambiente virtual
retire o caminho public da uri.

http://localhost/frederighi-todo-api/public/api/

### 6. Utilizando o sistema.
Ao iniciar os dois serviços, você será redirecionado para a tela de login,
clique no link que redireciona para a tela de cadastro, faça seu cadastro e logue no sistema.
Ao logar terá a tela que lista as tarefas e seus endpoints correspondentes de cadastrar, editar e excluir.

### 7. Endpoints
http://localhost/frederighi-todo-api/public/api/cadastrar \
http://localhost/frederighi-todo-api/public/api/verificar-email \
http://localhost/frederighi-todo-api/public/api/login \
http://localhost/frederighi-todo-api/public/api/tarefas \
http://localhost/frederighi-todo-api/public/api/cadastrar-tarefa \
http://localhost/frederighi-todo-api/public/api/editar-tarefa/2 \
http://localhost/frederighi-todo-api/public/api/excluir-tarefa/2 \
http://localhost/frederighi-todo-api/public/api/exibir-tarefa/1
