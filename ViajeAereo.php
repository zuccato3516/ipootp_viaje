<?php   
class ViajeAereo extends Viaje {

    private $catAsiento;
    private $nombreAerolinea;
    private $cantEscalas;
    
public function __construct($codigo, $desti, $cantidad,$capacidadMax,$colPasajeros,$esResponsable,$esImporte, $esTramos,$esCatAsiento,$esNombreAerolinea,$esCantEscalas)
{
    parent:: __construct($codigo, $desti, $cantidad, $capacidadMax,$colPasajeros,$esResponsable,$esImporte, $esTramos);
    $this->catAsiento = $esCatAsiento;
    $this->nombreAerolinea = $esNombreAerolinea;
    $this->cantEscalas = $esCantEscalas;
} 

public function getCatAsiento(){
    return $this->catAsiento;
}
public function getNombreAerolinea(){
    return $this->nombreAerolinea;
}
public function getCantEscalas(){
    return $this->cantEscalas;
}

//sets de los atributos
public function setCatAsiento($nuevaCatAsiento){
    $this->catAsiento = $nuevaCatAsiento;
}
public function setNombreAerolinea($nuevoNombreAerolinea){
    $this->nombreAerolinea = $nuevoNombreAerolinea;
}
public function setCantEscalas($nuevaCantEscalas){
    $this->cantEscalas = $nuevaCantEscalas;
}


//Funcion modificar vuelo, Un menu, permite Modificar individualmente el Codigo de vuelo, destino y la cantidad maxima de pasajeros.
public function modificarImporte($codigo){
    $this->setImporte($codigo);
}
public function modificarCodigoDeVuelo($codigo){
    $this->setCodigoVuelo($codigo);
}
public function modificarDestinoDeVuelo($codigo){
    $this->setDestino($codigo);
}
public function modificarMaxPasajerosDeVuelo($codigo){
    $this->setCantidadMaxPasajeros($codigo);
}
public function modificarTramos($codigo){
    $this->setTramos($codigo);
}
public function modificarCatAsientos($codigo){
    $this->setCatAsientos($codigo);
}
public function modificarNombreAerolinea($codigo){
    $this->setNombreAerolinea($codigo);
}
public function modificarEscalas($codigo){
    $this->setCantEscalas($codigo);
}

public function  venderPasaje($pasajero){
    $importePasaje= 0;

    parent::agregarPasajeroAcoleccion($pasajero);

    $cantPasajeros= parent::getCantidadPasajeros(); 
    $nuevaCantidad= $cantPasajeros-1;
    parent:: setCantidadPasajeros($nuevaCantidad);

    $valorOriginal=parent::getImporte();

    if ($this->getCatAsiento() =="Primera Clase" && $this->getCantEscalas() == 0){
    $importePasaje = $valorOriginal * 1.4;
    }
    elseif($this->getCatAsiento() =="Primera Clase" && $this->getCantEscalas() >0){
    $importePasaje = $valorOriginal * 1.6;
    }
    else{
        $importePasaje = parent::getImporte();
    }
    if (parent:: getTramos() == "ida y vuelta"){
    $importePasaje = $importePasaje*2;
    }
     
    return $importePasaje;
}

    public function __toString() {
    $cadena= parent:: __toString();
    $cadena.="\nLa Categoria de Asiento es: ".$this->getCatAsiento().
    "\nEl Nombre de la aerolinea es: ".$this->getNombreAerolinea(). "\nLa Cantidad de Escalas es: ".$this->getCantEscalas()."\n\n";
    return $cadena;
}}