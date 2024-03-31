<?php 
require_once("db_conn.php");
extract($_POST);

$totalCount = $conn->query("SELECT * FROM `employee`")->num_rows;
$search_where = "";
if(!empty($search)){
    $search_where = " where ";
    $search_where .= " emp_id LIKE '%{$search['value']}%' ";
    $search_where .= " OR f_name LIKE '%{$search['value']}%' ";
    $search_where .= " OR m_name LIKE '%{$search['value']}%' ";
    $search_where .= " OR l_name LIKE '%{$search['value']}%' ";
    $search_where .= " OR b_day LIKE '%{$search['value']}%' ";
    $search_where .= " OR comp_add LIKE '%{$search['value']}%' ";
    $search_where .= " OR contact LIKE '%{$search['value']}%' ";
    $search_where .= " OR gender LIKE '%{$search['value']}%' ";
    $search_where .= " OR civil_stat LIKE '%{$search['value']}%' ";
    $search_where .= " OR date_hired LIKE '%{$search['value']}%' ";
    $search_where .= " OR department LIKE '%{$search['value']}%' ";

}
$columns_arr = array(
                     "emp_id",
                     "f_name",
                     "m_name",
                     "l_name",
                     "b_day",
                     "comp_add",
                     "contact",
                     "gender",
                     "civil_stat",
                     "date_hired",
                     "department",
                    );
$query = $conn->query("SELECT * FROM `employee` {$search_where} ORDER BY {$columns_arr[$order[0]['column']]} {$order[0]['dir']} limit {$length} offset {$start} ");
$recordsFilterCount = $conn->query("SELECT * FROM `employee` {$search_where} ")->num_rows;

$recordsTotal= $totalCount;
$recordsFiltered= $recordsFilterCount;
$data = array();
$i= 1 + $start;
while($row = $query->fetch_assoc()){
    // $row['fullname'] = $row['last_name'] . ', ' . $row['first_name'];
    $data[] = $row;
}
echo json_encode(array('draw'=>$draw,
                       'recordsTotal'=>$recordsTotal,
                       'recordsFiltered'=>$recordsFiltered,
                       'data'=>$data
                       )
);