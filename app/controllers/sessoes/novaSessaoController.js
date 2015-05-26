var NovaSessaoController = function($scope, $http, $location) {
  $scope.logar = function() {
    $http({
      method: 'POST',
      data: {
        email: $scope.session.email,
        senha: $scope.session.senha
      },
      url: '/dicionario_reacionario/api/sessoes.php'
    }).success(function(data, status, headers, config) {
      $location.path('/');
    }).error(function(data, status, headers, config) {
      alert('Email ou senha não conferem!');
    });
  };
};
dicionario.controller('NovaSessaoController', NovaSessaoController);
