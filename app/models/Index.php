<?php
/**
 * Created by PhpStorm.
 * User: Franz
 * Date: 15/04/2019
 * Time: 12:43
 */
class Index{
    private $log;
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
        $this->log = new Log();
    }

    public function list(){
        try{
            $sql = 'select * from person';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $return = $stm->fetchAll();

        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = [];
        }

        return $return;
    }

    public function save($model){
        try{
            $sql = 'insert into person (person_name, person_surname) values (?,?)';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([
                $model->person_name,
                $model->person_surname
            ]);
            $return = 1;

        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
        }
        return $return;
    }

    public function delete($id){
        try{
            $sql = 'delete from person where id_person = ?';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([
                $id
            ]);
            $return = 1;

        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 0;
        }
        return $return;
    }
}