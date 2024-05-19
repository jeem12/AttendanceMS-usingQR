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

                        <!-- ============================================================== -->
                        <!-- total followers   -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                <?php 
require_once "php/db_conn.php";
$query = "SELECT COUNT(id) AS total FROM `employee` WHERE YEAR(date_hired) = YEAR(NOW()) AND MONTH(date_hired) = MONTH(NOW())";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $row = mysqli_fetch_assoc($query_run);
?>
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Total Employee <small>| MONTH</small></h5>
                                        <h2 class="mb-0"><?= $row['total']?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                        <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                    </div>
                                    <?php 
                            }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end total followers   -->
                        <!-- ============================================================== -->



                                    <!-- ============================================================== -->
                        <!-- total followers   -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                <?php 
require_once "php/db_conn.php";
$query = "SELECT COUNT(id) AS total FROM `dtr` WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW())";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $row = mysqli_fetch_assoc($query_run);
?>
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Total Logs <small>| MONTH</small></h5>
                                        <h2 class="mb-0"><?= $row['total']?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                        <i class="fa fa-address-book fa-fw fa-sm text-primary"></i>
                                    </div>
                                    <?php 
                            }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end total followers   -->
                        <!-- ============================================================== -->



                        
                                    <!-- ============================================================== -->
                        <!-- total followers   -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                <?php 
require_once "php/db_conn.php";
$query = "SELECT COUNT(id) AS total FROM `employee` WHERE YEAR(date_hired) = YEAR(NOW())";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $row = mysqli_fetch_assoc($query_run);
?>
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Total Employee <small>| YEAR</small></h5>
                                        <h2 class="mb-0"><?= $row['total']?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                        <i class="fa fa-user fa-fw fa-sm text-brand"></i>
                                    </div>
                                    <?php 
                            }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end total followers   -->
                        <!-- ============================================================== -->



                                                            <!-- ============================================================== -->
                        <!-- total followers   -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                <?php 
require_once "php/db_conn.php";
$query = "SELECT COUNT(id) AS total FROM `dtr` WHERE YEAR(date) = YEAR(NOW())";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $row = mysqli_fetch_assoc($query_run);
?>
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Total Logs <small>| YEAR</small></h5>
                                        <h2 class="mb-0"><?= $row['total']?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                        <i class="fa fa-address-book fa-fw fa-sm text-brand"></i>
                                    </div>
                                    <?php 
                            }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end total followers   -->
                        <!-- ============================================================== -->












            <!-- ============================================================== -->
            <!-- End Content -->
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