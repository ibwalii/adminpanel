<?php
include_once('connection/connection.php');
$user = $_SESSION['user'];

// LOGGED IN USER INFO
mysqli_select_db($conn, $database);
$sql = "SELECT * FROM adminusers WHERE a_username = '{$user}'";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
$userdata =  mysqli_fetch_assoc($result);

// FULL NAME OF USER
$adminName = $userdata['a_fname']." ".$userdata['a_lname'];


// GET ALL MESSAGES
mysqli_select_db($conn, $database);
$sql = "SELECT * FROM `messages`";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
$messagedata =  mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator Inbox</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

     <!-- Custom styles for this template-->
     <!-- <link href="css/custom.css" rel="stylesheet"> -->

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Admin Section</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
        
        
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $adminName; ?> <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#"><img src="<?php echo $userdata['a_image']; ?>" style="height:70px;" class="rounded mx-auto d-block" alt="..."></a>
            <a class="dropdown-item" href="settings.php">Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
       
        <li class="nav-item active">
          <a class="nav-link" href="inbox.php">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Inbox </span>             
          </a>    
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Inbox</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header bg-primary text-white">
              <i class="fas fa-inbox"></i>
              Messages </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Subject</th>
                      <th>From</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>From</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Status</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                      $num = 1;
                      do{ ?>
                    <tr>
                      <td><?php echo $num; ?></td>
                      <td><?php echo $messagedata['m_subject']; ?></td>
                      <td><?php echo $messagedata['m_fname']; ?></td>
                      <td><?php echo $messagedata['m_date']; ?></td>
                      <td>
                          <a href="single.php?id=<?php echo $messagedata['m_id']; ?>">View</a>
                      </td>
                      <td>
                          <a  href="deletemessage.php?did=<?php echo $messagedata['m_id']; ?>" class="delete-href mx-auto"><i class="fas fa-trash"></i> </a>
                      </td>
                    </tr>
                    <?php $num++; }while($messagedata = mysqli_fetch_assoc($result)); ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright ©  2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <div id="delete-dialog" title="Delete Confirmation">
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
      $(document).ready(function()
        {

            /**
            * Create a dialog box for confirming deletes.
            * This creates the box at domready. The box is opened
            * by a call to dialog("open") in the delete link.
            */
            $("#delete-dialog").dialog({
                autoOpen   : false,
                bgiframe   : true,
                buttons    : {
                    "Yes, I'm sure" : function()
                    {
                        $(this).dialog("close");
                        var href = $(this).dialog("option", "href");
                        var row = $(this).dialog("option", "row");
                        $.doDelete(href, row);
                    },
                    "Cancel" : function()
                    {
                        $(this).dialog("close");
                    }
                },
                height     : 150,
                modal      : true,
                overlay    : {
                    backgroundColor : "#000000",
                    opacity         : 0.75
                },
                resizable : false
            });

            $("a.delete-href").on("click", function(e) {
              var link = this;
              e.preventDefault();
              $("<div>Are you sure you want to DELETE?</div>").dialog({
                  buttons: {
                      "Ok": function() {
                          window.location = link.href;
                      },
                      "Cancel": function() {
                          $(this).dialog("close");
                      }
                  }
                });
              });
            
        });
    </script>

  </body>

</html>
