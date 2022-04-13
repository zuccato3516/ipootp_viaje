
<?php 
//ENTREGA N° 1: VIAJE
//ALUMNOS: TRAVNIK ARMITANO, VALERIA AYLIN, FI3522
//         ZUCCATO, STEFANO, FI3517
//Incluyo el archivo que contiene la clase Viaje y declaro las variables a usar en el menú.

include 'Viaje.php'; 

$viaje = null;
$opcion = 1;

    //A continuación, el menú desde el cual eligiremos cada opción, implementada con switch.
    //En cada caso que corresponda, no te permite utilizar la opción si no se cargó un vuelo.
while($opcion != 0){
    $menu = "\033[1mMenú de opciones:\033[0m";
    echo "\033[4m$menu\033[0m";
    echo "
    \n
    0-Salir
    1-Cargar informacion de un viaje  
    2-Cargar un pasajero
    3-Modificar informacion viaje
    4-Modificar Pasajero
    5-Visualizar informacion del viaje
    \n";
    $opcion = readline();
    switch($opcion){
        case 0 : echo "Saliendo del menú.\n"; break;
        case 1 : $viaje = crearViaje();break;
        case 2 :  if ($viaje !== null) {agregarPasajero($viaje);} else {echo "No se cargó un viaje.\n";};break;
        case 3 : if ($viaje !== null) {modificarVuelo($viaje);} else {echo "No se cargó un viaje.\n";};break;
        case 4 : if ($viaje !== null) {$DNIPasajero = readline("Ingrese el DNI del pasajero a modificar: ");
            $viaje->modificarPasajero($DNIPasajero);break;} else {echo "No se cargó un viaje.\n";};break;
            
        case 5: if ($viaje !== null) {echo $viaje;} else {echo "No se cargó un viaje.\n";};break;
    }
}

    //Con crearViaje(), tomo los datos y creo un objeto Viaje.
function crearViaje(){
    $pasajeros = [];
    $codigo= readline("Ingrese el codigo de vuelo: ");
    $destino = readline("Ingrese el destino: ");
    $capacidad = readline("Ingrese la capacidad del vuelo: ");
    $nuevoViaje = new Viaje($codigo, $destino, $capacidad, $pasajeros);
    echo "Se creo correctamente un nuevo viaje. \n";
    return $nuevoViaje;
  }

  function agregarPasajero($nuevoViaje){
    $nuevoViaje;
    if (count($nuevoViaje->getColeccionPasajeros())+1<=$nuevoViaje->getCantidadPasajeros()){
   $nombrePasajero = readline("Ingrese Nombre del Pasajero: ");
   $apellidoPasajero = readline("Ingrese Apellido del pasajero: ");
   $dniPasajero= readline("Ingrese Dni del pasajero: ");
    return $nuevoViaje->populatePasajeros($nombrePasajero, $apellidoPasajero, $dniPasajero);
} else {
    echo "El vuelo está lleno.\n";
}

    //La siguiente opción abre un submenú para modificar los datos ingresados anteriormente sobre el vuelo:
function modificarVuelo($viaje){
    $opcion = 1;
    while($opcion != 0){
        $menu = "\033[1mMenú de opciones:\033[0m";
        echo "    \033[4m$menu\033[0m";
        echo "
        \n
        0-Salir 
        1-Modificar Codigo de vuelo 
        2-Modificar Destino
        3-Modificar Cantidad Pasajeros
        \n";
        $opcion = readline();
        echo "\n";
        switch($opcion){
            case 0 : echo "Saliendo del menú.\n"; break;
            case 1 : $cambiarCodigo = readline("Ingrese el nuevo codigo de vuelo: ");
                     $viaje->setCodigoVuelo($cambiarCodigo); break;
            case 2 : $cambiarDestino = readline("Ingrese el nuevo destino de vuelo: ");
                     $viaje->setDestino($cambiarDestino); break;
            case 3 :  $cambiarCantidad = readline("Ingrese la nueva cantidad maxima de pasajeros: ");
                     $viaje->setCantidadPasajeros($cambiarCantidad); break;
                    }
    }                
}


}
       
?>       
