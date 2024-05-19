<?php
require_once('db_conn.php');
session_start();
$userId = $_SESSION['USERNAME']; // Retrieve the logged-in user's username

extract($_POST);

$totalCountQuery = "SELECT * FROM `dtr` WHERE username = '{$userId}'";
$totalCount = $conn->query($totalCountQuery)->num_rows;

$search_where = "WHERE username = '{$userId}'"; // Base condition to filter by username

if (!empty($search)) {
    $search_where .= " AND ("; // Adjust the condition to add AND for further filtering
    $search_where .= " emp_id LIKE '%{$search['value']}%' ";
    $search_where .= " OR f_name LIKE '%{$search['value']}%' ";
    $search_where .= " OR m_name LIKE '%{$search['value']}%' ";
    $search_where .= " OR l_name LIKE '%{$search['value']}%' ";
    $search_where .= " OR department LIKE '%{$search['value']}%' ";
    $search_where .= " OR time_in LIKE '%{$search['value']}%' ";
    $search_where .= " OR time_out LIKE '%{$search['value']}%' ";
    $search_where .= " OR status LIKE '%{$search['value']}%' ";
    $search_where .= ")";
}

$columns_arr = array(
    "emp_id",
    "f_name",
    "m_name",
    "l_name",
    "department",
    "time_in",
    "time_out",
    "status",
);

$query = $conn->query("SELECT * FROM `dtr` {$search_where} ORDER BY {$columns_arr[$order[0]['column']]} {$order[0]['dir']} LIMIT {$length} OFFSET {$start}");
$recordsFilterCountQuery = "SELECT * FROM `dtr` {$search_where}";
$recordsFilterCount = $conn->query($recordsFilterCountQuery)->num_rows;

$recordsTotal = $totalCount;
$recordsFiltered = $recordsFilterCount;
$data = array();
$i = 1 + $start;

while ($row = $query->fetch_assoc()) {
    $row['time_in'] = date("h:i a", strtotime($row['time_in']));
    $row['fname'] = $row['f_name'] . ' ' . $row['m_name'] . ' ' . $row['l_name'];
    $row['date'] = date("M d, Y", strtotime($row['date']));

    if (!empty($row['time_out'])) {
        $row['time_out'] = date("h:i a", strtotime($row['time_out']));
    }

  
    $image_name = $row['image'];
    
    // Get the path of the uploads folder on the local server
    $upload_folder = "uploads/";


    // Check if the image file exists in the uploads folder and create HTML code to display the image
    if (file_exists($upload_folder . $image_name)) {
        $row['image_data'] = 'Image not found';
    } else {

        $row['image_data'] = '<img src="'. $upload_folder . $image_name .'" style="width: 150px; height: 150px;" alt="">';
    }

    $data[] = $row;
}

echo json_encode(array(
    'draw' => $draw,
    'recordsTotal' => $recordsTotal,
    'recordsFiltered' => $recordsFiltered,
    'data' => $data
));
?>
