<?php
namespace Refactoring\Travels;

class Travels extends DBAbstractModel
{

    public $city;
    public $price;
    public $id_costumer;


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

    public function set($travel_data=array()){

        if(array_key_exists('city', $travel_data)):
            $this->get($travel_data['city']);
            if($travel_data['city'] != $this->city) {
                foreach ($travel_data as $campo => $valor):
                    $$campo = $valor;
                endforeach;
                $this->query = "
                    INSERT INTO viajes
                    (city, price)
                    VALUES
                    ('$city, '$price')
                ";

                $this->execute_single_query();
                $this->mensaje = 'Ventana agregada exitosamente';
            }else{
                $this->mensaje = 'No se ha agregado la ventana';
            }
        endif;
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
