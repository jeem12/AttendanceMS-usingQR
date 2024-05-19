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
        <h5>SCAN YOUR QR</h5>
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




                <!-- Delete Modal -->
                <div class="modal fade" id="delete_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="delete-frm">
                            <input type="hidden" name="id">
                            <p>Are you sure you want to delete <b><span id="name" value=""></span></b> DTR?</p>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" form="delete-frm">Yes</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>


    
                <!-- Edit Modal -->
                <div class="modal fade" id="edit_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit <b><span id="name" value=""></span></b> Data</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="edit-frm">
                            <input type="hidden" name="id">
                            <div class="form-input">
                                <label for="time_in">Date</label>
                                <input type="date" name="date" required>
                            </div>
                            <div class="form-input">
                                <label for="time_in">Time In</label>
                                <input type="time" name="time_in" min="08:00" max="16:59" required>
                            </div>
                            <div class="form-input">
                                <label for="time_in">Time Out</label>
                                <input type="time" name="time_out" min="17:00" max="07:59" required>
                            </div>
                            <div class="form-input">
                            <label for="status">Status:</label>

                            <select name="status" id="status" required>
                            <option disabled selected value="">--Please choose an option--</option>
                            <option value="1">Time In</option>
                            <option value="2">Time Out</option>
                            <option value="3">Overtime</option>
                            </select>
                            </div>


                            
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="edit-frm">Submit</button>
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
                                                <th>IMAGE</th>
                                                <th>FULL NAME</th>
                                                <th>DEPARTMENT</th>
                                                <th>DATE</th>
                                                <th>TIME IN</th>
                                                <th>TIME OUT</th>
                                                <th>STATUS</th>
                                                <th data-priority="1">ACTION</th>
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

</body>


<?php include "partial/foot.php"?>

<script>

        $('#cap_img').on('hidden.bs.modal', function (e) {                              
            // location.reload();                             
        });

                                                            
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
      dom: 'flr<"py-2 my-2"t>i',
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
          {
                    data: null,
                    orderable: false,
                    className: 'text-center',
                    render: function(data, type, row, meta) {
                        console.log()
                        return '<a class="btn btn-md rounded-4 mb-1 p-2 px-6 delete_data btn-danger" href="javascript:void(0)" data-id="' + (row.id) + '">Delete</a><a class="btn btn-md rounded-4 mb-1 p-2 px-6 edit_data btn-primary" href="javascript:void(0)" data-id="' + (row.id) + '">Edit</a>';
                    }
                   
            }
            
      ],
      columnDefs: [
                      {
                          targets: 7,
                          render: function(data, type, row, meta) {
                              if (data == 1) {
                                  return '<p class="badge badge-success text-wrap text-center">ACTIVE</p>';
                              } else if (data == 2) {
                                  return '<p class="badge badge-warning text-wrap text-center">TIMED OUT</p>';
                              }
                              else if (data == 3) {
                                  return '<p class="badge badge-danger text-wrap text-center">OVERTIME</p>';
                              } else {
                                  return '<p class="badge text-bg-warning text-wrap text-center">Undefined Status</p>';
                              }
                          }
                      }
          ],
      drawCallback: function(settings) {
        $('.delete_data').click(function() {
                $.ajax({
                    url: 'php/dtr_getSingle.php',
                    data: { id: $(this).attr('data-id') },
                    method: 'POST',
                    dataType: 'json',
                    error: err => {
                        alert("An error occurred while fetching single data")
                    },
                    success: function(resp) {
                        if (!!resp.status) {
                            $('#delete_modal').find('input[name="id"]').val(resp.data['id'])
                            $('#delete_modal span[value=""]').text(resp.data.f_name+ " " +resp.data.l_name)
                            $('#delete_modal').modal('show')
                        } else {
                            alert("An error occurred while fetching single data")
                        }
                    }
                })
            }),
            $('.edit_data').click(function() {
                $.ajax({
                    url: 'php/dtr_getSingle.php',
                    data: { id: $(this).attr('data-id') },
                    method: 'POST',
                    dataType: 'json',
                    error: err => {
                        alert("An error occurred while fetching single data")
                    },
                    success: function(resp) {
                        if (!!resp.status) {
                            $('#edit_modal').find('input[name="id"]').val(resp.data['id'])
                            $('#edit_modal span[value=""]').text(resp.data.f_name+ " " +resp.data.l_name)
                            $('#edit_modal').modal('show')
                        } else {
                            alert("An error occurred while fetching single data")
                        }
                    }
                })
            })
      },
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



      // DELETE Data
      $('#delete-frm').submit(function(e) {
        e.preventDefault()
        $('#delete_modal button').attr('disabled', true)
        $('#delete_modal button[form="delete-frm"]').text("Deleting data ...")
        $.ajax({
            url: 'php/dtr_deleteData.php',
            data: $(this).serialize(),
            method: 'POST',
            dataType: "json",
            error: err => {
                alert("An error occurred. Please check the source code and try again")
            },
            success: function(resp) {
                if (!!resp.status) {
                    if (resp.status == 'success') {
                        alertify.set('notifier','position', 'bottom-right');
                        alertify.success(resp.msg);
                        $('#delete-frm').get(0).reset()
                        $('.modal').modal('hide')
                        draw_data();
                    } else if (resp.status == 'failed' && !!resp.msg) {
                        alertify.set('notifier','position', 'bottom-right');
                        alertify.error(resp.msg);
                    } else {
                        alert("An error occurred. Please check the source code and try again")
                    }
                } else {
                    alert("An error occurred. Please check the source code and try again")
                }

                $('#delete_modal button').attr('disabled', false)
                $('#delete_modal button[form="delete-frm"]').text("Yes")
            }
        })
    })


    // Edit Data
    $('#edit-frm').submit(function(e) {
        e.preventDefault()
        $('#edit_modal button').attr('disabled', true)
        $('#edit_modal button[form="edit-frm"]').text("Editing data ...")
        $.ajax({
            url: 'php/dtr_editData.php',
            data: $(this).serialize(),
            method: 'POST',
            dataType: "json",
            error: err => {
                alert("An error occurred. Please check the source code and try again")
            },
            success: function(resp) {
                if (!!resp.status) {
                    if (resp.status == 'success') {
                        alertify.set('notifier','position', 'bottom-right');
                        alertify.success(resp.msg);
                        $('#edit-frm').get(0).reset()
                        $('.modal').modal('hide')
                        draw_data();
                    } else if (resp.status == 'failed' && !!resp.msg) {
                        alertify.set('notifier','position', 'bottom-right');
                        alertify.error(resp.msg);
                    } else {
                        alert("An error occurred. Please check the source code and try again")
                    }
                } else {
                    alert("An error occurred. Please check the source code and try again")
                }

                $('#edit_modal button').attr('disabled', false)
                $('#edit_modal button[form="edit-frm"]').text("Yes")
            }
        })
    })


});
</script>
 
</html>