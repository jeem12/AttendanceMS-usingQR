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
                                <h2 class="pageheader-title">Manage Employee </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Manage Employee</li>
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


           <!-- ADD MODAL -->

  <div class="modal fade" id="addModal" tabindex="-1" data-bs-keyboard="false">
              <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Employee Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div id="errorMessage" class="alert alert-warning d-none"></div>
                  <div class="modal-body">
                      <div class="container-fluid">
                      <form id="addData" >


            <div class="input-group mb-3">
                <input type="text" class="form-control" name="fname" placeholder="First Name" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="mname" placeholder="Middle Name" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="lname" placeholder="Last Name" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="password" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <label for="inputPassword5">Birth Day</label>
            <input type="date" id="inputPassword5" name="b_day" class="form-control" aria-describedby="passwordHelpBlock">

            <div class="input-group mb-3 mt-3">
                <input type="text" class="form-control" name="comp_add" placeholder="Complete Address" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="contact" placeholder="Contact Number" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            

            <div class="mt-3 mb-3">
                <label for="">Marital Status</label>
            <select class="form-control" name="civil_status">
                         <option selected>Select</option>
                         <option value="Single">Single</option>
                         <option value="Married">Married</option>
                         <option value="Divorced">Divorced</option>
                         <option value="Widowed">Widowed</option>
            </select>
            </div>

            <div class="mt-3 mb-3">
            <label for="inputPassword5">Date Hired</label>
            <input type="date" id="inputPassword5" name="d_hired" class="form-control" aria-describedby="passwordHelpBlock">
            </div>

            <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="Male">
                    <label class="custom-control-label" for="customRadioInline1">Male</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="Female">
                    <label class="custom-control-label" for="customRadioInline2">Female</label>
            </div>

            <div class="mb-3 mt-3">
                
                <select class="form-control" name="department">
                <option selected disabled>Department</option>
                <?php 
                require_once "php/db_conn.php";

                $sql = "SELECT * FROM department";
                $query_run = mysqli_query($conn, $sql);

                if(mysqli_num_rows($query_run) > 0)
                    {

                         while ($row = $query_run->fetch_array()){
                ?>
                <option value="<?= $row['d_name']?>"><?= $row['d_name']?></option>
                <?php 
                    }
                    }
                ?>
                </select>
            </div>
                    

              </div>
                  </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
                  </form>
                </div>
              </div>

                </div>
              
<!-- /ADD MODAL-->


            <!-- QR MODAL -->
            <div id="qr_modal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div id="qrcode"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>

            <!-- MODAL -->

           



            <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Employees Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="employee" class="table table-striped table-bordered first">
                                    
                                        <thead>
                                            <tr>
                                                <th>EMPLOYEE ID</th>
                                                <th>FIRT NAME</th>
                                                <th>MIDDLE NAME</th>
                                                <th>LAST NAME</th>
                                                <th>BIRTH DAY</th>
                                                <th>COMPLETE ADDRESS</th>
                                                <th>CONTACT NUMBER</th>
                                                <th>GENDER</th>
                                                <th>CIVIL STATUS</th>
                                                <th>DATE HIRED</th>
                                                <th>DEPARTMENT</th>
                                                <th>ACTION</th>
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
		$(document).ready(function() {
			// Bind change event to radio buttons
			$('input[type=radio][name=level]').change(function() {
				// Get selected category
				var category = $(this).val();
				// Fetch violin names for selected category
				$.ajax({
					url: '../assets/php/fetch_viol_names.php',
					type: 'POST',
					data: { category: category },
					success: function(response) {
						// Update select options with fetched violin names
						$('#viol').html(response);
					}
				});
			});
		});

        
	</script>

<script>
    var employee = '';
    $(function() {
    // draw function [called if the database updates]
    function draw_data() {
        if ($.fn.dataTable.isDataTable('#employee') && employee != '') {
            employee.draw(true)
        } else {
            load_data();
        }
    }


function load_data() {
employee = $('#employee').DataTable({
      dom: '<"row"B>flr<"py-2 my-2"t>i',
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: "../php/m_emp_getData.php",
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
              data: 'b_day',
              className: 'text-center',
              defaultValue: 'No data available'

          },
          {
              data: 'comp_add',
              className: 'text-center',
              defaultValue: 'No data available'
          },
          {
              data: 'contact',
              className: 'text-center',
              defaultValue: 'No data available'
          },
          {
              data: 'gender',
              className: 'text-center',
              defaultValue: 'No data available'
          },  
          {
              data: 'civil_stat',
              className: 'text-center',
              defaultValue: 'No data available'
          },  
          {
              data: 'date_hired',
              className: 'text-center',
              defaultValue: 'No data available'
          },  
          {
              data: 'department',
              className: 'text-center',
              defaultValue: 'No data available'
          },  
          {
                    data: null,
                    orderable: false,
                    className: 'text-center',
                    render: function(data, type, row, meta) {
                        // console.log()
                        return '<a class="me-2 btn btn-sm rounded-2 mb-1 gen_qr btn-primary" href="javascript:void(0)" data-id="' + (row.id) + '">Generate QR</a>';
                    }
                }
      ],


      drawCallback: function(settings) {
        $('.gen_qr').click(function() {
                $.ajax({
                    url: '../php/emp_getSingle.php',
                    data: { id: $(this).attr('data-id') },
                    method: 'POST',
                    dataType: 'json',
                    error: err => {
                        alert("An error occurred while fetching single data")
                    },
                    success: function(resp) {
                        if (!!resp.status) {
               
                            var options_object = {
                            // ====== Basic
                            text: resp.data.emp_id,
                            width: 240,
                            height: 240,
                            colorDark : "#000000",
                            colorLight : "#ffffff",
                            correctLevel : QRCode.CorrectLevel.Q, // L, M, Q, H
                            }

                            var qrcode = new QRCode(document.getElementById("qrcode"), options_object);


                            
                            $('#qr_modal .modal-title').text(resp.data.emp_id+" - "+resp.data.f_name+" "+resp.data.l_name);
                            // Event handler for when the modal is shown
                            $('#qr_modal').on('hidden.bs.modal', function (e) {
                                    qrcode.clear();
                                    location.reload();
                            });

                            $('#qr_modal').modal('show');
                            qrcode.download(resp.data.f_name+" "+resp.data.l_name+"_"+resp.data.emp_id+"_"+"QR Code");

                        } else {
                            alert("An error occurred while fetching single data")
                        }
                    }
                })
            })
      },
      buttons: [{
            text: '<i class="bi bi-plus-lg me-2"></i>Add Employee',
            className: "button is-dark py-0 mb-2",
            action: function(e, dt, node, config) {
                $('#addModal').modal('show')
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


        //add data
        $('#addData').submit(function (e) {
                e.preventDefault();
                            $('#addModal button').attr('disabled', true)
                            $('#addModal button[form="addData"]').text("saving ...")
                var formData = new FormData(this);
                formData.append("addData", true);

                $.ajax({
                type: "POST",
                url: "php/emp_addData.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                
                var res = jQuery.parseJSON(response);
                if(res.status == 422) {
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);

                }else if(res.status == 200){

                    $('#errorMessage').addClass('d-none');
                    $('#addModal').modal('hide');
                    $('#addData')[0].reset();

                    $('#addModal button').attr('disabled', false)
                    $('#addModal button[form="addData"]').text("Submit")
                    
                    
                    
                    alertify.set('notifier','position', 'bottom-right');
                    alertify.success(res.message);
                    
                    draw_data();


                }
                else if(res.status == 500) {
                    alert(res.message);
                }
                }
                });

                });





});
</script>


</html>