<?php
define( 'BLOCK_LOAD', true );
define("CARPETAPROYECTO",'/petronas');
require_once( $_SERVER['DOCUMENT_ROOT'] .CARPETAPROYECTO.'/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] .CARPETAPROYECTO.'/wp-includes/wp-db.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] .CARPETAPROYECTO.'/wp-settings.php' );


class Bd
    
    {

    public function __construct()
    {
        
            
    }


    /**
    * $table Nombre de la tabla
    * $datos Array con valores y datos array('key'=>$value)
    * $format Formato de los valores a insertar array('%s','%s')
    **/

    public function insertar($table, $datos, $formato){
         global $wpdb; 
         $retorno = -1;
         $result = $wpdb->insert($table, $datos, $formato);
         if ($result > 0){
            $retorno = $wpdb->insert_id;   
         }
         return $retorno;
         
    }

    /**
    * $table Nombre de la tabla
    * $datos Array con valores y datos array('key'=>$value)
    * $where array llave primaria array('pk'=> $value)
    * $formato Formato de los valores a insertar array('%s','%s')
    * $whereformat Formato de los valores a insertar array('%s','%s')
    **/

    public function actualizar($table, $datos, $where, $formato,  $whereformat){
          global $wpdb;           
          return $wpdb->update( $table, $datos, $where, $formato , $whereformat);         
    }

    /**
    * $sql Sentencia Sql para consultar
    **/

    public function consultar($sql)
    {       
         global $wpdb; 
         $wpdb->show_errors();
         $result = $wpdb->get_results($sql);
         $wpdb->hide_errors();
         return $result;
    } 

    /**
    * $sql Sentencia Sql para eliminar
    **/
    public function eliminar ($sql) {    
        global $wpdb;     
        return $wpdb->query($wpdb->prepare($sql));
    }


}
?>