<?php 
require_once('db_conn.php');

if (isset($_POST['addData'])) {

// Sanitize and escape user inputs
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$mname = mysqli_real_escape_string($conn, $_POST['mname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$password = mysqli_real_escape_string($conn, $_POST['password']) ;

    $ciphering = "aes-256-ctr";
    $option = 0;
    $encryption_iv = '1234567890123456';
    $encryption_key = 'devanshu';
    $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $option, $encryption_iv);


$b_day = mysqli_real_escape_string($conn, $_POST['b_day']);
$comp_add = mysqli_real_escape_string($conn, $_POST['comp_add']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);
$civil_status = mysqli_real_escape_string($conn, $_POST['civil_status']);
$d_hired = mysqli_real_escape_string($conn, $_POST['d_hired']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$username = mysqli_real_escape_string($conn, $_POST['username']);

// Generate a unique emp_id
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    $maxTries = 10; // Maximum number of tries to generate a unique string

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

$randomString = generateRandomString();

$query = "SELECT COUNT(*) AS count FROM employee WHERE emp_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $randomString);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

$maxAttempts = 10;
while ($count > 0 && $maxAttempts > 0) {
    $randomString = generateRandomString();
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    $maxAttempts--;
}

if ($count == 0) {
    $query = "INSERT INTO `employee` (`username`,`emp_id`, `f_name`, `m_name`, `l_name`, `password`, `b_day`, `comp_add`, `contact`, `gender`, `civil_stat`, `date_hired`, `department`) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssssss",$username, $randomString, $fname, $mname, $lname, $encryption, $b_day, $comp_add, $contact, $gender, $civil_status, $d_hired, $department);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($result) {
        $res = [
            'status' => 200,
            'message' => 'Data Added Successfully'
        ];
        echo json_encode($res);
    } else {
        $res = [
            'status' => 500,
            'message' => 'Data Creation Failed'
        ];
        echo json_encode($res);
    }
} else {
    echo "Failed to generate a unique random string after multiple attempts.";
}




    

}