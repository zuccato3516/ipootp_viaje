<?php   
class ViajeTerrestre extends Viaje {

    private $tipoAsiento;
    
public function __construct($codigo, $desti, $cantidad,$capacidadMax,$colPasajeros,$esResponsable,$esImporte, $esTramos,$tipoAsiento)
{
    parent:: __construct($codigo, $desti, $cantidad, $capacidadMax,$colPasajeros,$esResponsable,$esImporte, $esTramos);
    $this->tipoAsiento = $tipoAsiento;
} 

public function getTipoAsiento(){
    return $this->tipoAsiento;
}

//sets de los atributos
public function setTipoAsiento($nuevoTipoAsiento){
    $this->tipoAsiento = $nuevoTipoAsiento;
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
public function modificarTipoAsientos($codigo){
    $this->setTipoAsiento($codigo);
}

public function  venderPasaje($pasajero){
    $importePasaje= 0;

    parent::agregarPasajeroAcoleccion($pasajero);

    $cantPasajeros= parent::getCantidadPasajeros(); 
    $nuevaCantidad= $cantPasajeros-1;
    parent:: setCantidadPasajeros($nuevaCantidad);

    $valorOriginal=parent::getImporte();

    if ($this->getTipoAsiento() =="Cama" && $this->getCantEscalas() == 0) {
        $importePasaje = $valorOriginal * 1.25;
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
    $cadena.="\nEl tipo de asiento es: ".$this->getTipoAsiento()."\n";
    return $cadena;
}}