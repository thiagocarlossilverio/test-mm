<!doctype html>
<html lang="en" ng-app="registroClientes">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"crossorigin="anonymous">
      <title>Crud teste MM</title>
   </head>
   <body>
      <div class="container" ng-controller="clientesController">
         <header>
            <h2>E-mails Base de Dados</h2>
         </header>
         <div>
            <table class="table">
               <thead>
                  <tr>
                     <th>ID:</th>
                     <th>Nome:</th>
                     <th>Email:</th>
                     <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Adicionar</button></th>
                     <th>
                        <input type="text" class="form-control input-sm ng-valid ng-dirty" placeholder="Pesquisar" ng-change="searchDB()" ng-model="searchText" name="table_search" title="Pesquisar" tooltip="Pesquisar" data-original-title="O comprimento mínimo de caracteres é 3">
                    </th>
                  </tr>
               </thead>
               <tbody>
                  <tr ng-repeat="cliente in clientes">
                     <td>[[ cliente.id ]]</td>
                     <td>[[ cliente.nome ]]</td>
                     <td>[[ cliente.email ]]</td>
                     <td>
                        <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', cliente.id)">Editar</button>
                        <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(cliente.id)">Deletar</button>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <!-- Modal -->
         <div class="modal fade" id="myModal" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">[[form_title]]</h5>
                     <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form name="form_clientes" class="form-horizontal"
                        novalidate="">
                        <div class="form-group error">
                           <label for="nome" class="col-sm-12 control-label">Nome</label>
                           <div class="col-sm-12">
                              <input type="text" class="form-control has-error" id="nome" name="nome" placeholder="Nome Completo" value="[[nome]]" ng-model="cliente.nome" ng-required="true">
                              <span class="help-inline" ng-show="form_clientes.nome.$invalid && form_clientes.nome.$touched">Por favor insira seu nome!</span>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="email" class="col-sm-12 control-label">Email</label>
                           <div class="col-sm-12">
                              <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="[[email]]" ng-model="cliente.email" ng-required="true">
                              <span class="help-inline"ng-show="form_clientes.email.$invalid && form_clientes.email.$touched">Por favor insira um e-mail valido</span>
                           </div>
                        </div>
                        
                     </form>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                     <button type="button" class="btn btn-primary" id="btn-save" ng-click="salvar(modalstate, id)" ng-disabled="form_clientes.$invalid">Salvar</button>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
      
      <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
      <script
         src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
      <script
         src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-animate.min.js"></script>
      <script
         src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-route.min.js"></script>

      <!-- AngularJS aplicação Scripts -->
      <script src="<?= asset('app/app.js') ?>"></script>
      <script src="<?= asset('app/controllers/clientesController.js') ?>"></script>
   </body>
</html>