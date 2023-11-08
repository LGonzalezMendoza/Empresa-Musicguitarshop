<?php
    class productoClase{
        private $model;
        public function __construct()
        {
            require_once("c://xampp/htdocs/proyecto/model/productoModelo.php");
            $this->model = new productoModelo();
        }
        public function guardar( $precio, $nom, $color, $modelo, $tipo, $equipo, $marca){
            $id = $this->model->insertar( $precio, $nom, $color, $modelo, $tipo, $equipo, $marca);
            return ($id!=false) ? header("Location:show.php?id=".$id) : header("Location:create.php");
        }
        public function show($id){
            return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
        }
        public function index(){
            return ($this->model->index()) ? $this->model->index() : false;
        }
        public function update($id,$precio, $nom, $color, $modelo, $tipo, $equipo, $marca){
            return ($this->model->update($id,$precio, $nom, $color, $modelo, $tipo, $equipo, $marca) != false) ? header("Location:show.php?id=".$id) : header("Location:index.php");
        }
        public function delete($id){
            return ($this->model->delete($id)) ? header("Location:index.php") : header("Location:show.php?id=".$id) ;
        }
    }

?>