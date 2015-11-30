<!DOCTYPE html>
<html ng-app="app">
    <head>
        <meta charset="UTF-8">
        <title>Administração</title>
        <link rel="stylesheet" href="lib/bootstrap-3.3.5-dist/css/bootstrap.css"/>
        <script src="lib/jquery/jquery-2.1.4.js"></script>
        <script src="lib/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
        <script src="lib/angular/angular.js"></script>
        <script src="js/app.js"></script>
        <script src="js/controller.js"></script>
    </head>
    <body ng-controller="Admin">
        <section class="section">
            <div class="container">
                <div class="jumbotron">
                    <h1>{{titulo}}</h1>
                    <table class="table table-striped">
                        <thead>          
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="contato in contatos">
                                <td>{{contato.id}}</td>
                                <td>{{contato.nome}}</td>
                                <td>{{contato.telefone}}</td>
                                <td>{{contato.endereco}}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <input class="form-control" placeholder="Nome" type="text" name="nome" ng-model="contato.nome" />
                    <input class="form-control" placeholder="Telefone" type="text" name="telefone" ng-model="contato.telefone" />
                    <input class="form-control" placeholder="Endereço" type="text" name="endereco" ng-model="contato.endereco" />
                    <select class="form-control" ng-model="contato.operadora" ng-options="operadora.nome for operadora in operadoras">
                        <option value="">Selecione uma operadora</option>
                    </select>
                    <input class="btn btn-block" type="button" ng-click="AddContato(contato)" value="Adicionar Contato"/>
                </div>
            </div>
        </section>
    </body>
</html>
