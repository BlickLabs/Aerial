<?php
    include "../config.php";
    error_reporting(E_ALL);
    $id = $_GET['id'];
    $title = $_GET['title'];
    $drone = $_GET['drone'];
    $category = $_GET['category'];
    $modification_date = date_create();
    $modification_date = date_format($modification_date, 'Y-m-d');
    error_log("Despues de cambiar el nombre", 0);
    // Guardamos la imagen (titulo, archivo, fecha de creacion)
    $query = "UPDATE Images SET title='$title', category='$category', drone='$drone', modification_date='$modification_date' WHERE id='$id'";
    mysqli_query($mysqli, $query);
    error_log("Despues del update", 0);
    //Cerramos la conexion
    $mysqli->close();
?>
