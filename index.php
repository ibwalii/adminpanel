<?php
include_once('connection/connection.php');

// LOGIN PROCESS
if(isset($_POST['login'])){
    $user = sprintf($_POST['username']);
    $pass = sprintf($_POST['password']);

        mysqli_select_db($conn, $database);
        $sql = "SELECT a_username, a_password FROM adminusers WHERE a_username = '{$user}' AND a_password = '{$pass}'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $data =  mysqli_fetch_assoc($result);
        echo $data['a_username'];

        if (mysqli_num_rows($result) > 0) {
            // Login Successful
            $_SESSION['user'] = $data['a_username'];
            header('Location: inbox.php');
        } else {
            $loginerror = 1;
        }
    }
    else{
       
    }

?>    
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <link href="css/custom.css" rel="stylesheet">

    <style>
        body{
            background: url("imgs/bglogin.jpg");
             /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .header{
            background: #000;
            color: aliceblue;
            height: 70px;
            align-content: center;
            padding: 40px;
        }
        .header .h3{
            padding: 10px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container-fluid text-center header">
        <h3>Restricted!!!</h3>
    </div>

        <div class="box">
                <div id="header">
                  <div id="cont-lock"><i class="material-icons lock">ADMIN SECTION</i></div>
                  <div id="bottom-head"><h1 id="logintoregister">Login</h1></div>
                </div> 
                    <?php if(isset($loginerror)){ ?>
                    <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                        Username/password incorrect!!!
                    </div>
                    <?php } ?>
                 <form action="index.php" method="post">
                  <div class="group">      
                    <input class="inputMaterial" type="text" name="username" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Username</label>
                  </div>
                      <div class="group">      
                    <input class="inputMaterial" type="password" name="password" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Password</label>
                  </div>
                  <button id="buttonlogintoregister" type="submit">Login</button>
                  <input type="hidden" name="login" value="1">
                </form>
              </div>
              
</body>
</html>