<?php

namespace Refactoring\usuarios;

use Refactoring\core\DBAbstractModel;

class CustomerToTravel extends DBAbstractModel
{
    public $name;
    public $contador;
    public $_travels = array();
    public $id;

    function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addTravel(Travel $arg)
    {
        $this->_travels[] = $arg;
    }

    public function statement() {
        $travels = $this->_travels;
        $result = "Travel by " . $this->getName() . " to\n";

        foreach ($travels as $travel){

            $result = $result . "\t" . $travel->getTravel()->getCity(). ": " . $travel->obtainPrice() . "\n";
        }
        $result = $result . "\t-Total: " . $this->getPrice($this->_travels) ."\n";

        return $result;

    }

    public function getPrice($travels){
        $totalAmount = 0;
        foreach ($travels as $travel) {
            $totalAmount += $travel->obtainPrice();
        }
        return $totalAmount;
    }

    public function get($name)
    {
        $this->getUser($name);

        $this->ifUserNotExist($name);
//        if (count($this->rows) == 1) {
        foreach ($this->rows[0] as $propiedad => $valor) {
            $this->$propiedad = $valor;
          }
        $this->getTravel($this->rows[0]['id']);
//        print_r($this->rows);

//        for($i = 0; $i <count($this->rows); $i++){
//            $this->names[$i] = $this->rows[$i]['name'];
//            $this->id[$i] = $this->rows[$i]['id'];
//
//        }

//            $this->mensaje = 'Usuario encontrado';
//        } else {
//            $this->mensaje = 'Usuario no encontrado';
//        }
    }

    public function set($user_data=array() )
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        if ($name) {
            $this->get($name);
            if ($name != $this->name) {
                $this->setUser($name);
            } else {
                $this->mensaje = 'El usuario ya existe';
            }
        } else {
            $this->mensaje = 'No se ha agregado al usuario';
        }
    }

    public function edit($customer_data=array())
    {
        foreach ($customer_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
            UPDATE customers
            SET name='$name'
            WHERE id = '$id'
        ";
        $this->execute_single_query();
        $this->mensaje = 'Ventana modificada';
    }

    public function delete($name)
    {
        $this->query = "
                 DELETE FROM customers
                 WHERE name = '$name'
                 ";
        $this->execute_single_query();
        $this->mensaje = 'Usuario eliminado';
    }

    /**
     * @param $name
     */
    private function getUser($name): void
    {
        if ($name != '') {
            $this->query = "
                 SELECT *
                 FROM customers
                 WHERE name = '$name'
                 ";
            $this->get_results_from_query();

        }
    }

    /**
     * @param $name
     */
    private function ifUserNotExist($name): void
    {
        if ($name == '' || !$this->rows) {
//            $this->query = "
//                SELECT *
//                FROM customers
//                 ";
//            $this->get_results_from_query();
            $this->rows[0]['name'] = 'Usuario no econtrado';
            $this->rows[0]['id'] = 'Usuario no econtrado';

        }
    }

    /**
     * @param $name
     */
    private function setUser($name): void
    {
        $this->query = "
                     INSERT INTO customers
                     (name)
                     VALUES
                     ('$name')
                     ";
        $this->execute_single_query();
        $this->mensaje = 'Usuario agregado exitosamente';
    }

    /**
     * @param $price
     * @param $city
     */
    public function getTravel($lastId, $posicion = 0): void
    {
//        print_r('entre: '. $lastId);
        $this->query = "
            SELECT *
                 FROM viajes
                 WHERE id_customer = '$lastId'
            ";
        $this->get_results_from_query();
        if(count($this->rows) > 0 ){
            foreach ($this->rows[$posicion] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
        $this ->contador = count($this->rows);
    }
}