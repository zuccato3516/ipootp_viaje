<?php   
class Viaje{
  
  
    private $codigoViaje;
    private $destino;
    private $cantPasajeros;
    private $cantMaxPasajeros;
    private $coleccion_pasajeros= []; //es un arreglo de Objetos Pasajero
    private $responsable; //es un Objeto Responsable V
    private $importe;
    private $tramos;//ida y vuelta


    //Clase constructora con valores
    public function __construct($codigo, $desti, $cantidad, $cantidadMax,$colPasajeros,$esResponsable,$esImporte, $esTramos ){
        $this->codigoViaje = $codigo;
        $this->destino = $desti;
        $this->cantidad = $cantidad;
        $this->cantMaxPasajeros = $cantidadMax;
        $this->coleccion_pasajeros = $colPasajeros;
        $this->responsable=$esResponsable;
        $this->importe = $esImporte;
        $this->tramos=$esTramos;

       
    }
    //Get`s de los atributos
    public function getCodigoVuelo(){
        return $this->codigoViaje;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantidadPasajeros(){
        return $this->cantPasajeros;
    }    
    public function getCantidadMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }    
    public function getColeccionPasajeros(){
        return $this->coleccion_pasajeros;
    }
    public function getResponsable(){
        return $this->responsable;
    }
    public function getImporte(){
        return $this->importe;
    }
    public function getTramos(){
        return $this->tramos;
    }
    //Set`s de los atributos
    public function setCodigoVuelo($nuevoCodigo){
         $this->codigoViaje = $nuevoCodigo;
    }
    public function setDestino($nuevoDestino){
          $this->destino = $nuevoDestino;
    } 
    public function setCantidadPasajeros($nuevaCantidad){
         $this->cantPasajeros = $nuevaCantidad;
    }   
    public function setCantidadMaxPasajeros($nuevaCantidad){
        $this->cantMaxPasajeros = $nuevaCantidad;
   }   
    public function setColeccionPasajeros($nuevaColeccion){
        $this->coleccion_pasajeros = $nuevaColeccion;
   } 
     public function setResponsable($nuevoResponsable){
         $this->responsable= $nuevoResponsable;
     }
     public function setImporte($nuevoImporte){
        $this->importe = $nuevoImporte;
   }
   public function setTramo($nuevoTramo){
         $this->Tramo = $nuevoTramo;
   } 

   public function hayPasajesDisponible(){
    $hayPasajes=false;
   echo $A= count($this->getColeccionPasajeros());
   var_dump($this->getColeccionPasajeros());
        if  ($A <$this->getCantidadMaxPasajeros()){
        $hayPasajes=true;
    }
    return $hayPasajes;
}

   public function agregarPasajeroAColeccion($unPasajero){ //recibe por parametro el new pasajero creado en testViaje
   
    $array_pasajeros = $this->getColeccionPasajeros(); //Trae la coleccion de pasajeros
    $largo=count($array_pasajeros);   //cuenta el largo de la coleccion de pasajeros
    $i=0; 
    $encontro=false;
    $dniPasajero=$unPasajero->getDNI(); //selecciona SOLO el dni del pasajero
         if(is_numeric($dniPasajero)){ //confirme que DNI es un numero
             //Revisamos que no quiera ingresar un DNI que ya existe
            while($i<$largo && !$encontro){
                $pasajero = $array_pasajeros[$i];//vamos revisando pasajero por pasajero aumentando la posicion ($i)
                if($pasajero->getDNI()==$dniPasajero){ //comparo el DNI del pasajero nuevo (por parametro), con los existentes en el arreglo
                   $encontro=true; 
                }
                $i++;
            }
            if($encontro){
                echo "ERROR, DNI duplicado.\n";} //si ya esta, echo error
            else{    //si NO esta
                $coleccion=$this->getColeccionPasajeros(); //trae a la coleccion pasajeros
                array_push($coleccion,$unPasajero); //agregar el Pasajero
               $this->setColeccionPasajeros($coleccion);// Set la coleccion con el pasajero nuevo
               $this->setCantidadPasajeros($this->getCantidadPasajeros()+1);
            }
        }
  }

