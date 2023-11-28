<?php
session_start();
//error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['adid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_GET['delete']))
{
$uid=$_GET['delete'];
$query=mysqli_query($con,"call sp_userdeletion('$uid')"); 
echo "<script>alert('User data deleted');</script>";  
echo "<script>window.location.href='registered-users.php'</script>";
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

    <title>User Management System in PHP Using Stored Procedure</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- Sidebar -->
  <?php include_once('includes/sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                  <?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Registered Users</h1>
            

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Registered Users Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                  <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email id</th>
                                            <th>Reg. Date</th>
                                            <th>Accout Status</th>
                                            <th>Last Updation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                       <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email id</th>
                                            <th>Reg. Date</th>
                                            <th>Accout Status</th>
                                            <th>Last Updation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
$query=mysqli_query($con,"call sp_allregisteredusers()");
$cnt=1;
while ($result=mysqli_fetch_array($query)) {
?>
                                             <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $result['FirstName'];?></td>
                                            <td><?php echo $result['LastName'];?></td>
                                            <td><?php echo $result['EmailId'];?></td>
                                            <td><?php echo $result['RegDate'];?></td>
                                            <td><?php  $accountstatus=$result['IsActive'];
if($accountstatus==1):
    echo "Active";
else:
    echo "Blocked";
endif;
    ?>
        
    </td>
                                            <td><?php echo $result['LastUpdationDate'];?></td>
<td>
<a href="edit-user-profile.php?uid=<?php echo $result['id'];?>" class="btn btn-info  btn-circle btn-sm">
<i class="fas fa-edit"></i></a>
    <a href="registered-users.php?delete=<?php echo $result['id'];?>" onClick="return confirm('Do you really want to delete?');" class="btn btn-danger btn-circle btn-sm">
<i class="fas fa-trash"></i></a>
</td>
                                        </tr>
                                       <?php $cnt++;
                            } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
   <?php include_once('includes/footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
<?php include_once('includes/logout-modal.php');?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>
</html>
<?php } ?>