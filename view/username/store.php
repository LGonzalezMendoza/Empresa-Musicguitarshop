<?php
    require_once("c://xampp/htdocs/proyecto/controller/productoClase.php");
    $obj = new productoClase();
    $obj->guardar($_POST['precio'],$_POST['nom'],$_POST['color'],$_POST['modelo'],$_POST['tipo'],$_POST['equipo'],$_POST['marca']);
?>