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
                                <h2 class="pageheader-title">Daily Time Record </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Daily Time Record</li>
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

            <!-- QR MODAL -->
            <div id="scan_qr" class="modal" tabindex="-1">
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


                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Teachers Attendance Logs</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first" id="dtr">
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

</body>


<?php include "partial/foot.php"?>

<script>
    var dtr = '';
    $(function() {
    // draw function [called if the database updates]
    function draw_data() {
        if ($.fn.dataTable.isDataTable('#dtr') && dtr != '') {
            dtr.draw(true)
        } else {
            load_data();
        }
    }


function load_data() {
  dtr = $('#dtr').DataTable({
      dom: '<"row"B>flr<"py-2 my-2"t>i',
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: "../php/dtr_getData.php",
          method: 'POST'
      },
      columns: [
          {
              data: 'emp_id',
              className: 'text-center',
              defaultValue: 'No data available'

          },
          {
              data: 'f_name',
              className: 'text-center',
              defaultValue: 'No data available'

          },
          {
              data: 'm_name',
              className: 'text-center',
              defaultValue: 'No data available'

          },
          {
              data: 'l_name',
              className: 'text-center',
              defaultValue: 'No data available'

          },
          {
              data: 'department',
              className: 'text-center',
              defaultValue: 'No data available'

          },
          {
              data: 'time_in',
              className: 'text-center',
              defaultValue: 'No data available'
          },
          {
              data: 'time_out',
              className: 'text-center',
              defaultValue: 'No data available'
          },
          {
              data: 'status',
              className: 'text-center',
              defaultValue: 'No data available'
          },  
      ],
    //   responsive: {
    //                 details: {
    //                         display: $.fn.dataTable.Responsive.display.modal( {
    //                                 header: function ( row ) {
    //                                     var data = row.data();
    //                                     return 'Details for '+data.last_name+', '+data.first_name;
    //                                 }
    //                             } ),

    //                             renderer: $.fn.dataTable.Responsive.renderer.tableAll()
    //             }

    //         },

    


    //   drawCallback: function(settings) {
    //     $('.delete_data').click(function() {
    //             $.ajax({
    //                 url: '../assets/php/c_getSingle.php',
    //                 data: { id: $(this).attr('data-id') },
    //                 method: 'POST',
    //                 dataType: 'json',
    //                 error: err => {
    //                     alert("An error occurred while fetching single data")
    //                 },
    //                 success: function(resp) {
    //                     if (!!resp.status) {
    //                         $('#delete_modal').find('input[name="id"]').val(resp.data['id'])
    //                         $('#delete_modal span[value=""]').text(resp.data.first_name+ " " +resp.data.last_name)
    //                         $('#delete_modal').modal('show')
    //                     } else {
    //                         alert("An error occurred while fetching single data")
    //                     }
    //                 }
    //             })
    //         })
    //   },
      buttons: [{
            text: '<i class="bi bi-plus-lg me-2"></i>Scan QR',
            className: "button is-dark py-0 mb-2",
            action: function(e, dt, node, config) {
                $('#scan_qr').modal('show')
            }
        }],
      "order": [
          [1, "asc"]
      ],
      initComplete: function(settings) {
          $('.paginate_button').addClass('p-1')
      }
  });
}
//Load Data
load_data()



$('#scan_qr').on('hidden.bs.modal', function (e) {
                                    
    scanner.stop();


                            });

$('#scan_qr').on('shown.bs.modal', function(e) { e.preventDefault();
                            
                const video = document.getElementById('preview');
                let scanner = new Instascan.Scanner({ video: video });

                // Function to send scanned data to server
function sendDataToServer(content) {
    // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();
    
    // Configure the request
    xhr.open('POST', 'php/insert_dtr.php'); // Assuming your server-side script is named insertData.php
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




});
</script>
 
</html>