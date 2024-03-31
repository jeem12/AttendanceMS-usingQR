<?php include "partial/head.php" ?>


<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       <?php include "partial/nav.php"?>
       
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Dashboard </h2>
                                <!-- <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p> -->
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Start Content -->
            <!-- ============================================================== -->


            <div class="ecommerce-widget">

            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Total Employee This Month</h5>
                            <?php 
require_once "php/db_conn.php";
$query = "SELECT COUNT(id) AS total FROM `employee` WHERE YEAR(date_hired) = YEAR(NOW()) AND MONTH(date_hired) = MONTH(NOW())";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $row = mysqli_fetch_assoc($query_run);
?>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1"><?= $row['total']?></h1>
                            </div>

                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="text-muted">Total Logs This Month</h5>
                            <?php 
require_once "php/db_conn.php";
$query = "SELECT COUNT(id) AS total FROM `dtr` WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW())";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $row = mysqli_fetch_assoc($query_run);
?>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1"><?= $row['total']?></h1>
                            </div>

                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Total Employees This Year</h5>
                            <?php 
require_once "php/db_conn.php";
$query = "SELECT COUNT(id) AS total FROM `employee` WHERE YEAR(date_hired) = YEAR(NOW())";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $row = mysqli_fetch_assoc($query_run);
?>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1"><?= $row['total']?></h1>
                            </div>
                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Total Logs This Month</h5>
                            <?php 
require_once "php/db_conn.php";
$query = "SELECT COUNT(id) AS total FROM `dtr` WHERE YEAR(date) = YEAR(NOW())";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $row = mysqli_fetch_assoc($query_run);
?>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1"><?= $row['total']?></h1>
                            </div>
                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>





            <!-- ============================================================== -->
            <!-- End Content -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->


    <?php include "partial/foot.php"?>


</body>
 
</html>