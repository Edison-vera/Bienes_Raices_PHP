<?php

namespace App;

class ActiveRecord{
     //Base datos 

     protected static $db;
     protected static $columnasDB = [];
     protected static $tabla = "";
     //Errores de la validacion de datos 
 
     protected static $errores=[];
 
    
 
     //Definir la conexion a la base de datos 
     public static function setDB($database){
         self::$db=$database;
     }
 
     
     
     public function guardar(){
         if(!is_null($this->id)){
             //Actualizar
             $this->actualizar();
         }else{
             //Crear nuevo registro
             $this->crear();
         }
     }
 
 
 
     public function crear(){
         
         //Sanitizar los datos 
         $atributos = $this->sanitizarAtributos();
         
 
         //Insertar en la base de datos 
         $query = " INSERT INTO ". static::$tabla . " ( ";
         $query.= join(', ', array_keys($atributos));
         $query.= " ) VALUES (' ";
         $query.=join("','", array_values($atributos));
         $query.=" ') ";
          
      
         $resultado = self::$db->query($query);
 
         //Mensaje de exito o errores
     if ($resultado){
        
         //Redireccionar al usuario
         header("location: ../?resultado=1"); 
    
         }
     }
 
     public function actualizar(){
        //Sanitizar los datos 
        $atributos = $this->sanitizarAtributos();
 
        $valores =[];
        foreach($atributos as $key =>$value){
            $valores[]= "{$key}='{$value}'";
        }
        $query="UPDATE ". static::$tabla. " SET ";
        $query.= join(', ', $valores);
        $query.= "WHERE id= '" . self::$db->escape_string($this->id) . "' ";
        $query.= "LIMIT 1";
       
        $resultado =self::$db->query($query);
 
     
        if ($resultado){
         
         //Redireccionar al usuario
        header("location: ../?resultado=2"); 
     
     }
        
     }
 
     //Eliminar un registro 
     public function eliminar(){
 
         //Eliminar la registro de la bade de datos 
         $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id). " LIMIT 1";
         $resultado = self::$db->query($query);
 
         if($resultado){
             $this->borrarImagen();
             header("location: ../admin?resultado=3");
         }
     }
 
 
 
     //Identificar y unir los atributos de la BD
     public function atributos(){
         $atributos=[];
         foreach (self::$columnasDB as $columna){
              if($columna === 'id') continue;
             $atributos[$columna] = $this->$columna;
         }
         return $atributos;
     }
 
     public function sanitizarAtributos(){
         $atributos = $this->atributos();
         $sanitizado =[];
     
         foreach($atributos as $key => $value){
             $sanitizado[$key] = self::$db->escape_string($value);
         }
         return $sanitizado;
         
     }
 
     //Subida de archivos 
     public function setImagen($imagen){
         //Elimina la imagen previda
         if(!is_null($this->id)){
             $this->borrarImagen();
            
         }
 
         //Asignar al atributo el nombre de la imagen
         if ($imagen)
             $this->imagen = $imagen;
 
     }
 
     //Eliminar archivo
     public function borrarImagen(){
      //Comprobar si existe el archivo
      $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
      if($existeArchivo){
          unlink(CARPETA_IMAGENES . $this->imagen);
      }
     }
      
     //Validacion de datos 
     public static function getErrores(){
         return self::$errores;
     }
     
     public function validar(){
         if(!$this->titulo){
             self::$errores[]= "Debes añadir un titulo";
         }
         
          if(!$this->precio){
              self::$errores[]= "Debes añadir un precio";
          }
         
          if(strlen($this->descripcion) < 50){
              self::$errores[]= "Debes añadir una descripcion y debe tener al menos 50 caracteres";
          }
         
          if(!$this->habitaciones){
              self::$errores[]= "Debes añadir el numero de habitaciones";
          }
          if(!$this->wc){
              self::$errores[]= "Debes añadir el numero de baños";
          }
          if(!$this->estacionamiento){
              self::$errores[]= "Debes añadir el numero de estacionamientos";
          }
          if(!$this->vendedorId){
              self::$errores[]= "Debes añadir el vendedor";
          }
         
          if (!$this->imagen){
              self::$errores[] = "La imagen es obligatoria";
          }
         
        
 
         return self::$errores;
     }
 
     //Lista todos los registros de la base de datos
     public static function all(){
         $query = "SELECT * FROM ". static::$tabla;

         $resultado= self::consultarSql($query);
 
         return $resultado;
         
     }
     
     //Buscar un registro por su id en la base de datos 
     public static function find($id){
         $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
 
         $resultado = self::consultarSql($query);
         return array_shift($resultado);
     }   
 
     public static function consultarSql($query){
     //Consultar la base de datos
     $resultado = self::$db->query($query);
 
     //Iterar los resultados
     $array =[];
     while($registro = $resultado->fetch_assoc()){
         $array[] = self::crearObjeto($registro);
 
     }
     
     //Liberar memoria
     $resultado->free();
 
     //Retornar los resultados
     return $array;
 
     }
 
     protected static function crearObjeto($registro){
     $objeto = new static;
 
     foreach($registro as $key => $value){
         
         if(property_exists($objeto, $key)){
             $objeto->$key = $value;
         }
     }
     return $objeto;
     }
 
     //Sincroniza el objecto en memoria con los cambios realizados por el usuario 
     public function sincronizar($args=[]){
     foreach($args as $key => $value){
         if (property_exists($this, $key) && !is_null($value)){
             $this->$key = $value;
         }
     }
     }
}