  public function encontrarPasajero($dni){
    $esElPasajero= -1;
    $posicion=-1;
    $i=0;
    $encontro=false;
    $array_pasajeros = $this->getColeccionPasajeros();
    $largo=count($array_pasajeros);
    while ($i<$largo && !$encontro) {  //mientras que $i sea Menor que Tamaño arreglo Y $encontro= false
    $pasajero = $array_pasajeros[$i]; //pasajero = EL OBJETO PASAJERO en posicion $i del array.

  if ($pasajero->getDNI()==$dni) { //SI el N de documento de $Pasajero es Igual a $dni que puso usuario

     $encontro=true;
      $posicion=$i; //guardamos la posicion!!! LA USAMOS DESPUES.
      $esElPasajero= $posicion;
      echo $esElPasajero;

  }
        $i++;//Si NO es igual, $i+1 y de nuevo el bucle
    }
    return $esElPasajero;
}



public function modificarPasajero($esElPasajero, $op, $datoIngresado) {
    $array_pasajeros = $this->getColeccionPasajeros();
    
    if ($op == 1) {
        $pasajero=$array_pasajeros[$esElPasajero]; //pasajero es el Objeto del array en $posicion ($i)
        $pasajero->setNombre($datoIngresado); //Usamos Set con el nuevo nombre
        $array_pasajeros[$esElPasajero] = $pasajero;//seteamos el nuevopasajero en el arreglo
        $this->setColeccionPasajeros($array_pasajeros);
    }
    elseif ($op= 2) {
       $pasajero=$array_pasajeros[$esElPasajero]; //pasajero es el Objeto del array en $posicion ($i)
       $pasajero->setApellido($datoIngresado); //Usamos Set con el nuevo nombre
       $array_pasajeros[$esElPasajero] = $pasajero;//seteamos el nuevopasajero en el arreglo
       $this->setColeccionPasajeros($array_pasajeros);
   }
    elseif ($op=3){
       $pasajero=$array_pasajeros[$esElPasajero]; //pasajero es el Objeto del array en $posicion ($i)
       $pasajero->setTelefono($datoIngresado); //Usamos Set con el nuevo nombre
       $array_pasajeros[$esElPasajero] = $pasajero;//seteamos el nuevopasajero en el arreglo
       $this->setColeccionPasajeros($array_pasajeros);
    }

}

public function modificarResponsable( $op, $datoIngresado){
    $responsable=$this->getResponsable();

    if ($op == 1){
        $responsable->setNombre($datoIngresado); //Usamos Set con el nuevo nombre
    }
    elseif ($op == 2) {
        $responsable->setApellido($datoIngresado);
    }
    elseif ( $op == 3){

        $responsable->setNumeroLicencia($datoIngresado);

    }
    elseif ($op ==4){
        $responsable->setNumeroEmpleado($datoIngresado);
    }
    $this->setResponsable($responsable);

}

public function imprimirPasajeros(){
 $listaPasajeros=$this->getColeccionPasajeros();
 $largo= count($listaPasajeros);
 for($i=0; $i<$largo; $i++){
   $pasajero=$listaPasajeros[$i];
   echo $pasajero;


 }


}





public function __toString()
   {
      $cadena="Los datos viaje son: \nCodigo: ".$this->getCodigoVuelo().",\n Destino: ".$this->getDestino().", \nCantidad maxima de Pasajeros: ".$this->getCantidadMaxPasajeros().
       "\nResponsable:".$this->getResponsable()."\nPasajeros: \n".$this->imprimirPasajeros()."\nImporte:\n".$this->getImporte().".";
       return $cadena;
   }

} 
