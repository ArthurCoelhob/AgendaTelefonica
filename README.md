Passo a passo configuração do projeto

- git clone https://github.com/ArthurCoelhob/AgendaTelefonica.git
- entrar na pasta AgendaTelefonica
- rodar comando "composer update"
- criar arquivo .env(.env.example pode ser copiada e utilizada como exemplo)
- setar configurações do banco -> examplo:
  DB_CONNECTION=sqlite
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=caminho -> exemplo /home/arthur/agendaTelefonicaDB.sqlite
  DB_USERNAME=root
  DB_PASSWORD=

  - rodar comando rodar - php artisan serve
  - será retornado a url para acessar o projeto -> exemplo http://127.0.0.1:8000
  - adicionar na frente da url /contatos para acessar a pagina do projeto
 
  - http://127.0.0.1:8000/contatos

