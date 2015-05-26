dicionario.factory('Sessao', function($resource) {
  return $resource('/dicionario_reacionario/api/sessoes.php');
});
