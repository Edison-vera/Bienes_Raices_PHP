<?php


namespace App;

class Propiedad {
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

    public function __construct()
    {
        $this->id= $args["id"] ?? "";
        $this->id= $args["titulo"] ?? "";
        $this->id= $args["precio"] ?? "";
        $this->id= $args["imagen"] ?? "";
        $this->id= $args["descripcion"] ?? "";
        $this->id= $args["habitaciones"] ?? "";
        $this->id= $args["wc"] ?? "";
        $this->id= $args["estacionamiento"] ?? "";
        $this->id= $args["creado"] ?? "";
        $this->id= $args["vendedorId"] ?? "";
    }
}