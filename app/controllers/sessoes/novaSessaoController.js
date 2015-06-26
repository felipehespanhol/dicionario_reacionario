var NovaSessaoController = function($scope, $http, $location, $rootScope, Sessao, AuthService, AUTH_EVENTS) {
  $scope.login = function() {
    AuthService.login($scope.session).then(function(user) {
      $rootScope.$broadcast(AUTH_EVENTS.loginSuccess);
      $scope.setCrrentUser(user);
      $location.path('/');
    }, function() {
      $rootScope.$broadcast(AUTH_EVENTS.loginFailed);
    });

    //$http({
    //  method: 'POST',
    //  data: {
    //    email: $scope.session.email,
    //    senha: $scope.session.senha
    //  },
    //  url: '/dicionario_reacionario/api/sessoes.php'
    //}).success(function(data, status, headers, config) {
    //  $location.path('/');
    //}).error(function(data, status, headers, config) {
    //  alert('Email ou senha não conferem!');
    //});
  };
};

dicionario.controller('NovaSessaoController', ['$scope', '$http', '$rootScope', 'Sessao', 'AuthService', 'AUTH_EVENTS', NovaSessaoController]);
