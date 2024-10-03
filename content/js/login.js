document.getElementById("enviar").onclick = function (){
    var datos = new FormData();
    datos.append("accion", 'acceder');
    datos.append('usuario', $('#usuario').val());
    datos.append('clave', $('#clave').val());
    enviaAjax(datos);
};

function enviaAjax(datos){
  var toastMixin = Swal.mixin({
    showConfirmButton: false,
    width: 450,
    padding: '3.5em',
    timer: 2000,
    timerProgressBar: true,
  });
  $.ajax({
    url: "login",
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
          title: 'Bienvenido',
          text: res.message,
          icon: 'success',
        });
        setTimeout(function () {
            window.location.replace("/dashboard");
          }, 2000);
      } else {
        toastMixin.fire({
          text: 'Disculpe',
          title: res.message,
          icon: 'error',
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
