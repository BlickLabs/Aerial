<?php

include "config.php";
header("Content-Type: application/json; charset=UTF-8");
error_reporting(E_ALL);

function JSONResponse($_response) {
    try {
        $json = json_encode($_response);
        echo $json;

    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

if (isset($_GET["drone"])) {
    $drone = mysqli_real_escape_string($mysqli,$_GET["drone"]);
    if (isset($_GET["category"])) {
        $category = mysqli_real_escape_string($mysqli,$_GET["category"]);
        $query = "SELECT title, file FROM Images WHERE category ='" . $category ."' AND drone ='". $drone ."'";
    } else {
        $query = "SELECT title, file FROM Images WHERE drone ='". $drone ."'";
    }
} else if (isset($_GET["category"])) {
    $category = mysqli_real_escape_string($mysqli,$_GET["category"]);
    $query = "SELECT title, file FROM Images WHERE category ='" . $category ."'";
} else {
    $query = "SELECT title, file FROM Images";
}

$result = $mysqli->query($query);
$response = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $title = mysqli_real_escape_string($mysqli,$row['title']);
    $path=mysqli_real_escape_string($mysqli,'php/album/' . $row['file']);
    $partialImage = array(
        'path' =>  $path,
        'title' => $title,  
    );
    array_push($response, $partialImage);
}
JSONResponse($response);
?>
