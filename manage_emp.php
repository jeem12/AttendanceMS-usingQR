<?php include "partial/head.php" ?>
<?php require_once "php/db_conn.php"; ?>


<body>
    <div class="dashboard-main-wrapper">
        <?php include "partial/nav.php" ?>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Manage Employee</h2>
                                <p class="pageheader-text">Employee management system dashboard</p>
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

                    <div class="modal fade" id="addModal" tabindex="-1" data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Employee Form</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div id="errorMessage" class="alert alert-warning d-none"></div>
                                <div class="modal-body">
                                    <form id="addData">
                                        <input type="text" class="form-control mb-3" name="username" placeholder="Username">
                                        <input type="text" class="form-control mb-3" name="fname" placeholder="First Name">
                                        <input type="text" class="form-control mb-3" name="mname" placeholder="Middle Name">
                                        <input type="text" class="form-control mb-3" name="lname" placeholder="Last Name">
                                        <label>Birth Day</label>
                                        <input type="date" class="form-control mb-3" name="b_day">
                                        <input type="text" class="form-control mb-3" name="comp_add" placeholder="Complete Address">
                                        <input type="text" class="form-control mb-3" name="contact" placeholder="Contact Number">
                                        <label>Marital Status</label>
                                        <select class="form-control mb-3" name="civil_status">
                                            <option selected>Select</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                        <label>Date Hired</label>
                                        <input type="date" class="form-control mb-3" name="d_hired">
                                        <label>Gender</label><br>
                                        <input type="radio" name="gender" value="Male"> Male
                                        <input type="radio" name="gender" value="Female"> Female
                                        <select class="form-control mt-3" name="department">
                                            <option selected disabled>Department</option>
                                            <?php
                                            require_once 'php/db_conn.php'; // Make sure $conn is your PDO instance

                                            try {
                                                $stmt = $conn->prepare("SELECT * FROM department");
                                                $stmt->execute();
                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    echo '<option value="' . htmlspecialchars($row['d_name'], ENT_QUOTES) . '">' 
                                                        . htmlspecialchars($row['d_name'], ENT_QUOTES) . '</option>';
                                                }
                                            } catch (PDOException $e) {
                                                echo '<option disabled>Error loading departments</option>';
                                            }
                                            ?>
                                        </select>
                                        <div class="modal-footer mt-3">
                                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Employees Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="employee" class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>EMPLOYEE ID</th>
                                                <th>USERNAME</th>
                                                <th>FULL NAME</th>
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

                </div>
            </div>
        </div>
    </div>

<?php include "partial/foot.php" ?>

<script>
var employee = '';
$(function() {
    function draw_data() {
        if ($.fn.dataTable.isDataTable('#employee') && employee != '') {
            employee.draw(true);
        } else {
            load_data();
        }
    }

    function load_data() {
        employee = $('#employee').DataTable({
            dom: '<"d-flex justify-content-end mb-2"B>flr<"py-2 my-2"t>i',
            processing: true,
            serverSide: true,
            ajax: {
                url: "php/m_emp_getData.php",
                method: 'POST'
            },
            columns: [
                {data: 'emp_id', className:'text-center', defaultContent:'No data available'},
                {data: 'username', className:'text-center', defaultContent:'No data available'},
                {data: 'fullname', className:'text-center', defaultContent:'No data available'},
                {data: 'birth_date', className:'text-center', defaultContent:'No data available'},
                {data: 'address', className:'text-center', defaultContent:'No data available'},
                {data: 'contact_no', className:'text-center', defaultContent:'No data available'},
                {data: 'gender', className:'text-center', defaultContent:'No data available'},
                {data: 'civil_status', className:'text-center', defaultContent:'No data available'},
                {data: 'date_hired', className:'text-center', defaultContent:'No data available'},
                {data: 'department_name', className:'text-center', defaultContent:'No data available'},
                {data: null, orderable:false, className:'text-center', render:function(data,type,row){
                    return data.username === 'admin' ? '<span class="badge badge-pill badge-warning">No Action Available</span>'
                        : '<a class="btn btn-sm btn-primary gen_qr" href="javascript:void(0)" data-id="'+row.id+'">Generate QR</a>';
                }}
            ],
            drawCallback: function(settings) {
                $('.gen_qr').click(function() {
                    var empId = $(this).attr('data-id');
                    $.post('php/emp_getSingle.php', {id: empId}, function(resp) {
                        if (resp.status) {
                            var options = {text: resp.data.emp_id, width:240, height:240, colorDark:"#000", colorLight:"#fff", correctLevel: QRCode.CorrectLevel.Q};
                            var qrcode = new QRCode(document.getElementById("qrcode"), options);
                            $('#qr_modal .modal-title').text(resp.data.emp_id+" - "+resp.data.f_name+" "+resp.data.l_name);
                            $('#qr_modal').modal('show');
                            $('#qr_modal').on('hidden.bs.modal', function(){ qrcode.clear(); draw_data(); });
                        } else {
                            alert("Error fetching data");
                        }
                    }, 'json');
                });
            },
            buttons: [{text:'Add Employee', className:"btn btn-dark btn-lg", action:function(){ $('#addModal').modal('show'); }}],
            order:[[1,"asc"]],
            initComplete:function(){ $('.paginate_button').addClass('p-1'); }
        });
    }
    load_data();

    $('#addData').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("addData", true);
        $.ajax({
            type:"POST",
            url:"php/emp_addData.php",
            data: formData,
            processData:false,
            contentType:false,
            dataType:'json',
            success:function(res){
                if(res.status==422){
                    $('#errorMessage').removeClass('d-none').text(res.message);
                } else if(res.status==200){
                    $('#errorMessage').addClass('d-none');
                    $('#addModal').modal('hide'); $('#addData')[0].reset();
                    alertify.set('notifier','position','bottom-right'); alertify.success(res.message);
                    draw_data();
                } else if(res.status==500){
                    alert(res.message);
                }
            }
        });
    });
});
</script>
</body>
</html>