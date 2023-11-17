<?php
include "../Controlador/dbcon.php";
$result = $con->query("SELECT * FROM employee");
$customers = $result->fetch_all(MYSQLI_ASSOC);
$data = array();
foreach($result as $row)
{
    $sub_array = array();
    $sub_array[] = $row['id'];
    $sub_array[] = $row['name'];
    $sub_array[] = $row['email'];
    $sub_array[] = $row['phone'];
    $data[] = $sub_array;
}
$output = array(
    'data'      =>   $data
);
echo json_encode($output);
?>