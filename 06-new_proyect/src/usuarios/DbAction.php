<?php
namespace Refactoring\usuarios;
class DbAction extends \Refactoring\core\DBAbstractModel
{

    public function get($name)
    {
        $this->getUser($name);

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor):
                $this->$propiedad = $valor;
//                $this->getTravel($id);
//                if (count($this->rows) > 0) {
//                    for($i = 0; $i < count($this->rows) ; $i++){
//                        foreach ($this->rows[$i] as $propiedad => $valor):
//                            $this->$propiedad = $valor;
//                        endforeach;
//                    }
//                    $this->mensaje = 'Ventana encontrada';
//                } else {
//                    $this->mensaje = 'Venatana no encontrada';
//                }

            endforeach;
            $this->mensaje = 'Ventana encontrada';
        } else {
            $this->mensaje = 'Venatana no encontrada';
        }

    }



    public function set($user_data=array() ){

        foreach ($user_data as $campo=>$valor):
            $$campo = $valor;
        endforeach;

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
//        print_r('Eliminar: '. $travel_city);
//
//        $this->query = "
//             DELETE FROM viajes
//             WHERE city = '$travel_city'
//     ";
//        $this->execute_single_query();
//        $this->mensaje = 'Ventana eliminada';
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

    /**
     * @param $name
     */
    private function getUser($name): void
    {
        $this->query = "
              SELECT *
              FROM customers
              WHERE name = '$name' 
         ";
        $this->get_results_from_query();
    }

    /**
     * @param $name
     */
    private function getTravel($id_customer): void
    {
        $this->query = "
              SELECT *
              FROM viajes
              WHERE id_customer = '$id_customer' 
         ";
        $this->get_results_from_query();
    }
}
