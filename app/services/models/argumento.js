dicionario.factory('Argumento', function($resource) {
  return $resource('/dicionario_reacionario/api/argumentos.php/:id', {}, { id: "@id" });
});
