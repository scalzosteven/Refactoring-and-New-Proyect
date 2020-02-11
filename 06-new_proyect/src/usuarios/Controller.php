<?php

namespace Refactoring\usuarios;

use Refactoring\usuarios\CustomerToTravel;

//require_once('constants.php');
//require_once('model.php');
//require_once('view.php');

class Controller
{
    protected $view;

    function __construct()
    {
        $this->view = new View();
    }

    function handler()
    {
        $event = Constants::VIEW_GET_USER;
        $uri = $_SERVER['REQUEST_URI'];
        $peticiones = array(
            Constants::SET_USER,
            Constants::GET_USER,
            Constants::DELETE_USER,
            Constants::EDIT_USER,
            Constants::VIEW_SET_USER,
            Constants::VIEW_GET_USER,
            Constants::VIEW_DELETE_USER,
            Constants::VIEW_EDIT_USER
        );
        foreach ($peticiones as $peticion) {
            $uri_peticion = Constants::MODULO . $peticion . '/';
            if (strpos($uri, $uri_peticion) == true) {
                $event = $peticion;
            }
        }
        $user_data = $this->helper_user_data();
        $usuario = $this->set_obj();
        switch ($event) {
            case Constants::SET_USER:
                $usuario->set($user_data);
                $data = array('mensaje' => $usuario->mensaje);
                $this->view->retornar_vista(Constants::VIEW_SET_USER, $data);
                break;
            case Constants::GET_USER:
                $usuario->get($user_data['name']);
                $data = array(
                    'name' => $usuario->name,
                    'id' => $usuario->id
                );
                $this->view->retornar_vista(Constants::VIEW_EDIT_USER, $data);
                break;
            case Constants::DELETE_USER:
                $usuario->delete($user_data['name']);
                $data = array('mensaje' => $usuario->mensaje);
                $this->view->retornar_vista(Constants::VIEW_DELETE_USER, $data);
                break;
            case Constants::EDIT_USER:
                $usuario->edit($user_data);
                $data = array('mensaje' => $usuario->mensaje);
                $this->view->retornar_vista(Constants::VIEW_GET_USER, $data);
                break;
            default:
                $this->view->retornar_vista($event);

        }
    }

    function set_obj()
    {
        $obj = new CustomerToTravel('');
        return $obj;
    }

    function helper_user_data()
    {
        $user_data = array();
        if ($_POST) {
            if (array_key_exists('name', $_POST)) {
                $user_data['name'] = $_POST['name'];
            }
            if (array_key_exists('id', $_POST)) {
                $user_data['id'] = $_POST['id'];
            }
//        if(array_key_exists('email', $_POST)) {
//            $user_data['email'] = $_POST['email'];
//        }
//        if(array_key_exists('clave', $_POST)) {
//            $user_data['clave'] = $_POST['clave'];
//        }
        } else {
            if ($_GET) {
                if (array_key_exists('name', $_GET)) {
                    $user_data['name'] = $_GET['name'];
                }
            }
        }
        return $user_data;
    }

}