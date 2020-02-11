<?php
# Importar modelo de abstracción de base de datos
namespace Refactoring\usuarios;

use Refactoring\core\DBAbstractModel;

class Usuario extends DBAbstractModel
{
############################### PROPIEDADES ################################
    public $nombre;
    public $apellido;
    public $email;
    private $clave;
    protected $id;
################################# MÉTODOS ##################################
    # Traer datos de un usuario
    public function get($nombre = '')
    {
        if ($nombre != '') {
            $this->query = "
                 SELECT *
                 FROM customers
                 WHERE name = '$nombre'
                 ";
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Usuario encontrado';
        } else {
            $this->mensaje = 'Usuario no encontrado';
        }
    }

    # Crear un nuevo usuario
    public function set($user_data=array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        if ($name) {
            $this->get($name);
            if ($name != $this->name) {
                $this->query = "
                     INSERT INTO customers
                     (name)
                     VALUES
                     ('$name')
                     ";
                $this->execute_single_query();
                $this->mensaje = 'Usuario agregado exitosamente';
            } else {
                $this->mensaje = 'El usuario ya existe';
            }
        } else {
            $this->mensaje = 'No se ha agregado al usuario';
        }
    }

    # Modificar un usuario
    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "
                 UPDATE customers
                 SET name='$nombre'
                 WHERE name = '$nombre'
                 ";
        $this->execute_single_query();
        $this->mensaje = 'Usuario modificado';
    }

    # Eliminar un usuario
    public function delete($name = '')
    {
        $this->query = "
                 DELETE FROM customers
                 WHERE name = '$name'
                 ";
        $this->execute_single_query();
        $this->mensaje = 'Usuario eliminado';
    }

    # Método constructor
    function __construct()
    {
        $this->db_name = 'book_example';
    }

    # Método destructor del objeto
    function __destruct()
    {
//        unset($this);
    }
}

?>