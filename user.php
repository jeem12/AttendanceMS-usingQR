<?php include "partial/head.php" ?>


<body>



    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper2">
    
     <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Attendance MS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/logo.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?= $_SESSION['USERNAME']?></h5>
                                    <!-- <span class="status"></span><span class="ml-2">Online</span> -->
                                </div>
                                <a class="dropdown-item" href="php/logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper2">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">



            <!-- ============================================================== -->
            <!-- Start Content -->
            <!-- ============================================================== -->




                            <!-- QR MODAL -->
                            <!-- <div id="scan_qr" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                    <video id="preview" autoplay></video>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
 -->

<!-- Modal -->
<div class="modal fade" id="scan_qr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <video id="preview" autoplay></video>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            
                            <h5 class="card-header">Attendance Logs</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first" id="user">
                                                    <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#scan_qr">
            SCAN QR
            </button>
                                        <thead>
                                            <tr>
                                                <th>EMPLOYEE ID</th>
                                                <th>FIRT NAME</th>
                                                <th>MIDDLE NAME</th>
                                                <th>LAST NAME</th>
                                                <th>DEPARTMENT</th>
                                                <th>TIME IN</th>
                                                <th>TIME OUT</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>

                                        
                                        <tbody>
                                            <?php 
                                            require_once 'php/db_conn.php';
                                            
                                            $query = "SELECT * FROM `dtr` WHERE `username` = '{$_SESSION['USERNAME']}'";


                                            if ($result = mysqli_query($conn, $query)) {
                                                // Fetch one and one row
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td><?= $row['emp_id']?></td>
                                                <td><?= $row['f_name']?></td>
                                                <td><?= $row['m_name']?></td>
                                                <td><?= $row['l_name']?></td>
                                                <td><?= $row['department']?></td>
                                                <td><?= $row['time_in']?></td>
                                                <td><?= $row['time_out']?></td>
                                                <td><?= $row['status']?></td>
                                            </tr>
                                            <?php 
                                        }
                                        mysqli_free_result($result);
                                    }
                                    ?>
                                        </tbody>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->

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


<script>

$('#user').DataTable();


$('#scan_qr').on('hidden.bs.modal', function (e) {
                                    
    location.reload();


                            });

$('#scan_qr').on('shown.bs.modal', function(e) { e.preventDefault();
                            
                const video = document.getElementById('preview');
                let scanner = new Instascan.Scanner({ video: video });

                // Function to send scanned data to server
function sendDataToServer(content) {
    // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();
    
    // Configure the request
    xhr.open('POST', 'php/insert_userDtr.php'); // Assuming your server-side script is named insertData.php
    xhr.setRequestHeader('Content-Type', 'application/json');
    
    // Define what happens on successful data submission
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Parse the JSON response
        var response = JSON.parse(xhr.responseText);
        
        // Access the message from the response object
        var message = response.message;

            alertify.set('notifier','position', 'bottom-right');
            alertify.success(message);
        } else {
                 // Parse the JSON response
        var response = JSON.parse(xhr.responseText);
        
        // Access the message from the response object
        var message = response.message;

            alertify.set('notifier','position', 'bottom-right');
            alertify.error(message);
        }
                };
                
                // Define what happens in case of error
                xhr.onerror = function() {
                    console.error('Request failed');
                };
                
                // Send the request with the scanned content as JSON
                xhr.send(JSON.stringify({ content: content }));
            }

            // Add listener for when a QR code is scanned
            scanner.addListener('scan', function(content) {
                // alert('QR code scanned! Content: ' + content);
                
                // Send the scanned content to the server
                sendDataToServer(content);
            });

            // Get available cameras and start scanning
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 1) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found on this device.');
                }
            }).catch(function(e) {
                alert('Error accessing camera: ' + e);
            });

        });


</script>

 
</html>