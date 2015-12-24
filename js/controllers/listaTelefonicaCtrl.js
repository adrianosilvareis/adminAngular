app.controller("listaTelefonicaCtrl", function ($scope, $http) {
    $scope.titulo = "Lista Telefonica";

    $scope.contatos = [];

    $scope.operadoras = [];

    var carregarContatos = function () {
        $http.get("php/contatos.php").success(function (data) {
            $scope.contatos = data;
        });
    };

    var carregarOperadoras = function () {
        $http.get("php/operadoras.php").success(function (data) {
            $scope.operadoras = data;
        });
    };

    $scope.adicionarContato = function (contato) {
        contato.data = new Date();
        $http.post("php/pushContato.php", contato).success(function (data) {
            delete $scope.contato;
            $scope.contatoForm.$setPristine();
            carregarContatos();
            $scope.message = data;
        });
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

    carregarContatos();
    carregarOperadoras();

});