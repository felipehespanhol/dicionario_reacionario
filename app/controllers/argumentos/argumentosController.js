var ArgumentosController = function($scope, Argumento) {
  $scope.args = Argumento.query();
};
angular.module('dicionario').controller('ArgumentosController', ArgumentosController);
