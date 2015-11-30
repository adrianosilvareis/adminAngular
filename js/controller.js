/* global app */

app.controller("Admin", function($scope){
    $scope.titulo = "Adriano";
    $scope.contatos = [
        {id:"1",nome:"Adriano",telefone:"9 9846-0117",endereco:"Rua Cristovão Alvarenga, N 76"},
        {id:"2",nome:"Thiago",telefone:"9 9987-3321",endereco:"Rua Padre Emilio Miotti, N 81"},
        {id:"3",nome:"Polania",telefone:"9 9934-2970",endereco:"Av Vitoria, SN"}
    ];
    $scope.operadoras = [
        {nome: "Oi", codigo: "14"},
        {nome: "Vivo", codigo: "15"},
        {nome: "Tim", codigo: "41"},
    ];
    
    $scope.AddContato = function(contato){
        $scope.contatos.push(angular.copy(contato));
        delete $scope.contato;
    };
});