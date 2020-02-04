<?php
namespace Refactoring\DbAction;
class DbAction extends \Refactoring\core\DBAbstractModel
{

    public function get($name)
    {
         $this->query = "
              SELECT *
              FROM customers
              WHERE name = '$name' 
         ";
         $this->get_results_from_query();


        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor):
                $this->$propiedad = $valor;
            endforeach;
            $this->mensaje = 'Ventana encontrada';
        } else {
            $this->mensaje = 'Venatana no encontrada';
        }

    }



    public function set($name, $price, $city){

        $this->get($name);
        if($name != $this->name) {
            $this->setCustomer($name);
            $this->setViaje($price, $city, $this->lastId);
        } else {
            $this->setViaje($price, $city, $this->id);

        }


    }

    public function edit($ventanas_data=array() ){

        foreach ($ventanas_data as $campo=>$valor):
            $$campo = $valor;

        endforeach;
        $this->query = "
            UPDATE viajes
            SET city='$city',
            price='$price'
            WHERE city = '$city'
        ";
        $this->execute_single_query();
        $this->mensaje = 'Ventana modificada';
    }

    public function delete($travel_city='') {
        $this->query = "
             DELETE FROM viajes
             WHERE city = '$travel_city'
     ";
        $this->execute_single_query();
        $this->mensaje = 'Ventana eliminada';
    }

    function __destruct() {
        // unset($this);
    }

    /**
     * @param $price
     * @param $city
     */
    private function setViaje($price, $city, $lastId): void
    {
        $this->query = "
            INSERT INTO viajes
               (city, price, id_customer)
            VALUES
                ('$city', $price, $lastId)
            ";
        $this->execute_single_query();
        $this->mensaje = 'Ventana agregada exitosamente ';

    }

    /**
     * @param $name
     */
    private function setCustomer($name): void
    {
        $this->query = "
               INSERT INTO customers
               (name)
               VALUES ('$name')
          ";
        $this->execute_single_query();
        $this->mensaje = 'Ventana agregada exitosamente ';

    }

}
