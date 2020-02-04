<?php
namespace Refactoring\core;
use mysqli;

abstract  class DBAbstractModel {

    private static $db_host = "db";
    private static $db_user= "root";
    private static $db_pass = "123456";
    protected $db_name = "viajes";
    protected $query;
    protected $rows = array();
    private $conn;
    public $mensaje = 'Hecho';

    abstract protected function get();
    abstract protected function set($price, $city);
    abstract protected function edit();
    abstract protected function delete();

    private function open_connection() {
        $this->conn = new mysqli(self::$db_host, self::$db_user,
            self::$db_pass, $this->db_name);
        if($this->conn){
            print_r("Coneccion extrablecidad");
        }
    }

    private function close_connection() {
        $this->conn->close();
    }

    protected function execute_single_query() {
        if(true){
            $this->open_connection();
            if ($this->conn->query($this->query)) {
                echo 'true';
            } else {
                echo 'false';
                echo $this->conn->error;
            }

            $this->close_connection();
        } else {
            $this->mensaje = 'Metodo no permitido';
        }
    }

    protected function get_results_from_query() {
        $this->open_connection();
        $result = $this->conn->query($this->query);
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        $this->close_connection();
        array_pop($this->rows);
    }
}

