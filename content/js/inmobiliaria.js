document.getElementById("enviar").onclick = function (){
    var datos = new FormData();
    datos.append("accion", $("#accion").val());
    datos.append('id', $('#id').val());
    datos.append('cant_cuartos', $('#cant_cuartos').val());
    datos.append('metros', $('#metros').val());
    datos.append('direccion', $('#direccion').val());
    datos.append('alicuota', $('#alicuota').val());
    datos.append('id_propietario', $('#id_propietario').val());
    enviaAjax(datos);
};

document.getElementById("nuevo").onclick = function () {
  limpiar();
  $("#accion").val("registrar");
  $("#enviar").text("Registrar");
  $("#gestion-inmobiliaria").modal("show");
};

/*--------------------FIN DE CRUD DEL MODULO----------------------*/

/*-------------------FUNCIONES DE HERRAMIENTAS-------------------*/

function limpiar(){
  $("#cant_cuartos").val("");
  $("#metros").val("");
  $("#direccion").val("");
  $("#alicuota").val("");
  $("#id_propietario").val("");
  document.getElementById("scant_cuartos").innerText = "";
  document.getElementById("smetros").innerText = "";
  document.getElementById("sdireccion").innerText = "";
  document.getElementById("salicuota").innerText = "";
  document.getElementById("sid_propietario").innerText = "";
}


function cargar_datos(valor){
  var datos = new FormData();
  datos.append("accion", "editar");
  datos.append("id", valor);
  mostrar(datos);
}


/*-------------------FIN DE FUNCIONES DE HERRAMIENTAS-------------------*/

/*--------------------FUNCIONES CON AJAX----------------------*/
function eliminar(id){
  Swal.fire({
    title: "¿Está seguro de eliminar el registro?",
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
    url: "inmobiliaria",
    type: "POST",
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    success: (response) => {
      alert(response);
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
    url: "inmobiliaria",
    type: "POST",
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    success: (response) => {
      var res = JSON.parse(response);
      limpiar();
      $("#id").val(res.id);
      $("#cant_cuartos").val(res.cant_cuartos);
      $("#metros").val(res.metros);
      $("#direccion").val(res.direccion);
      $("#alicuota").val(res.alicuota);
      $("#enviar").text("Modificar");
      $("#gestion-inmobiliaria").modal("show");
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