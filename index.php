<!DOCTYPE html>
<html ng-app="listaTelefonica">
    <head>
        <meta charset="utf-8"/>
        <title>Agenda Angular</title>
        <link rel="stylesheet" href="lib/bootstrap-3.3.5-dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="lib/css/default.css"/>
        <script src="lib/angular/angular.js"></script>
        <script src="lib/angular/angular-messages.js"></script>
        <script>
            var app = angular.module("listaTelefonica", ["ngMessages"]);

            app.controller("listaTelefonicaCtrl", function ($scope) {
                $scope.titulo = "Lista Telefonica";

                $scope.contatos = [
                    {nome: "Adriano", telefone: "99846-0117", data: new Date(), operadora: {nome: "Vivo", codigo: "15"}},
                    {nome: "Polania", telefone: "99934-2970", data: new Date(), operadora: {nome: "Vivo", codigo: "15"}},
                    {nome: "Thiago", telefone: "99987-3321", data: new Date(), operadora: {nome: "Vivo", codigo: "15"}},
                    {nome: "Pai", telefone: "99994-9000", data: new Date(), operadora: {nome: "Vivo", codigo: "15"}}
                ];

                $scope.operadoras = [
                    {nome: "Oi", codigo: "14", tipo: "celular", preco: 2},
                    {nome: "VIvo", codigo: "15", tipo: "celular", preco: 1},
                    {nome: "Tim", codigo: "41", tipo: "celular", preco: 3},
                    {nome: "GVT", codigo: "25", tipo: "Fixo", preco: 1},
                    {nome: "Embratel", codigo: "21", tipo: "Fixo", preco: 2},
                ];

                $scope.adicionarContato = function (contato) {
                    $scope.contatos.push(angular.copy(contato));
                    delete $scope.contato;
                    $scope.contatoForm.$setPristine();
                };

                $scope.apagarContatos = function (contatos) {
                    $scope.contatos = contatos.filter(function (contato) {
                        if (!contato.selecionado)
                            return contato;
                    });
                };

                $scope.isContatoSelecionado = function (contatos) {
                    return contatos.some(function (contato) {
                        return contato.selecionado;
                    });
                };

                $scope.ordernarPor = function (campo) {
                    $scope.criterioDeOrdenacao = campo;
                    $scope.direcaoDaOrdenacao = !$scope.direcaoDaOrdenacao;
                };

            });
        </script>
    </head>

    <body ng-controller="listaTelefonicaCtrl">
        <div class="jumbotron">
            <h1>{{titulo}}</h1>
            <input class="form-control" ng-model="criterioDeBusca" type="text" placeholder="O que você esta buscando?"/>
            <table class="table" ng-if="contatos.length > 0">
                <thead>
                    <tr>
                        <th></th>
                        <th><a href='' ng-click="ordernarPor('nome')">Nome</a></th>
                        <th><a href='' ng-click="ordernarPor('telefone')">Telefone</a></th>
                        <th>Operadoras</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-class="{'selecionado negrito': contato.selecionado}" ng-repeat="contato in contatos| filter:criterioDeBusca | orderBy:criterioDeOrdenacao:direcaoDaOrdenacao">
                        <td><input type="checkbox" ng-model="contato.selecionado"></td>
                        <td>{{contato.nome}}</td>
                        <td>{{contato.telefone}}</td>
                        <td>{{contato.operadora.nome}}</td>
                        <td>{{contato.data| date:'dd/MM/yyyy HH:mm'}}</td>
                    </tr>
                </tbody>
            </table>
            
            <form name='contatoForm'>
                <input class="form-control" type="text" name="nome" placeholder="Nome" ng-model="contato.nome" ng-required="true" ng-minlength="10"/>
                <input class="form-control" type="text" name="telefone" placeholder="Telefone" ng-model="contato.telefone" ng-required="true" ng-pattern="/^\d{4,5}-\d{4}$/"/>
                <select class="form-control" ng-model="contato.operadora" ng-options="operadora.nome group by operadora.tipo for operadora in operadoras | orderBy:'nome'">
                    <option value="">Selecione um operadora</option>
                </select>
            </form>

            <button class="btn btn-primary btn-block" ng-click="adicionarContato(contato)" ng-disabled="contatoForm.$invalid">Adicionar Contato</button>
            <button class="btn btn-danger btn-block" ng-click="apagarContatos(contatos)" ng-hide="!isContatoSelecionado(contatos)">Apagar Contatos</button>

            <div ng-show="contatoForm.nome.$dirty" ng-messages="contatoForm.nome.$error">
                <div class="alert alert-danger" ng-message="required">
                    Por favor, preencha o campo nome.
                </div>

                <div class="alert alert-danger" ng-message="minlength">
                    O campo nome deve ter no minimo 10 caracteres.
                </div>
            </div>

            <div class="alert alert-danger" ng-show="contatoForm.telefone.$error.required && contatoForm.telefone.$dirty">
                Por favor, preencha o campo telefone.
            </div>

            <div class="alert alert-danger" ng-show="contatoForm.telefone.$error.pattern">
                O campo telefone deve ter o padrão 99999-9999.
            </div>

        </div>
        <div ng-include="'inc/footer.html'"></div>
    </body>
</html>
