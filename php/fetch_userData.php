<?php 
require_once("db_conn.php");
extract($_POST);
session_start();


$totalCount = $conn->query("SELECT * FROM `dtr` WHERE `emp_id` = 'n1iZBprW'")->num_rows;

$search_where = "";
if(!empty($search)){
    $search_where = " where ";
    $search_where .= " emp_id LIKE '%{$search['value']}%' ";
    $search_where .= " OR f_name LIKE '%{$search['value']}%' ";
    $search_where .= " OR m_name LIKE '%{$search['value']}%' ";
    $search_where .= " OR l_name LIKE '%{$search['value']}%' ";
    $search_where .= " OR department LIKE '%{$search['value']}%' ";
    $search_where .= " OR time_in LIKE '%{$search['value']}%' ";
    $search_where .= " OR time_out LIKE '%{$search['value']}%' ";
    $search_where .= " OR status LIKE '%{$search['value']}%' ";

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
$query = $conn->query("SELECT * FROM `dtr` {$search_where} ORDER BY {$columns_arr[$order[0]['column']]} {$order[0]['dir']} limit {$length} offset {$start} ");
$recordsFilterCount = $conn->query("SELECT * FROM `dtr` {$search_where} ")->num_rows;

$recordsTotal= $totalCount;
$recordsFiltered= $recordsFilterCount;
$data = array();
$i= 1 + $start;
while($row = $query->fetch_assoc()){
    $row['time_in'] = date("h:i a", strtotime($row['time_in']));


    if (!empty($row['time_out'])) {
        $row['time_out'] = date("h:i a", strtotime($row['time_out']));
    }


    $data[] = $row;
}
echo json_encode(array('draw'=>$draw,
                       'recordsTotal'=>$recordsTotal,
                       'recordsFiltered'=>$recordsFiltered,
                       'data'=>$data
                       )
);