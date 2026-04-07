


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance MS | Secure Login</title>
    
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/libs/css/login.css" rel="stylesheet">
        <link href="assets/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4">
            
            <div class="card login-card">
                <div class="card-header-custom">
                    <div class="brand-logo">ATTENDANCE MS</div>
                    <p class="mb-0 opacity-75 small fw-bold text-uppercase">QR Authentication</p>
                </div>
                
                <div class="card-body p-4 p-sm-5">
                    
                    <?php if (isset($errorMsg)): ?>
                        <div class="alert alert-danger py-2 border-0 small text-center" 
                             style="background-color: rgba(186, 45, 11, 0.1); color: var(--brick-ember);">
                            <strong>Access Denied:</strong> <?php echo htmlspecialchars($errorMsg); ?>
                        </div>
                    <?php endif; ?>

                    <form id="process_login">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="user" name="username" placeholder="Username" required>
                            <label for="user">Username <span class="text-danger">*</span></label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="pass" name="password" placeholder="Password" required>
                            <label for="pass">Password <span class="text-danger">*</span></label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-login text-uppercase">
                                Authorize
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-white border-0 pb-5 pt-0 text-center">
                    <hr class="mx-5 mb-4 divider">
                    <p class="small text-secondary mb-0">
                        New Personnel? 
                        <a href="register.php" class="register-link">Register Profile</a>
                    </p>
                    <p class="copyright-text">
                        JM ESCOBAR &bull; 2026
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- <script src="assets/libs/js/login.js"></script> -->

<script>
$(document).ready(function() {
    $('#process_login').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'php/process_login.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(result) {
                if (result.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful',
                        text: result.message,
                        confirmButtonColor: '#3085d6'
                    }).then(() => {
                        window.location.href = result.redirect;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: result.message,
                        confirmButtonColor: '#d33'
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Server Error',
                    text: 'Failed to reach the server or invalid response.',
                    confirmButtonColor: '#d33'
                });
                console.error('AJAX error:', status, error, xhr.responseText);
            }
        });
    });
});
</script>

</body>
</html>