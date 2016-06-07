$(function () {
    $('#subida').submit(function () {
        var comprobar = $('#foto').val().length*$('#drone').val().length*$('#category').val().length*$('#creation_date').val().length;	
        if (comprobar > 0) {
            var formulario = $('#subida');
            var datos = formulario.serialize();
            var archivos = new FormData();
            var url = 'php/Upload_Photo.php';
            for (var i = 0; i < (formulario.find('input[type=file]').length); i++) {
                archivos.append((formulario.find('input[type="file"]:eq(' + i + ')').attr("name")), ((formulario.find('input[type="file"]:eq(' + i + ')')[0]).files[0]));
            }
            $.ajax({
                url: url + '?' + datos,
                type: 'POST',
                contentType: false,
                data: archivos,
                processData: false,
                beforeSend: function () {
                    $('#cargando').show(300);
                },
                success: function (data) {
                    $('#cargando').hide(900);
                    $(location).attr('href', 'images.php');
                        return false;
                    }
                });
            return false;
            } 
        else {
            var imagen = document.getElementById("foto").files;
            console.log(imagen);
            if (imagen.length == 0){
                bootbox.alert("No has seleccionado ningun archivo");
                return false;
            }
            alert(imagen[0].size);
            console.log(imagen[0]);
            if (imagen[0].type != "image/png" && imagen[0].type != "image/jpg" && imagen[0].type != "image/jpeg" && imagen[0].type != "image/gif"){
                bootbox.alert("El archivo" + imagen[0].name+ " no es una imagen");    
                return false;
            }
            if (imagen[0].size > 1024 * 1024 * 2){
                bootbox.alert("El archivo   " + imagen[0].name+ " sobrepasa el peso permitido");    
                return  false;
            }
        }
    });
});