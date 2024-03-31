<?php 
require_once('db_conn.php');

if (isset($_POST['addData'])) {
     

    $d_name      = mysqli_real_escape_string($conn, $_POST['d_name']) ;

    // $violation  = mysqli_real_escape_string($conn, $_POST['viol']);
    
    if ($d_name == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO `department` (`d_name`) VALUES ('$d_name')";
        $query_run = mysqli_query($conn, $query);
        if ($query_run){
            $res = [
                'status' => 200,
                'message' => 'Data Added Successfully'
            ];
            echo json_encode($res);
            return;
        }else {

            $res = [
                'status' => 500,
                'message' => 'Data Creation Failed'
            ];
            echo json_encode($res);
            return;
        

    }

}