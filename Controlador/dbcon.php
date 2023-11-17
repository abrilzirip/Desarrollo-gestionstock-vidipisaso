
<?php
$con = new mysqli('localhost','root','','testingdb');
if ($con->connect_error) {
    die('Error : ('. $con->connect_errno .') '. $con->connect_error);
}
?>