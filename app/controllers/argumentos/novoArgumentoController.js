var NovoArgumentoController = function($scope, $location, Argumento) {
  $scope.novoArgumento = new Argumento();

  $scope.cadastrarArgumento = function() {
    $scope.novoArgumento.$save(function() {
      $location.path('/');
    });
  };
};
dicionario.controller('NovoArgumentoController', NovoArgumentoController);
