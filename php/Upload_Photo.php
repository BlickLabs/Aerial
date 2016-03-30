<?php
    include "../config.php";
    error_reporting(E_ALL);
    //query para insertar imagen obtenemos valores por get los cuales los recibimos de query por post
    $title = $_GET['title'];
    
    $sd = $_GET['desc_short'];
    $ld = $_GET['desc_long'];
    $st = $_GET['status'];
    $cd = $_GET['creation_date'];
    $decoration = $_GET['decoration'];
    $event = $_GET['event'];
    $id_party = $_GET['party'];
    $foto = trim($_FILES['foto']['name']);
    echo $title;
    echo $ingresa;
    $ingresar = mysqli_query($mysqli, "INSERT INTO content (tittle,route,short_description,long_description,status,creation_date)"
                             . "VALUES('$title','$foto','$sd','$ld','$st','$cd')");
    move_uploaded_file($_FILES['foto']['tmp_name'], 'album/' . $foto);
    $id_img = mysqli_insert_id($mysqli); //obtenemos el id del ultimo insert realizado
    $mysqli->close(); //cerramos la conexió del primer query
    
    //query para relacionar imagen con galeria(s) 
    
     $service = $_GET['service'];
     if ($service){
        foreach ($service as $s){
            mysqli_query($mysqli2,"INSERT INTO content_party_room (id_content,id_party_room,id_event,id_service) 
                VALUES ('".$id_img."','".$id_party."','".$event."',".mysqli_real_escape_string($mysqli2,$s).")");
            }
            $mysqli2->close(); 
     
        }
//            $relacion = mysqli_query($mysqli2, "INSERT INTO content_party_room (id_content,id_party_room,id_event,service)"
//                             . "VALUES('$id_img','$id_party','$event','$service')");
//          
//            $mysqli2->close(); 
//       
       
?>