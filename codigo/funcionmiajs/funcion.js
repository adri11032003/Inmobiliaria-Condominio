// Función para mostrar el mensaje de advertencia
async function confirmarEliminar(id) {
    const result = await swal({
      title: "¿Estás seguro de eliminar el registro?",
      text: "Después de eliminar, no podrás recuperar los datos",
      icon: "warning",
      buttons: ["Cancelar", "Eliminar"],
      dangerMode: true,
    });
  
    if (result) {
           // Si el usuario elige "Eliminar", redireccionar para eliminar los datos
      window.location.href = "eliminar.php?id=" + id;
      //Mostrar mensaje de eliminado
        swal("Registro eliminado", {
                icon: "success",
              });
    } else {
      // Si el usuario elige "Cancelar", no hacer nada
      swal("Se canceló la acción", {
        icon: "info",
      });
    }
  }
  



//async function confirmarEliminar(id) {
//swal({
   // title: "Estás seguro de eliminar el registro?",
   // text: "Después de eliminar, no podras recuperar los datos",
    ///icon: "warning",
    //buttons: true,
    //dangerMode: true,
 // })
 // .then((willDelete) => {
   // if (willDelete) {
   //   swal("Registro eliminado", {
    //    icon: "success",
    //  });
   // } else {
   //   swal("Se cancelo la acción", {
    //    icon: "error",
 //     });
 // };  
//})
//}