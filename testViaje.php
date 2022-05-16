<?php
include 'Viaje.php';
include 'ViajeAereo.php';
include 'ViajeTerrestre.php';
include 'pasajero.php';
include 'ResponsableV.php';

//DATOS PRE CARGADOS//
$responsable= new ResponsableV("Roberto", "Mendez", 41231, 65464);
$viaje= new ViajeAereo("12391410", "Amsterdam", 0,23, [] , $responsable,35000,42,"856784","Primera Clase","Air Canada",3);
$pasajero1= new Pasajero("Ana", "Suarez", 35439182, 4425643);
$viaje->agregarPasajeroAColeccion($pasajero1);
$pasajero2= new Pasajero("Carlos", "Mendez", 29543120, 4426453);
$viaje->agregarPasajeroAColeccion($pasajero2);
$pasajero3= new Pasajero("Maria", "Dominguez", 14856734, 4439676);
$viaje->agregarPasajeroAColeccion($pasajero3);
$pasajero4= new Pasajero("Alan", "Dominguez", 7412546, 4437453);
$resultado=$viaje->agregarPasajeroAColeccion($pasajero4);
//Funciones del menú

//La siguiente función toma el viaje y una opción como entrada, y llama a la función respectiva de la
//clase Viaje que modifica el valor deseado.
function cambiarViajeAereo($entrada,$opcion){
    switch($opcion){
        case 0: $codigoNuevo = readline("Ingrese el nuevo Importe: ");
            $entrada->modificarImporte($codigoNuevo);break;
        case 1: $codigoNuevo = readline("Ingrese el nuevo codigo de vuelo: ");
            $entrada->modificarCodigoDeVuelo($codigoNuevo);break;
        case 2: $codigoNuevo = readline("Ingrese el nuevo destino: ");
            $entrada->modificarDestinoDeVuelo($codigoNuevo);break;
        case 3: $codigoNuevo = readline("Ingrese el nuevo número máximo de pasajeros: ");
            $entrada->modificarMaxPasajerosDeVuelo($codigoNuevo);break;
        case 4: $codigoNuevo = readline("Ingrese el nuevo valor para tramos: ");
            $entrada->modificarTramos($codigoNuevo);break;
        case 5: $codigoNuevo = readline("Ingrese la nueva categoría de asientos: ");
            $entrada->modificarCatAsientos($codigoNuevo);break;
        case 6: $codigoNuevo = readline("Ingrese el nuevo nombre de aerolínea: ");
            $entrada->modificarNombreAerolinea($codigoNuevo);break;
        case 7: $codigoNuevo = readline("Ingrese la nueva cantidad de escalas: ");
            $entrada->modificarEscalas($codigoNuevo);break;
        case 8: break;
}


}
function cambiarViajeTerrestre($entrada, $opcion)
{
    switch ($opcion) {
        case 0: $codigoNuevo = readline("Ingrese el nuevo Importe: ");
            $entrada->modificarImporte($codigoNuevo);break;
        case 1: $codigoNuevo = readline("Ingrese el nuevo codigo de vuelo: ");
            $entrada->modificarCodigoDeVuelo($codigoNuevo);break;
        case 2: $codigoNuevo = readline("Ingrese el nuevo destino: ");
            $entrada->modificarDestinoDeVuelo($codigoNuevo);break;
        case 3: $codigoNuevo = readline("Ingrese el nuevo número máximo de pasajeros: ");
            $entrada->modificarMaxPasajerosDeVuelo($codigoNuevo);break;
        case 4: $codigoNuevo = readline("Ingrese el nuevo valor para tramos: ");
            $entrada->modificarTramos($codigoNuevo);break;
        case 5: $codigoNuevo = readline("Ingrese la nueva categoría de asientos: ");
            $entrada->modificarTipoAsientos($codigoNuevo);break;
        case 6: break;
    }
}
    //Menu principal
    function menu($opcion, $viaje)
    {
        while ($opcion != 0) {
            $menu = "\033[1mMenú de opciones:\033[0m";
            echo "\033[4m$menu\033[0m";
            echo "
    \n
    0-Cargar informacion de un viaje aéreo
    1-Cargar informacion de un viaje terrestre 
    2-Modificar información viaje aéreo
    3-Modificar información viaje terrestre
    4-Modificar Pasajero
    5-Agregar Informacion Responsable
    6-Modificar Informacion Responsable
    7-Visualizar informacion del viaje
    8-Vender pasaje
    \n";
            $opcion = readline();
            switch ($opcion) {
        case 0: $viaje = crearViajeAereo();menu(1, $viaje);

        // no break
        case 1: $viaje = crearViajeTerrestre();menu(1, $viaje);

        // no break
        case 2:  if ($viaje !== null) {
            $opcion = 1;
            while ($opcion != 0) {
                echo "
                    \n
                    0-Modificar Importe
                    1-Modificar Codigo de vuelo 
                    2-Modificar Destino
                    3-Modificar Cantidad Maxima Pasajeros
                    4-Modificar Tramos
                    5-Modificar Categoría Asientos
                    6-Modificar Nombre de Aerolínea
                    7-Modificar Cantidad de escalas
                    8-Salir
                    \n";
                cambiarViajeAereo($viaje, readline());
                $opcion = 0;
            };
            menu(1, $viaje);
        }

        // no break
        case 3: if ($viaje !== null) {
            $opcion = 1;
            while ($opcion != 0) {
                echo "
                    \n
                    0-Modificar Importe
                    1-Modificar Codigo de vuelo 
                    2-Modificar Destino
                    3-Modificar Cantidad Maxima Pasajeros
                    4-Modificar Tramos
                    5-Modificar Categoría Asientos
                    6-Salir
                    \n";
                cambiarViajeTerrestre($viaje, readline());
                $opcion = 0;
            };
            menu(1, $viaje);
        }

        // no break
        case 4: if ($viaje !== null) {
            $DNIPasajero = readline("Ingrese el DNI del pasajero a modificar: ");
            $existe = $viaje->encontrarPasajero($DNIPasajero);

            if ($existe < 0) {
                echo "ERROR No se encontro pasajero con ese DNI.\n";
            } else {
                cambiarPasajero($existe, $viaje);
            }
            break;
        } else {
            echo "No se cargó un viaje.\n";
        };break;

        case 5:  if ($viaje !== null) {
            agregarResponsableV($viaje);
        } else {
            echo "No se cargó un viaje.\n";
        };break;

        case 6:  if ($viaje !== null) {
            menuModificarResponsable($viaje);
        } else {
            echo "No se cargó un viaje.\n";
        };break;

        case 7: if ($viaje !== null) {
            echo $viaje;
        } else {
            echo "No se cargó un viaje.\n";
        };break;

        case 8: if ($viaje !== null) {
            if ($viaje->hayPasajesDisponible()) {
                $pasajero = ingresarPasajero();
                $x = $viaje->venderPasaje($pasajero);
                echo "El importe del pasaje es :".$x."\n";
            };
        } else {
            echo "No se cargó un viaje.\n";
        };break;
    }
        }
    }

    //Funcion Crear viaje, Crea un Objeto de la Clase viaje, con los datos entrados por el usuario
    function crearViajeAereo()
    {
        $responsable= "";
        $pasajeros = [];
        $codigo= readline("Ingrese el codigo de vuelo: ");
        $destino = readline("Ingrese el destino: ");
        $capacidadMax = readline("Ingrese la capacidad del vuelo: ");
        $importe = readline("Ingrese el importe: ");
        $tramos = readline("Ingrese los tramos: ");
        $catAsientos = readline("Ingrese la categoría de los asientos: ");
        $nombreAerolinea = readline("Ingrese el nombre de la Aerolínea: ");
        $cantEscalas = readline("Ingrese la cantidad de escalas: ");
        $nuevoViaje = new ViajeAereo($codigo, $destino, 0, $capacidadMax, $pasajeros, $responsable, $importe, $tramos, $catAsientos, $nombreAerolinea, $cantEscalas);
        var_dump($nuevoViaje);
        echo "Se creo correctamente un nuevo viaje.\n ";
        return $nuevoViaje;
    }

    function crearViajeTerrestre()
    {
        $responsable= "";
        $pasajeros = [];
        $codigo= readline("Ingrese el codigo de viaje: ");
        $destino = readline("Ingrese el destino: ");
        $capacidadMax = readline("Ingrese la capacidad del viaje: ");
        $importe = readline("Ingrese el importe: ");
        $tramos = readline("Ingrese los tramos: ");
        $catAsientos = readline("Ingrese el tipo de los asientos: ");
        $nuevoViaje = new ViajeTerrestre($codigo, $destino, 0, $capacidadMax, $pasajeros, $responsable, $importe, $tramos, $catAsientos);
        $nuevoViaje = new ViajeTerrestre($codigo, $destino, 0, $capacidadMax, $pasajeros, $responsable, $importe, $tramos, $tramos);
        echo "Se creo correctamente un nuevo viaje.\n ";
        var_dump($nuevoViaje);
        return $nuevoViaje;
    }

    function ingresarPasajero()
    {
        $nombrePasajero = readline("Ingrese Nombre del Pasajero: ");
        $apellidoPasajero = readline("Ingrese Apellido del pasajero: ");
        $dniPasajero= readline("Ingrese Dni del pasajero: ");
        $telefonoPasajero=readline("Ingrese el telefono del pasajero:");
        $nuevoPasajero= new Pasajero($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero);
        return $nuevoPasajero;
    }

    function cambiarPasajero($esElPasajero, $viaje)
    {
        $op=-1;
        while ($op != 0) {
            $esCorrecto=false;
            echo
             "Ingrese que desea modificar del pasajero
              0- Salir
              1- Nombre del pasajero
              2- Apellido del pasajero
              3- Telefono\n";

            $op = readline();
            switch ($op) {
            case 1 :
                $datoIngresado=readline("Ingrese nuevo Nombre");//guardamos en $nombrePasajero el Nuevo nombre
                
              
                break;
            case 2 :
                $datoIngresado=readline("Ingrese nuevo Apellido");
              
                break;
            case 3 :
                $datoIngresado=readline("Ingrese nuevo telefono");
              
                break;
                
               
            default: echo"ERROR Opcion incorrecta. Ingrese 0-1-2-3.\n"; break; //solo permite que usuario ingrese opcion valida
           }
            $viaje->modificarPasajero($esElPasajero, $op, $datoIngresado);
        }
    }

    function menuModificarResponsable($viaje)
    {
        echo
                 "Ingrese que desea modificar del Responsable
                  0- Salir
                  1- Nombre del Responsable
                  2- Apellido del Responsable
                  3- Numero Licencia
                  4- Numero Empleado\n";

        $op = readline(); //lee que pone usuario
        switch ($op) {
                case 1 :
                    $datoIngresado=readline("Ingrese nuevo Nombre");//guardamos en $nombrePasajero el Nuevo nombre
                    $viaje->modificarResponsable($op, $datoIngresado);
                 
    break;
    case 2 :
                    $datoIngresado=readline("Ingrese nuevo Apellido");//guardamos en $nombrePasajero el Nuevo nombre
                    $viaje->modificarResponsable($op, $datoIngresado);

    break;
    case 3 :
                    $datoIngresado=readline("Ingrese nuevo Numero de Licencia");//guardamos en $nombrePasajero el Nuevo nombre
                    $viaje->modificarResponsable($op, $datoIngresado);

    break;
    case 4 :
                    $datoIngresado=readline("Ingrese nuevo Numero de Empleado");//guardamos en $nombrePasajero el Nuevo nombre
                    $viaje->modificarResponsable($op, $datoIngresado);

    break;
                    
                   
    default: echo"ERROR Opcion incorrecta. Ingrese 0-1-2-3-4.\n";
    break;

   
}
    }

    function agregarResponsableV($viaje)
    {
        $nombreResponsable = readline("Ingrese Nombre del Responsable: ");
        $apellidoResponsable = readline("Ingrese Apellido del Responsable: ");
        $numeroLicencia= readline("Ingrese numero de licencia del responsable: ");
        $numeroEmpleado=readline("Ingrese el numero de Empleado del responsable:");
        $nuevoResponsable= new ResponsableV($nombreResponsable, $apellidoResponsable, $numeroLicencia, $numeroEmpleado);
        $viaje->setResponsable($nuevoResponsable);
    }

    menu(1, $viaje);
