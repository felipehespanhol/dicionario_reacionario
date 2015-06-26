var NovoArgumentoController = function($scope, $location, Argumento) {
  $scope.novoArgumento = new Argumento();

  $scope.cadastrarArgumento = function() {
    Argumento.save($scope.novoArgumento, function() {
      $location.path('/');
    });
  };
};
dicionario.controller('NovoArgumentoController', ['$scope', '$location', 'Argumento', NovoArgumentoController]);
