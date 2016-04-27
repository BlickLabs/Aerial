<?php

include "config.php";
//header("Content-Type: application/json; charset=UTF-8");
error_reporting(E_ALL);

$id =mysqli_real_escape_string($mysqli,$_GET["category"]);
$drone =mysqli_real_escape_string($mysqli2,$_GET["drone"]);



//query only by Party Room (ID)
if ($category!=null && empty($drone)) {
        
        $result = $mysqli->query("SELECT id_category,name_category FROM categorys WHERE id_category = '" . $category . "'");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            
            $response ['Category'] = array(
                'id_category' => $row['id_category'],
                'name_category' => $row['name_category'],
                'images' => array(),
            );
        }

        $result2 = $mysqli2->query("SELECT c.tittle,c.route,g.name_category FROM content_dron_category AS cdc LEFT JOIN content AS c ON c.id_content = cdc.id_content LEFT JOIN categorys AS g ON g.id_category = cdc.id_category WHERE cdc.id_category ='" . $category ."'");
        while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
            $description = mysqli_real_escape_string($mysqli2,$row['description']);
            $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row['route']);
            $partialImage = array(
                'path' =>  $path,
                'tittle' => $row ['tittle'],
                'description' => $description,
                'decoration' => $row['name_decoration'],
               
            );
            array_push($response['Category']['images'], $partialImage);
        }
        try {
            $json2 = json_encode($response['Category']);
            echo $json2;

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
}   

    elseif ($drone!=null && empty ($category)) {
                
        $result = $mysqli->query("SELECT id_category,name_category FROM categorys WHERE id_category = '" . $category . "'");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            
            $response ['Category'] = array(
                'id_category' => $row['id_category'],
                'name_category' => $row['name_category'],
                'images' => array(),
            );
        }

        $result2 = $mysqli2->query("SELECT c.tittle,c.route,d.name_drone FROM content_dron_category AS cdc LEFT JOIN content AS c ON c.id_content = cdc.id_content LEFT JOIN drones AS d ON d.id_drone = cdc.id_drone WHERE cdc.id_drone ='" . $drone ."'");
        while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
            $description = mysqli_real_escape_string($mysqli2,$row['description']);
            $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row['route']);
            $partialImage = array(
                'path' =>  $path,
                'tittle' => $row ['tittle'],
                'description' => $description,
                'decoration' => $row['name_decoration'],
               
            );
            array_push($response['Category']['images'], $partialImage);
        }
        try {
            $json2 = json_encode($response['Category']);
            echo $json2;

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
}//query with Services   
    else {

    echo  'no';
}

    


//if () {
//    echo 'las 3';
//} else {
//    

?>
        
