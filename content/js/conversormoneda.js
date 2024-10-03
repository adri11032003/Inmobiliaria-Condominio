$(document).ready(function() {
  $(".nav-link").click(function(e) {
      e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
      var url = $(this).attr('href'); // Obtener la URL del enlace clicado
      $.ajax({
          url: "conversormoneda", // La URL a la que enviar la solicitud AJAX
          type: "POST", // Tipo de solicitud (en este caso, GET)
          success: function(data) {
              // Manejar la respuesta exitosa aquí
              // Por ejemplo, podrías actualizar el contenido de algún div con el resultado de la solicitud
              $("#contenido").html(data); // Suponiendo que tienes un div con id "contenido"
          },
          error: function(xhr, status, error) {
              // Manejar cualquier error que ocurra durante la solicitud AJAX
              console.error("Error al cargar la página:", error);
          }
      });
  });
});