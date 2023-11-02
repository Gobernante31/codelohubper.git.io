$(document).ready(function() {
  var preLoader = $('#pre_loader');
  
  if (preLoader.length) {
    preLoader.fadeOut(function() {
      // Este código se ejecutará después de que el pre_loader se desvanezca
      $('body').removeClass('hidden');
    });
  } else {
    // En caso de que #pre_loader no exista, aún puedes quitar la clase 'hidden' del cuerpo.
    $('body').removeClass('hidden');
  }
});
