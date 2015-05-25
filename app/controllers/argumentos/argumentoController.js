var ArgumentoController = function($scope, $routeParams, Argumento) {
  Argumento.get({id: $routeParams.id}, function(data) {
    $scope.argumento = data;
  });
};
dicionario.controller('ArgumentoController', ArgumentoController);
