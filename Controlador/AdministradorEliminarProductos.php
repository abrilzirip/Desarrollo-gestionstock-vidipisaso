<?php include '../Controlador/db.php';



$consultaDelete = $conn->query
("DELETE FROM producto WHERE `producto`.`ID_PRODUCTO` = $ID_PRODUCTO");

?>