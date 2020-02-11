<?php
namespace Refactoring\usuarios;

class View {

    public function getDiccionario(){
        return array(
            'subtitle'=>array(Constants::VIEW_SET_USER=>'Crear un nuevo usuario',
                Constants::VIEW_GET_USER=>'Buscar usuario',
                Constants::VIEW_DELETE_USER=>'Eliminar un usuario',
                Constants::VIEW_EDIT_USER=>'Modificar usuario'
            ),
            'links_menu'=>array(
                'VIEW_SET_USER'=>Constants::MODULO.Constants::VIEW_SET_USER.'/',
                'VIEW_GET_USER'=>Constants::MODULO.Constants::VIEW_GET_USER.'/',
                'VIEW_EDIT_USER'=>Constants::MODULO.Constants::VIEW_EDIT_USER.'/',
                'VIEW_DELETE_USER'=>Constants::MODULO.Constants::VIEW_DELETE_USER.'/'
            ),
            'form_actions'=>array(
                'SET'=>Constants::MODULO.Constants::SET_USER.'/',
                'GET'=>Constants::MODULO.Constants::GET_USER.'/',
                'DELETE'=>Constants::MODULO.Constants::DELETE_USER.'/',
                'EDIT'=>Constants::MODULO.Constants::EDIT_USER.'/'
            )
        );
    }
    public function get_template($form='get') {
        $file = 'site_media/html/usuario_'.$form.'.html';
        $template = file_get_contents($file);
        return $template;
    }
    public function render_dinamic_data($html, $data) {
        foreach ($data as $clave=>$valor) {
            $html = str_replace('{'.$clave.'}', $valor, $html);
        }
        return $html;
    }
    public function retornar_vista($vista, $data=array()) {
        $diccionario = $this->getDiccionario();
        $html = $this->get_template('template');
        $html = str_replace('{subtitulo}', $diccionario['subtitle'][$vista],
            $html);
        $html = str_replace('{formulario}', $this->get_template($vista), $html);
        $html = $this->render_dinamic_data($html, $diccionario['form_actions']);
        $html = $this->render_dinamic_data($html, $diccionario['links_menu']);
        $html = $this->render_dinamic_data($html, $data);
        // render {mensaje}
        if(array_key_exists('nombre', $data)
            &&
    //  array_key_exists('apellido', $data)&&
            $vista==Constants::VIEW_EDIT_USER) {
            $mensaje = 'Editar usuario '.$data['nombre'] ;
        } else {
            if(array_key_exists('mensaje', $data)) {
                $mensaje = $data['mensaje'];
            } else {
                $mensaje = 'Datos del usuario:';
            }
        }
        $html = str_replace('{mensaje}', $mensaje, $html);
        print $html;
    }

}

?>
