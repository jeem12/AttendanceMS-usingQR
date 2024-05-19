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
                <a class="navbar-brand" href="">Attendance MS</a>
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
                            <div id="time_in" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h6>Time In</h6>
                                    </div>
                                    <div class="modal-body">
                                    <video id="preview" autoplay style="width: 100%; height: auto;"></video>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <div id="time_out" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h6>Time Out</h6>
                                    </div>
                                    <div class="modal-body">
                                    <video id="preview2" autoplay style="width: 100%; height: auto;"></video>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                            <!-- CAPTURE IMAGE MODAL -->
            <div id="cap_img" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>CAPTURE IMAGE</h5>
      </div>
      <div class="modal-body">
      <div class="camera">
      <video id="camera-preview" autoplay style="width: 100%; height: auto;"></video>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="capture-button" class="btn btn-secondary" >Take Photo</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal
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
</div> -->



                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Teachers Attendance Logs</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first" id="user">
                                        <thead>
                                            <tr>
                                                <th>EMPLOYEE ID</th>
                                                <th>IMAGE</th>
                                                <th>FULL NAME</th>
                                                <th>DEPARTMENT</th>
                                                <th>DATE</th>
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
var myTable = '';
$(function() {
  // draw function [called if the database updates]
  function draw_data() {
      if ($.fn.dataTable.isDataTable('#user') && myTable != '') {
          myTable.draw(true)
      } else {
          load_data();
      }
  }
  

  function load_data() {
      myTable = $('#user').DataTable({
          dom: '<"row"B>flr<"py-2 my-2"t>ip',
          "processing": true,
          "serverSide": true,
          "ajax": {
              url: "php/user_getData.php",
              method: 'POST'
          },
          columns: [
              {
                  data: 'emp_id',
                  className: 'text-center',
                  defaultValue: 'No data available'
                  
                },
                {
                  data: 'image_data',
                  className: 'text-center',
                  defaultValue: 'No data available'
    
                },
          {
              data: 'fname',
              className: 'text-center',
              defaultValue: 'No data available'

          },
          {
              data: 'department',
              className: 'text-center',
              defaultValue: 'No data available'

          },
          {
              data: 'date',
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
          responsive: {
                        details: {
                                display: $.fn.dataTable.Responsive.display.modal( {
                                        header: function ( row ) {
                                            var data = row.data();
                                            return 'Details for '+data.last_name+', '+data.first_name;
                                        }
                                    } ),
    
                                    renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                    }

                },
          columnDefs: [
                      {
                          targets: 7,
                          render: function(data, type, row, meta) {
                              if (data == 1) {
                                  return '<p class="badge badge-success text-wrap text-center">ACTIVE</p>';
                              } else if (data == 2) {
                                  return '<p class="badge badge-danger text-wrap text-center">TIMED OUT</p>';
                              } else {
                                  return '<p class="badge text-bg-warning text-wrap text-center">Undefined Status</p>';
                              }
                          }
                      }
          ],
          drawCallback: function(settings) {
            $('.delete_data').click(function() {
                    $.ajax({
                        url: '../assets/php/c_getSingle.php',
                        data: { id: $(this).attr('data-id') },
                        method: 'POST',
                        dataType: 'json',
                        error: err => {
                            alert("An error occurred while fetching single data")
                        },
                        success: function(resp) {
                            if (!!resp.status) {
                                $('#delete_modal').find('input[name="id"]').val(resp.data['id'])
                                $('#delete_modal span[value=""]').text(resp.data.first_name+ " " +resp.data.last_name)
                                $('#delete_modal').modal('show')
                            } else {
                                alert("An error occurred while fetching single data")
                            }
                        }
                    })
                })
          },
          buttons: [{
                text: 'Time In',
                className: "button is-dark py-0 mb-2 me-2",
                action: function(e, dt, node, config) {
                    $('#time_in').modal('show')
                }
            },
            {
                text: 'Time Out',
                className: "button is-dark py-0 mb-2 me-2",
                action: function(e, dt, node, config) {
                    $('#time_out').modal('show')
                }
            }],
          "order": [
              [6, "asc"]
          ],
          initComplete: function(settings) {
              $('.paginate_button').addClass('p-1')
          }
      });
  }
  //Load Data
  load_data()



  $('#cap_img').on('shown.bs.modal', function(e) {
    // Prevent the default behavior of the event
    e.preventDefault();

    const video = document.getElementById('camera-preview');
    const captureButton = document.getElementById('capture-button');

    // Get user media - Access the camera
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            video.srcObject = stream;
        })
        .catch(function(error) {
            console.error('Error accessing the camera: ', error);
        });

    // Capture Image Button Click Event
    captureButton.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default form submission behavior
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
        // Set the canvas dimensions to match the video element
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        // Draw the current video frame onto the canvas
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Convert the canvas content to a Blob object
        canvas.toBlob(function(blob) {
            const formData = new FormData();
            formData.append('image', blob, 'captured_image.png');
            
            const imageData = canvas.toDataURL('image/png');

            // Send the captured image data to the server using AJAX
            $.ajax({
                type: 'POST',
                url: 'php/time_in_up.php', // Replace with your server-side script URL
                data: JSON.stringify({ image: imageData, content: 'image' }),
                contentType: 'application/json',
                success: function (response) {
                    var res = jQuery.parseJSON(response);

                    if(res.status == 200){

                    $('#cap_img').modal('hide');
                    
                    alertify.set('notifier','position', 'bottom-right');
                    alertify.success(res.message);
        
                    draw_data();


                }
                else if(res.status == 500) {
                    alert(res.message);
                }
                }
            });
        }, 'image/png');

        return false; // Prevent any further actions that might trigger a page reload
    });
});

  $('#time_in').on('shown.bs.modal', function(e) { e.preventDefault(); 
            const video = document.getElementById('preview');
            let scanner = new Instascan.Scanner({ video: video });
            function sendDataToServer(content) {
                // Create a new XMLHttpRequest object
                const xhr = new XMLHttpRequest();
                
                // Configure the request
                xhr.open('POST', 'php/time_in.php'); // Assuming your server-side script is named insertData.php
                xhr.setRequestHeader('Content-Type', 'application/json');
                
                // Define what happens on successful data submission
                xhr.onload = function() {
                    if (xhr.status === 200) {

                            $('#cap_img').modal('show');
                            $('#time_in').modal('hide');


                    }else{
                             // Parse the JSON response
                    var response = JSON.parse(xhr.responseText);
                    
                    // Access the message from the response object
                    var message = response.message;
            
                        alertify.set('notifier','position', 'bottom-right');
                        alertify.error(message);

                            $('#cap_img').modal('hide');
                            $('#time_in').modal('hide');
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


              $('#time_out').on('shown.bs.modal', function(e) { e.preventDefault(); 
            const video = document.getElementById('preview2');
            let scanner = new Instascan.Scanner({ video: video });
            function sendDataToServer(content) {
                // Create a new XMLHttpRequest object
                const xhr = new XMLHttpRequest();
                
                // Configure the request
                xhr.open('POST', 'php/time_out.php'); // Assuming your server-side script is named insertData.php
                xhr.setRequestHeader('Content-Type', 'application/json');
                
                // Define what happens on successful data submission
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Parse the JSON response
                        var response = JSON.parse(xhr.responseText);
                    
                        // Access the message from the response object
                        var message = response.message;

                            $('#cap_img').modal('show');
                            $('#time_out').modal('hide');


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