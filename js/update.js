$( document ).ready(function() {
    $( "#btnSubmit" ).on( "click", function() {
      var comprobar = $('#title').val().length * $('#drone').val().length * $('#category').val().length
      if (comprobar > 0) {
        var formulario = $('#update');
        var datos = formulario.serialize();
        var url = 'php/Update_Photo.php';
        $.ajax({
          url: url + '?' + datos,
          type: 'POST',
          beforeSend: function() {
            $('#cargando').modal('show');
          },
          success: function (data) {
            $('#cargando h3').text('Operacion Exitosa');
            setTimeout(function () {
                $(location).attr('href', 'create_file.php');
            }, 2000);
          },
          error: function(data) {
            $('#cargando h3').text('Ocurrio un error. Intentalo de nuevo.');
          }
        });
      } else {
        bootbox.alert("Rellena todos los campos");
        return false;
      }
    });
});
