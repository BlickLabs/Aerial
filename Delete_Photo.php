
<?php
include "config.php";
    if (isset($_GET['d'])):
        $stmt = $mysqli->prepare("DELETE content,content_dron_category FROM content 
            INNER JOIN content_dron_category ON content.id_content = content_dron_category.id_content
            WHERE content.id_content=?");
        $stmt->bind_param('s', $id);  
        $id = $_GET['d'];
         
        if ($stmt->execute()):
            
            $mysqli->close();
        $filename=$_GET['f'];
            unlink('./php/album/'.$filename);
            echo "<script>location.href='principal.php'</script>";
        else:
            echo "<script>alert('" . $stmt->error . "')</script>";
        endif;
    endif;
?>
