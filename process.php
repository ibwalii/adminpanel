<?php
include_once('connection/connection.php');

if($_POST['login']){
    $user = sprintf($_POST['username']);
    $pass = sprintf($_POST['password']);

        mysqli_select_db($conn, $database);
        $sql = "SELECT a_username, a_password FROM adminusers WHERE a_username = '{$user}'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $data =  mysqli_fetch_assoc($result);
        echo $data['a_username'];

        if (mysqli_num_rows($result) > 0) {
            // Login Successful
            header('Location: inbox.php');
        } else {
            echo "Fail ";
        }
    }
    else{
        echo "Submit";
    }
            


mysqli_close($conn);
?>

