<?php
require_once("db_conn.php");
extract($_POST);

$draw = $_POST['draw'] ?? 1;
$start = $_POST['start'] ?? 0;
$length = $_POST['length'] ?? 10;
$searchValue = $_POST['search']['value'] ?? '';
$orderColumnIndex = $_POST['order'][0]['column'] ?? 0;
$orderDir = $_POST['order'][0]['dir'] ?? 'asc';

// Columns for ordering
$columns_arr = [
    "emp_id",
    "first_name",
    "middle_name",
    "last_name",
    "birth_date",
    "address",
    "contact_no",
    "gender",
    "civil_status",
    "date_hired",
    "departments.name" // Use full table.column name for JOINed columns
];

// Total records (no filter)
$totalCount = $conn->query("SELECT COUNT(*) FROM employees")->fetchColumn();

// Filtering
$search_where = '';
$params = [];
if(!empty($searchValue)){
    $search_where = " WHERE employees.emp_id LIKE :search 
        OR employees.first_name LIKE :search 
        OR employees.middle_name LIKE :search 
        OR employees.last_name LIKE :search 
        OR employees.birth_date LIKE :search 
        OR employees.address LIKE :search 
        OR employees.contact_no LIKE :search 
        OR employees.gender LIKE :search 
        OR employees.civil_status LIKE :search 
        OR employees.date_hired LIKE :search 
        OR departments.name LIKE :search"; // Use actual column in JOIN
    $params[':search'] = "%$searchValue%";
}

// Ordering
$orderColumn = $columns_arr[$orderColumnIndex] ?? 'emp_id';
$orderDir = strtolower($orderDir) === 'desc' ? 'DESC' : 'ASC';

// Main query with JOIN
$sql = "SELECT employees.*, departments.name AS department_name
        FROM employees
        INNER JOIN departments ON employees.department_id = departments.id
        $search_where
        ORDER BY $orderColumn $orderDir
        LIMIT :length OFFSET :start";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':length', (int)$length, PDO::PARAM_INT);
$stmt->bindValue(':start', (int)$start, PDO::PARAM_INT);
foreach ($params as $key => $val) {
    $stmt->bindValue($key, $val, PDO::PARAM_STR);
}
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Filtered count
$sqlCount = "SELECT COUNT(*) 
             FROM employees
             INNER JOIN departments ON employees.department_id = departments.id
             $search_where";
$stmt2 = $conn->prepare($sqlCount);
foreach ($params as $key => $val) {
    $stmt2->bindValue($key, $val, PDO::PARAM_STR);
}
$stmt2->execute();
$recordsFiltered = $stmt2->fetchColumn();

// Add fullname
foreach ($data as &$row) {
    $row['fullname'] = $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
}

echo json_encode([
    'draw' => (int)$draw,
    'recordsTotal' => (int)$totalCount,
    'recordsFiltered' => (int)$recordsFiltered,
    'data' => $data
]);