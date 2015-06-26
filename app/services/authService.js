dicionario.factory('AuthService', ['$http', 'Sessao', function($http, Sessao) {
  var authService = {};

  authService.login = function(sessao) {
    return $http
      .post('/dicionario_reacionario/api/sessoes.php', sessao)
      .then(function(res) {
        Sessao.create(res.data.id, res.data.user.id, res.data.user.role);
        return res.data.user;
      });
  };

  authService.isAuthenticated = function() {
    return !!Sessao.userId;
  };

  authService.isAuthorized = function(authorizedRoles) {
    if (!angular.isArray(authorizedRoles)) {
      authorizedRoles = [authorizedRoles];
    }
    return (authService.isAuthenticated() && authorizedRoles.indexOf(Sessao.userRole) !== -1);
  };

  return authService;
}]);
