<?php
require_once('db_conn.php');

if (isset($_POST['addData'])) {

    // Sanitize user inputs
    $fname = trim($_POST['fname']);
    $mname = trim($_POST['mname']);
    $lname = trim($_POST['lname']);
    $password = trim($_POST['password']);

    $ciphering = "aes-256-ctr";
    $option = 0;
    $encryption_iv = '1234567890123456';
    $encryption_key = 'devanshu';
    $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $option, $encryption_iv);

    $b_day = trim($_POST['b_day']);
    $comp_add = trim($_POST['comp_add']);
    $contact = trim($_POST['contact']);
    $civil_status = trim($_POST['civil_status']);
    $d_hired = trim($_POST['d_hired']);
    $gender = trim($_POST['gender']);
    $department = trim($_POST['department']);
    $username = trim($_POST['username']);

    // Generate unique emp_id
    function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    $randomString = generateRandomString();

    // Check if emp_id exists
    $maxAttempts = 10;
    $count = 1;
    while ($count > 0 && $maxAttempts > 0) {
        $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM employee WHERE emp_id = :emp_id");
        $stmt->execute(['emp_id' => $randomString]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $row['count'];
        if ($count > 0) {
            $randomString = generateRandomString();
            $maxAttempts--;
        }
    }

    if ($count == 0) {
        $stmt = $conn->prepare("INSERT INTO employees 
            (username, emp_id, f_name, m_name, l_name, password, b_day, comp_add, contact, gender, civil_stat, date_hired, department) 
            VALUES 
            (:username, :emp_id, :f_name, :m_name, :l_name, :password, :b_day, :comp_add, :contact, :gender, :civil_stat, :date_hired, :department)");

        $result = $stmt->execute([
            'username'    => $username,
            'emp_id'      => $randomString,
            'f_name'      => $fname,
            'm_name'      => $mname,
            'l_name'      => $lname,
            'password'    => $encryption,
            'b_day'       => $b_day,
            'comp_add'    => $comp_add,
            'contact'     => $contact,
            'gender'      => $gender,
            'civil_stat'  => $civil_status,
            'date_hired'  => $d_hired,
            'department'  => $department
        ]);

        if ($result) {
            echo json_encode(['status' => 200, 'message' => 'Data Added Successfully']);
        } else {
            echo json_encode(['status' => 500, 'message' => 'Data Creation Failed']);
        }

    } else {
        echo json_encode(['status' => 500, 'message' => 'Failed to generate a unique emp_id after multiple attempts']);
    }
}