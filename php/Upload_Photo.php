<?php
    include "../config.php";
    error_reporting(E_ALL);
    $title = $_GET['title'];
    $drone = $_GET['drone'];
    $category = $_GET['category'];
    $creation_date = $_GET['creation_date'];
    $foto = trim($_FILES['foto']['name']);
    $filename = "";
    if ($_FILES['foto']['size'] <= 2097152) {
        while (true) {
            $filename = uniqid(rand()) . '.' .pathinfo($foto, PATHINFO_EXTENSION);
            if (!file_exists('album/' . $filename)) break;
        }
        error_log($filename, 0);
        error_log("Despues de cambiar el nombre", 0);
        // Guardamos la imagen (titulo, archivo, fecha de creacion)
        $query1 = "INSERT INTO Images (title, file, category, drone, creation_date) VALUES ('$title', '$filename', '$category', '$drone', '$creation_date')";
        mysqli_query($mysqli, $query1);
        error_log("Despues del primer insert", 0);
        // Movemos el archivo
        move_uploaded_file($_FILES['foto']['tmp_name'], 'album/' . $filename);
        error_log("Despues del mover el archivo", 0);
        //Cerramos la conexion
        $mysqli->close();
    } else {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
    }
?>
