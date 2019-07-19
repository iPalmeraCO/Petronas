<?php
require_once('bd.php');

class Functionsubicate
{
    
    public $id;
    public $id_artista;
    public $id_cat;    

    /**
    *
    *site string tipo de Tabla
    *tipo int 1 si el mapa es general 2 si el mapa es entrega tu carneta
    *
    **/
    public function __construct($tipo){
        $st = "localizacion";
        if ($tipo == 2){
            $st = "tucarnet"; 
        }      
        // $this->table =$st.$site;
        $this->table =$st;
    }

    public function nombredelpais($pais){
        $nombrepais = '';
        if ($pais == 1){
            $nombrepais = 'Costa Rica';
        }else if ($pais == 2) {
            $nombrepais = 'El Salvador';
        }else if ($pais == 3) {
            $nombrepais = 'Guatemala';
        }else if ($pais == 4) {
            $nombrepais = 'Honduras';
        }else{
            $nombrepais = 'Nicaragua';
        }
        return $nombrepais;
    }

    public function consultar_categorias($pais){
        $bd = new Bd();
        $f = new functionsubicate($tipo);       
        $paisnombre = $f->nombredelpais($pais);
        $sql = "SELECT DISTINCT(categoria) FROM ".$this->table."  where pais='".$paisnombre."'";
        return  $bd->consultar ($sql);
    }

    public function consultar_departamentos($categoria, $pais){
        $bd = new Bd();
        $f = new functionsubicate($tipo);       
        $paisnombre = $f->nombredelpais($pais);
        // $sql = "SELECT DISTINCT(departamento) FROM ".$this->table."  where categoria='".$categoria."' and pais ='".$paisnombre."'";
        $sql = "SELECT DISTINCT(departamento) FROM ".$this->table."  where  pais ='".$paisnombre."'";
        return  $bd->consultar ($sql);
    }  

    public function consultar_municipios($categoria, $departamento, $pais){
        $bd = new Bd();
        $f = new functionsubicate($tipo);       
        $paisnombre = $f->nombredelpais($pais);
        // $sql = "SELECT DISTINCT(municipio) FROM ".$this->table."  where categoria='".$categoria."' and departamento ='".$departamento."' and pais ='".$paisnombre."'";
        $sql = "SELECT DISTINCT(municipio) FROM ".$this->table."  where departamento ='".$departamento."' and pais ='".$paisnombre."'";        
        return  $bd->consultar ($sql);
    }  
    public function get_mapa($categoria, $departamento, $municipio){
        $bd = new Bd();
        $sql = "SELECT * FROM ".$this->table."  where categoria='".$categoria."' and departamento ='".$departamento."' and municipio='".$municipio."'"; 
        return  $bd->consultar ($sql);
    }
    public function get_mapafull(){
        $bd = new Bd();
        $sql = "SELECT * FROM ".$this->table; 
        return  $bd->consultar ($sql);
    }





}
?>