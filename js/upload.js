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
            if (imagen.length == 0){
                bootbox.alert("No has seleccionado ningun archivo");
                return false;
            }
                for (x = 0; x < imagen.length; x++){
                    alert(image[x].size);
                    console.log(image[x]);
                    if (imagen[x].type != "image/png" && imagen[x].type != "image/jpg" && imagen[x].type != "image/jpeg" && imagen[x].type != "image/gif"){
                        bootbox.alert("El archivo" + imagen[x].name+ " no es una imagen");    
                        return false;
                    }
                    if (imagen[x].size > 1024 * 1024 * 2){
                        alert("El archivo   " + imagen[x].name+ " sobrepasa el peso permitido");    
                        return  false;
                    }
                }
        }
    });
});