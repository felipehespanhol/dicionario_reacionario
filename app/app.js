var dicionario = angular.module('dicionario', ['ngRoute', 'ngResource']);

dicionario.constant('AUTH_EVENTS', {
  loginSuccess:     'auth-login-success',
  loginFailed:      'auth-login-failed',
  logoutSuccess:    'auth-logout-success',
  sessionTimeout:   'auth-session-timeout',
  notAuthenticated: 'auth-not-authenticated',
  notAuthorized:    'auth-not-authorized'
});

dicionario.constant('USER_ROLES', {
  all: '*',
  admin: 'admin',
  guest: 'guest'
});

dicionario.config(function($routeProvider, USER_ROLES) {
  var viewBase = '/dicionario_reacionario/app/views/';

  $routeProvider
    .when('/', {
      templateUrl: viewBase + 'argumentos/index.html',
      controller: 'ArgumentosController',
      controllerAs: 'argumentos'
    })
    .when('/argumentos/new', {
      templateUrl: viewBase + 'argumentos/new.html',
      controller: 'NovoArgumentoController',
      controllerAs: 'novoArgumento'
      //data: {
      //  authorizedRoles: [USER_ROLES.admin, USER_ROLES.editor]
      //}
    })
    .when('/argumentos/:id', {
      templateUrl: viewBase + 'argumentos/show.html',
      controller: 'ArgumentoController',
      controllerAs: 'argumento'
    })
    .when('/usuarios/new', {
      templateUrl: viewBase + 'usuarios/new.html',
      controller: 'NovoUsuarioController',
      controllerAs: 'usuarios'
    })
    .when('/sessoes/new', {
      templateUrl: viewBase + 'sessoes/new.html',
      controller: 'NovaSessaoController',
      controllerAs: 'sessoes'
    })
});

dicionario.config(function($httpProvider) {
  $httpProvider.interceptors.push([
    '$injector',
    function($injector) {
      return $injector.get('AuthInterceptor');
    }
  ])
});

dicionario.factory('AuthInterceptor', function($rootScope, $q, AUTH_EVENTS) {
  return {
    responseError: function(response) {
      $rootScope.$broadcast({
        401: AUTH_EVENTS.notAuthenticated,
        403: AUTH_EVENTS.notAuthorized,
        419: AUTH_EVENTS.sessionTimeout,
        440: AUTH_EVENTS.sessionTimeout
      }[response.status], response);
    }
  };
})

dicionario.run(function($rootScope, AUTH_EVENTS, AuthService) {
  $rootScope.$on('$routeChangeStart', function(event, next) {
    if(next.data !== undefined) {
      var authorizedRoles = next.data.authorizedRoles;
      if (!AuthService.isAuthorized(authorizedRoles)) {
        event.preventDefault();
        if(AuthService.isAuthenticated()) {
          $rootScope.$broadcast(AUTH_EVENTS.notAuthorized);
        } else {
          $rootScope.$broadcast(AUTH_EVENTS.notAuthenticated);
        }
      }
    }
  })
})
