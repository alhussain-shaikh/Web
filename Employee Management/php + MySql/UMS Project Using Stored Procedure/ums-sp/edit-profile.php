<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['update']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];  
$uid=$_SESSION['uid'];

$updatetTime = date( 'd-m-Y h:i:s A', time () );
$query=mysqli_query($con,"call sp_userupdateprofile('$fname','$lname','$updatetTime','$uid')"); 
echo "<script>alert('Your profile udated successfully');</script>";  
echo "<script>window.location.href='profile.php'</script>";
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php include_once('includes/sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                    <!-- Topbar Navbar -->
  <?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
 <h1 class="h3 mb-0 text-gray-800"><?php echo ucwords($_SESSION['fname']);?>'s Profile | Update Profile</h1>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">

<?php 
$uid=$_SESSION['uid'];
$query=mysqli_query($con,"call sp_userprofile($uid)");
while ($result=mysqli_fetch_array($query)) {

?>


                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                 Registration Date: <?php echo $result['RegDate'];?>
                                </div>
                                <div class="card-body">
<form method="post">
             <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                 
                 
                                        
                                    <tr>
                                            <th>First Name</th>
                                            <td>
                                                    <input type="text" class="form-control form-control-user" id="fname" value="<?php echo $result['FirstName'];?>" name="fname" required="true">

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td><input type="text" class="form-control form-control-user" id="lname" name="lname" value="<?php echo $result['LastName'];?>" required="true">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Email Id</th>
                                            <td>
 <input type="email" class="form-control form-control-user" id="emailid" value="<?php echo $result['EmailId'];?>" name="emailid" readonly="true">
 <a href="change-emailid.php">Change Email</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Last Updation Date </th>
                                            <td><?php echo $result['LastUpdationDate'];?></td>
                                        </tr>
                                </table>
                                    <button type="submit" name="update" class="btn btn-primary btn-user btn-block">
                                            Update
                                        </button>
                            </form>
                                </div>
                            </div>
<?php } ?>

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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
<?php } ?>