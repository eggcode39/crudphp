<?php
/**
 * Created by PhpStorm.
 * User: Franz
 * Date: 15/04/2019
 * Time: 12:43
 */

require 'app/models/Index.php';
class IndexController{
    private $log;
    private $index;
    private $crypt;


    public function __construct()
    {
        $this->log = new Log();
        $this->index = new Index();
        //$this->menu = new Menu();
    }

    //Vistas
    public function index(){
        $person = $this->index->list();
        require _VIEW_PATH_ . 'index/index.php';

    }

    //Funciones
    public function save(){
        try{
            $model = new Index();
            $model->person_name = $_POST['person_name'];
            $model->person_surname = $_POST['person_surname'];
            $result = $this->index->save($model);
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
        }
        echo $result;
    }

    public function delete(){
        try{
            $id = $_POST['id'];
            $result = $this->index->delete($id);
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
        }
        echo $result;
    }

    public function nothing(){
        $result = 2;
        echo $result;
    }
}