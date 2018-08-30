<?php
include_once('connection/connection.php');
$user = $_SESSION['user'];


if($_GET){
    $d_id = $_GET['did'];
    // DELETE MESSAGE 
    mysqli_select_db($conn, $database);
    // sql to delete a record
    $sql = "DELETE FROM `messages` WHERE m_id= {$d_id}";

    if (mysqli_query($conn, $sql)) {
        header('Location: inbox.php');
    } else {
        echo $deleteError = "Error deleting record: ";
    }
}

?>