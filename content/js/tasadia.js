document.getElementById("enviar").onclick = function (){
    var datos = new FormData();
    datos.append("accion", $("#accion").val());
    datos.append('id', $('#id').val());
    datos.append('valor', $('#valor').val());
    datos.append('fecha', $('#fecha').val());
    enviaAjax(datos);
};

document.getElementById("nuevo").onclick = function () {
  limpiar();
  $("#accion").val("registrar");
  $("#enviar").text("Registrar");
  $("#gestion-tasadia").modal("show");
};

/*--------------------FIN DE CRUD DEL MODULO----------------------*/

/*-------------------FUNCIONES DE HERRAMIENTAS-------------------*/

function limpiar(){
  $("#valor").val("");
  $("#fecha").val("");
  document.getElementById("svalor").innerText = "";
  document.getElementById("sfecha").innerText = "";
}


function cargar_datos(valor){
  var datos = new FormData();
  datos.append("accion", "editar");
  datos.append("id", valor);
  mostrar(datos);
}


/*-------------------FIN DE FUNCIONES DE HERRAMIENTAS-------------------*/

/*--------------------FUNCIONES CON AJAX----------------------*/
function eliminar1(id){
  Swal.fire({
    title: "¿Está seguro de eliminar el registrooooo?",
    text: "¡No podrás revertir esto!",
    icon: "warning",
    showCloseButton: true,
    showCancelButton: true,
    confirmButtonColor: "#0C72C4",
    cancelButtonColor: "#9D2323",
    confirmButtonText: "Confirmar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      setTimeout(function () {
        var datos = new FormData();
        datos.append("accion", "eliminar");
        datos.append("id", id);
        enviaAjax(datos);
      }, 10);
    }
  });
}

function enviaAjax(datos){
  var toastMixin = Swal.mixin({
    showConfirmButton: false,
    width: 450,
    padding: '3.5em',
    timer: 2000,
    timerProgressBar: true,
  });
  $.ajax({
    url: "tasadia",
    type: "POST",
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    success: (response) => {
      var res = JSON.parse(response);
      //alert(res.title);
      if (res.estatus == 1) {
        toastMixin.fire({

          title: res.title,
          text: res.message,
          icon: res.icon,
        });
        limpiar();
        setTimeout(function () {
          window.location.reload();
        }, 2000);
      } else {
        toastMixin.fire({
          text: res.message,
          title: res.title,
          icon: res.icon,
        });
      }
    },
    error: (err) => {
      Toast.fire({
        icon: res.error,
      });
    },
  });
}

function mostrar(datos){
  $.ajax({
    async: true,
    url: "tasadia",
    type: "POST",
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    success: (response) => {
      var res = JSON.parse(response);
      limpiar();
      $("#id").val(res.id);
      $("#valor").val(res.valor);
      $("#fecha").val(res.fecha);
      $("#enviar").text("Modificar");
      $("#gestion-tasadia").modal("show");
      $("#accion").val("modificar");
      document.getElementById("accion").innerText = "modificar";
      
    },
    error: (err) => {
      Toast.fire({
        icon: error.icon,
      });
    },
  });
}


document.getElementById("enviar").onclick = function (){
  // Creamos un objeto FormData para almacenar los datos del formulario
  var datos = new FormData();
  
  // Validamos y agregamos los datos al objeto FormData
  datos.append("accion", $("#accion").val());
  datos.append('id', $('#id').val());
  datos.append('nombre', $('#nombre').val());
  datos.append('apellido', $('#apellido').val());
  datos.append('cedula', $('#cedula').val());
  datos.append('telefono', $('#telefono').val());
  datos.append('correo', $('#correo').val());
  
  // Validamos que el campo de nombre solo contenga letras
  var nombre = $('#nombre').val();
  var letras = /^[A-Za-z]+$/;
  if (!nombre.match(letras)) {
      alert("Por favor, ingrese solo letras en el campo Nombre.");
      return false; // Detenemos el envío del formulario
  }
  
  // Validamos que el campo de apellido solo contenga letras
  var apellido = $('#apellido').val();
  if (!apellido.match(letras)) {
      alert("Por favor, ingrese solo letras en el campo Apellido.");
      return false; // Detenemos el envío del formulario
  }
  
  // Validamos que el campo de cédula solo contenga números
  var cedula = $('#cedula').val();
  var numeros = /^[0-9]+$/;
  if (!cedula.match(numeros)) {
      alert("Por favor, ingrese solo números en el campo Cédula.");
      return false; // Detenemos el envío del formulario
  }
  

  // Validamos que el campo de cédula solo contenga números
  var telefono = $('#telefono').val();
  var numeros = /^[0-9]+$/;
  if (!telefono.match(numeros)) {
      alert("Por favor, ingrese solo números en el campo Telefono.");
      return false; // Detenemos el envío del formulario
  }
  


  // Validamos que el campo de correo electrónico tenga un formato válido
  var correo = $('#correo').val();
  var correoValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!correo.match(correoValido)) {
      alert("Por favor, ingrese un correo electrónico válido.");
      return false; // Detenemos el envío del formulario
  }
  
  // Si la validación pasa, enviamos los datos mediante AJAX
  enviaAjax(datos);
};

document.getElementById("nuevo").onclick = function () {
// Limpiamos los campos del formulario
limpiar();

// Establecemos la acción como "registrar" y actualizamos el texto del botón de envío
$("#accion").val("registrar");
$("#enviar").text("Registrar");

// Mostramos el modal
$("#gestion-propietario").modal("show");
}