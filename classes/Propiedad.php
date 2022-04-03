<?php


namespace App;

class Propiedad {
     
    //Base datos 

    protected static $db;
    protected static $columnasDB = ['id','titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    //Errores de la validacion de datos 

    protected static $errores=[];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    //Definir la conexion a la base de datos 
    public static function setDB($database){
        self::$db=$database;
    }

    public function __construct($args=[])
    {
        $this->id= $args["id"] ?? "";
        $this->titulo= $args["titulo"] ?? "";
        $this->precio= $args["precio"] ?? "";
        $this->imagen= $args["imagen"] ?? "imagen.jpg";
        $this->descripcion= $args["descripcion"] ?? "";
        $this->habitaciones= $args["habitaciones"] ?? "";
        $this->wc= $args["wc"] ?? "";
        $this->estacionamiento= $args["estacionamiento"] ?? "";
        $this->creado= date("y/m/d");
        $this->vendedorId= $args["vendedorId"] ?? "";
    }
    
    public function guardar(){
        
        //Sanitizar los datos 
        $atributos = $this->sanitizarAtributos();
        

        //Insertar en la base de datos 
        $query = " INSERT INTO propiedades( ";
        $query.= join(', ', array_keys($atributos));
        $query.= " ) VALUES (' ";
        $query.=join("','", array_values($atributos));
        $query.=" ') ";
         
     
        $resultado = self::$db->query($query);
        debugear($resultado);
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
        
        // if (!$this->imagen["name"] || $this->imagen["error"] ){
        //     self::$errores[] = "La imagen es obligatoria";
        // }
        
        // // Validar por tamaño (100 kb maximo)
        // $medida = 1000 * 1000;
        
        // if ($this->imagen["size"] > $this->medida){
        //     self::$errores [] = "La imagen es muy pesada";
        // }

        return self::$errores;
    }

}