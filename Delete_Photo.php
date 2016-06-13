<?php
include "config.php";
    if (isset($_GET['d']) && isset($_GET['f'])):
        $id = $_GET['d'];
        $file = $_GET['f'];

        $query = "SELECT file from Images where id='$id'";
        $filename = mysqli_fetch_array(mysqli_query($mysqli, $query))['file'];

        $query2 = "DELETE FROM Images WHERE id='". $id ."'";
        $stmt = $mysqli->prepare($query2);
        $stmt->bind_param('s', $id);
        if ($stmt->execute()):
            $mysqli->close();
            unlink('./php/album/'.$filename);
            echo "<script>location.href='principal.php'</script>";
        else:
            echo "<script>alert('" . $stmt->error . "')</script>";
        endif;
    endif;
?>
