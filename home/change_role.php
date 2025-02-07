<?php 
session_start();
 $conn = new mysqli('localhost', 'ebsdb', '', 'root');
 
 

 
 $user = $_GET['id'];

if (isset($_POST['gone'])) {
    
  
        $sql = "UPDATE staff_tb SET roles = :role WHERE staffId = :staff";
$stmt = $conn->prepare($sql);

if ($stmt) {
  // Set the parameter values
  $role = $_POST['role'];
  $staff = $_SESSION['staff'];

  // Bind the parameter values to the named placeholders
  $stmt->bindParam(':role', $role);
  $stmt->bindParam(':staff', $staff);

  // Execute the prepared statement
  $stmt->execute();

  // Close the statement
  $stmt = null;
} else {
  // Handle error if the prepare() method failed
  echo "Failed to prepare the statement.";
}
        
        $_SESSION['crole']=TRUE;
        
        header("location:user_roles");
     
}

?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Employer Account</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo1.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->


    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="jquery/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    </link>

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include("components/sidebar.php"); ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include("components/navbar.php") ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-8 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-9">
                                            <div class="card-body" style="height:40%;">

                                                <p class="mb-4" style="font-size:18px;">
                                                    Updating Staff Role</a>
                                                </p>

                                                <div class="card">
                                                    <h5 class="card-header"></h5>
                                                    <div class="card-body">

                                                        <form action="" method="post">

                                                            <input type="hidden" name="user"
                                                                value="<?php echo $user ?>" />
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">Select new
                                                                    role</label>

                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    id="country-dropdown" name="role">
                                                                    <option>-Select State-</option> <?php
                                                                                        require_once "db.php";
                                                                                        $result = mysqli_query($conn,"SELECT * FROM roles ");
                                                                                        while($row = mysqli_fetch_array($result)) {
                                                                                        ?>
                                                                    <option value="<?php echo $row['roles_id'];?>">
                                                                        <?php echo $row["role"];?></option>
                                                                    <?php
}
?>

                                                                </select>
                                                            </div>
                                                            <button type="submit" name="gone"
                                                                class="btn btn-primary">update</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row">


                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php include("components/footer") ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
    $('#tabulka_kariet1').DataTable();
});
</script>

</html>