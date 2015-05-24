dicionario.directive('listaArgumentos', function() {
  return {
    replace: true,
    scope: {
      argumentos: "=collection"
    },
    templateUrl: function() {
      var element = ""
      for(var argumento in argumentos) {
        var template = angular.element('/dicionario_reacionario/app/views/argumentos/_link_argumento.html');
        var linkFn = $compile(template);
        var element = linkFn(argumento);
        ret
      }
    }
  }
});
