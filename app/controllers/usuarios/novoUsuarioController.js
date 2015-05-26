var NovoUsuarioController = function($scope, $location, Usuario) {
  $scope.novoUsuario = new Usuario();

  $scope.cadastrarUsuario = function() {
    $scope.novoUsuario.$save(function() {
      $location.path('/');
    });
  }
};
dicionario.controller('NovoUsuarioController', NovoUsuarioController);
