<?php   
class Viaje{
  
    //Declaro variables
    private $codigoVuelo;
    private $destino;
    private $cantPasajeros;
    private $coleccion_pasajeros= [];

    //Clase constructora con valores
    public function __construct($codigo, $desti, $capacidad ){
        $this->codigoVuelo = $codigo;
        $this->destino = $desti;
        $this->cantPasajeros = $capacidad;
       
    }

    //Declaro setters y getters genéricos
    public function getCodigoVuelo(){
        return $this->codigoVuelo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantidadPasajeros(){
        return $this->cantPasajeros;
    }    
    public function getColeccionPasajeros(){
        return $this->coleccion_pasajeros;
    }
    public function setCodigoVuelo($nuevoCodigo){
         $this->codigoVuelo = $nuevoCodigo;
    }
    public function setDestino($nuevoDestino){
          $this->destino = $nuevoDestino;
    } 
    public function setCantidadPasajeros($nuevaCantidad){
         $this->cantPasajeros = $nuevaCantidad;
    }   
    public function setPasajero($pasajero){
        $this->coleccion_pasajeros[count($this->coleccion_pasajeros)] = $pasajero;
    }


    //A la hora de agregar un pasajero, uso la siguiente función para que me de el formato
    //correcto al agregar cada pasajero al arreglo de colección:
    public function populatePasajeros($nombre, $apellido, $dni) {  
        $pasajero=array(
           
             'nombre'=> $nombre,
             'apellido'=> $apellido,
             'dni'=> $dni
        );
        $this->setPasajero($pasajero);
    } 

    //La siguiente función corresponde a la opción 4 del menú:
    function modificarPasajero($DNIPasajero){
        //Primero checkeo que haya algún pasajero que editar.
        if(count($this->coleccion_pasajeros)>0){
        
            //Creo una variable auxiliar, que se actualizará si encuentra el DNI del pasajero:
        $aux = "none";
        $arregloSalida = $this->coleccion_pasajeros;
        foreach ($arregloSalida as $key => $subArr)
        {
            //Si encuentra que un DNI de un subarray corresponde con el DNI que le pasé...
            if ($subArr["dni"] == $DNIPasajero)
            {
                //...guarda la llave en el auxiliar, y remueve la entrada.
            $aux = $key;
            unset($arregloSalida[$key]);
            }
        }
            //Caso contrario, informará que no existe tal pasajero y sale de la función.
        if ($aux == "none"){
            echo "Ese pasajero no existe.\n";
            return;
        }

            //Una vez encontrado el pasajero, reingresamos los datos.
        $nombrePasajero = readline("Ingrese Nombre del Pasajero: ");
        $apellidoPasajero = readline("Ingrese Apellido del pasajero: ");
        $dniPasajero= readline("Ingrese Dni del pasajero: ");
        $pasajero=array(
           
            'nombre'=> $nombrePasajero,
            'apellido'=> $apellidoPasajero,
            'dni'=> $dniPasajero
       );
        $this->coleccion_pasajeros[$aux] = $pasajero;
    }else{
            //Y si no había pasajeros, nos lo informa.
        echo "No cargaste ningun pasajero en el viaje.\n";
    }
   }

   //Para mantener más limpio el __toString, armé una función que concatena cada pasajero con sus datos.
   public function datosPasajeros(){
    $aux = "";
    $i=1;
    $arregloSalida = $this->coleccion_pasajeros;
    foreach ($arregloSalida as $key => $subArr)
    {
        $aux = $aux.$i.":\nNombre: ".$subArr["nombre"]."\nApellido: ".$subArr["apellido"]."\nDNI: ".$subArr["dni"].".\n";
        $i++;
    }
    return $aux;
   }

        //La función anterior irá concatenada al final de los datos del vuelo, detallando los pasajeros.

   public function __toString()
   {
       return "Los datos del viaje son: \nCódigo: ".$this->getCodigoVuelo().", Destino: ".$this->getDestino().", Cantidad máxima de pasajeros: ".$this->getCantidadPasajeros().".\n".$this->datosPasajeros();
   }

}

?> 
