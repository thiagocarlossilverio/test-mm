<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center"><a href="https://angularjs.org/" target="_blank"><img src="https://dwglogo.com/wp-content/uploads/2017/03/1250px-AngularJS_logo.png" width="400"></a></p>


### Teste MM: Laravel, AngularJS e bootstrap <br/><br />

- Crud clientes, nome e email<br />
- API: Crud<br />
<br/>

# Iniciando o Projeto
-1º git clone https://github.com/thiagocarlossilverio/test-mm.git<br/>
-2° cd /test-mm<br/>
-3º dar as permissões de acesso nos diretorios: sudo chmod 777 -R storage e sudo chmod 777 -R public<br/>
-4º composer install ou composer update<br/>
-5° Criar sua base de dados MYSQL;<br/>
-6° Configurar os parametros de conexão ao banco, no arquivo .env;<br/>
-7º criar a tabela referente ao CRUD, executando o seguinte comando: php artisan migrate;<br/>
-8° Se necessário, criar o virtual host no apache, direcionando para a pasta publica;<br/>
<br/><br/><br/>

# Observações
Talvez seja necessario mudar o IP ou hostaname no arquivo: test-mm/public/app/app.js
para a execução correta.
<br/><br/>


Caso não queira executar o projeto em sua maquina, coloquei o mesmo em produção
<br/><br/><br/>
Só acessar o seguinte IP: http://179.189.29.153/
