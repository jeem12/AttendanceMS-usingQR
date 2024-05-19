<?php
  session_start();
  if (isset($_SESSION['ID'])) {
      exit();
  }
  // Include database connectivity
    
  include_once('php/db_conn.php');
  
  if (isset($_POST['submit'])) {
      $errorMsg = "";
      $username = $conn->real_escape_string($_POST['username']);
      $password = $conn->real_escape_string($_POST['password']);

      $ciphering = "aes-256-ctr";
    $option = 0;
    $encryption_iv = '1234567890123456';
    $encryption_key = 'devanshu';
    $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $option, $encryption_iv);
      
  if (!empty($username) || !empty($password)) {
        $query  = "SELECT * FROM employee WHERE username = '$username' AND password = '$encryption'";
        $result = $conn->query($query);
        if($result->num_rows > 0){

            $row = $result->fetch_assoc();
            if ($row['username'] == 'admin') {
              $_SESSION['ID'] = $row['emp_id'];
              $_SESSION['USERNAME'] = $row['username'];
              $_SESSION['NAME'] = $row['f_name'] . $row['m_name'] . $row['l_name'];
              header("Location:index.php");
              die();  
            }else{
              $_SESSION['ID'] = $row['emp_id'];
              $_SESSION['USERNAME'] = $row['username'];
              $_SESSION['NAME'] = $row['f_name'] . $row['m_name'] . $row['l_name'];
              header("Location:user.php");
              die();  
            }
             
        }else{
          $errorMsg = "No user found on this username";
        } 
    }else{
      $errorMsg = "Username and Password is required";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendance MS - Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
  <script src="assets/vendor/jquery/jquery-3.7.1.min.js"></script>
</head>
<body>
<div class="card text-center" style="padding:20px;">
</div><br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">
        <?php if (isset($errorMsg)) { ?>
          <!-- <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" datadismiss="alert">&times;</button>

          </div> -->

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $errorMsg; ?>!</strong><br> Double check <strong>username</strong> and <strong>password</strong>.
            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> -->
              <!-- <span aria-hidden="true">&times;</span> -->
            <!-- </button> -->
          </div>
        <?php } ?>
        <form action="" method="POST">
          <div class="form-group">  
            <label for="username">Username:</label> 
            <input type="text" class="form-control" name="username" placeholder="Enter Username" >
          </div>
          <div class="form-group">  
            <label for="password">Password:</label> 
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="Login"> 
          </div>
        </form>
      </div>
  </div>
</div>
</body>
</html>