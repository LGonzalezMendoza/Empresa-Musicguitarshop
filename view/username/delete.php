<?php
    require_once("c://xampp/htdocs/proyecto/controller/productoClase.php");
    $obj = new productoClase();
    $obj->delete($_GET['id']);

?>