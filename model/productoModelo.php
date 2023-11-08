<?php
    class productoModelo{
        private $PDO;
        public function __construct()
        {
            require_once("c://xampp/htdocs/proyecto/config/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }
        public function insertar($precio, $nom, $color, $modelo, $tipo, $equipo, $marca){
            $stament = $this->PDO->prepare("INSERT INTO tbl_productos VALUES(null,:precio ,:nom ,:color ,:modelo ,:tipo ,:equipo,:marca)");
            $stament->bindParam(":precio",$precio);
            $stament->bindParam(":nom",$nom);
            $stament->bindParam(":color",$color);
            $stament->bindParam(":modelo",$modelo);
            $stament->bindParam(":tipo",$tipo);
            $stament->bindParam(":equipo",$equipo);
            $stament->bindParam(":marca",$marca);
            return ($stament->execute()) ? $this->PDO->lastInsertId() : false ;
        }
        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM tbl_productos where id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false ;
        }
        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM tbl_productos");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function update($id,$precio, $nom, $color, $modelo, $tipo, $equipo, $marca){
            $stament = $this->PDO->prepare("UPDATE tbl_productos SET precio = :precio,nom = :nom,color = :color,modelo = :modelo,tipo =:tipo,equipo =:equipo,marca =:marca  WHERE id = :id");
            $stament->bindParam(":id",$id);
            $stament->bindParam(":precio",$precio);
            $stament->bindParam(":nom",$nom);
            $stament->bindParam(":color",$color);
            $stament->bindParam(":modelo",$modelo);
            $stament->bindParam(":tipo",$tipo);
            $stament->bindParam(":equipo",$equipo);
            $stament->bindParam(":marca",$marca);
            return ($stament->execute()) ? $id : false;
        }
        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM tbl_productos WHERE id = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }
    }

?>