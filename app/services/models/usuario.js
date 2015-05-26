dicionario.factory('Usuario', function($resource) {
  return $resource('/dicionario_reacionario/api/usuarios.php/:id', {}, { id: "@id" });
});
