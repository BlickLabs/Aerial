<?php

include "config.php";
header("Content-Type: application/json; charset=UTF-8");
error_reporting(E_ALL);

$category =mysqli_real_escape_string($mysqli3,$_GET["category"]);
$drone =mysqli_real_escape_string($mysqli2,$_GET["drone"]);

function JSONResponse($_response) {
    try {
        $json = json_encode($_response);
        echo $json;

    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

function GetImages($_query) {
    $_response = array();
    $_result = $mysqli->query($_query);
    while ($row = $_result->fetch_array(MYSQLI_ASSOC)) {
        $title = mysqli_real_escape_string($mysqli,$row['title']);
        $path=mysqli_real_escape_string($mysqli,'php/album/' . $row['file']);
        $partialImage = array(
            'path' =>  $path,
            'title' => $title,  
        );
        array_push($_response, $partialImage);
    }
    return $_response;
}

if ($category!=null && $drone!=null){
    $query = "SELECT title, file FROM Images WHERE category ='" . $category ."' AND drone ='". $drone ."'";
    $response = GetImages($query);
    JSONResponse($response);
} else if ($drone!=null && empty($category)) {
    $query = "SELECT title, file FROM Images WHERE drone ='". $drone ."'";
    $response = GetImages($query);
    JSONResponse($response);
} else if (empty($drone) && $category !=null) {
    $query = "SELECT title, file FROM Images WHERE category ='" . $category ."'";
    $response = GetImages($query);
    JSONResponse($response);
} else {
    header('HTTP/1.1 400 Bad Request');
    die(json_encode(array('message' => 'Error', 'code' => 400, 'description': 'You must specify at least one parameter (drone or category).')));
}

?>
