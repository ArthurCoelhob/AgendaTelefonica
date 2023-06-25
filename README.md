Passo a passo configuração do projeto

- git clone https://github.com/ArthurCoelhob/AgendaTelefonica.git
- entrar na pasta AgendaTelefonica
- rodar comando "composer update"
- criar arquivo .env(.env.example pode ser copiada e utilizada como exemplo)
- setar configurações do banco (agendaTelefonicaDB.sqlite.sql || agendaTelefonica.sqlite)
- -> examplo:


  <div> DB_CONNECTION=sqlite</div>
  <div> DB_HOST=127.0.0.1</div>
  <div> DB_PORT=3306</div>
  <div> DB_DATABASE=caminho -> exemplo /home/arthur/agendaTelefonicaDB.sqlite</div>
  <div> DB_USERNAME=root</div>
  <div> DB_PASSWORD=</div>
  
  - rodar comando rodar - php artisan serve
  - será retornado a url para acessar o projeto -> exemplo http://127.0.0.1:8000
  - adicionar na frente da url /contatos para acessar a pagina do projeto
 
  - http://127.0.0.1:8000/contatos

