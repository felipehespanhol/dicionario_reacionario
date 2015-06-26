dicionario.controller('ApplicationController', ['$rootScope', '$scope', 'USER_ROLES', 'AuthService', function($rootScope, $scope, USER_ROLES, AuthService) {
  if($rootScope.currentUser) {
    $scope.currentUser = $rootScope.currentUser;
  } else {
    $scope.currentUser = null;
  }
  $scope.userRoles = USER_ROLES;
  $scope.isAuthorized = AuthService.isAuthorized;

  $scope.setCurrentUser = function(user) {
    $scope.currentUser = user;
  }
}]);
