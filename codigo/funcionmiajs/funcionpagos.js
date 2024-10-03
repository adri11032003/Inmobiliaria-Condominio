async function confirmarEliminarP(id) {
    const result = await swal({
      title: "¿Estás seguro de eliminar el pago?",
      text: "Después de eliminar, no podrás recuperar los datos",
      icon: "warning",
      buttons: ["Cancelar", "Eliminar"],
      dangerMode: true,
    });
  
    if (result) {
           // Si el usuario elige "Eliminar", redireccionar para eliminar los datos
      window.location.href = "eliminarpagos.php?id=" + id;
      //Mostrar mensaje de eliminado
        swal("Pago eliminado", {
                icon: "success",
              });
    } else {
      // Si el usuario elige "Cancelar", no hacer nada
      swal("Se canceló la acción", {
        icon: "info",
      });
    }
  }