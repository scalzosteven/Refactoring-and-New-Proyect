<?php
namespace Refactoring\Travels;
class addTravelesToDb extends \Refactoring\core\DBAbstractModel
{

    public function get($travel_city = '')
    {

        if ($travel_city != ''):
            $this->query = "
                    SELECT *
                    FROM viajes
                    WHERE city = '$travel_city' 
                ";
            $this->get_results_from_query();
        endif;

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor):
                $this->$propiedad = $valor;
            endforeach;
            $this->mensaje = 'Ventana encontrada';
        } else {
            $this->mensaje = 'Venatana no encontrada';
        }

    }



    public function set($price, $city){

                $this->query = "
                    INSERT INTO viajes
                    (city, price)
                    VALUES
                    ('$city', '$price')
                ";
//                $this->query = "
//                    INSERT INTO customers
//                    VALUES $name
//                ";

                $this->execute_single_query();
                $this->mensaje = 'Ventana agregada exitosamente';


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

    function __construct()
    {
        $this->db_name = 'paredes_construir';
    }

    function __destruct() {
        // unset($this);
    }

}
