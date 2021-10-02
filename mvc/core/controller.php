<?php
class Controller{

    // class Controller có nv nối giữa các model trong foler models
    // vs các controller trong folder controllers
    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

<<<<<<< HEAD
    public function view($view, $data = []){
=======
    public function view($view, $data=[]){
>>>>>>> 38f760c11d5805b0476b381e41435409f56e1be7
        require_once "./mvc/views/".$view.".php";
    }
}
?>