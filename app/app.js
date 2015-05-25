var dicionario = angular.module('dicionario', ['ngRoute', 'ngResource']);

dicionario.config(function($routeProvider) {
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
      controllerAs: 'novo_argumento'
    })
    .when('/argumentos/:id', {
      templateUrl: viewBase + 'argumentos/show.html',
      controller: 'ArgumentoController',
      controllerAs: 'argumento'
    })
});
