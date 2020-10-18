<?php
$servername = "localhost";
$database = "prueba";
$username = "jorodriguezal";
$password = "12345";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: <br>" . mysqli_connect_error());
}
echo "Connected successfully <br>";

class Stack
{
    protected $stack;
    
    public function __construct() {

        $this->stack = array();
    }

    public function push($item) {

        array_push($this->stack, $item);
    }

    public function pop() {
        if ($this->isEmpty()) {
	     return;
	  } else {
            return array_pop($this->stack);
        }
    }

    public function top() {
        return current($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }
}

$pila = new Stack();


$consulta = "SELECT ID_HABITACION, AMOBLADO ,PRECIO FROM HABITACION";
if ($resultado = mysqli_query($conn, $consulta)) {
    while ($fila = mysqli_fetch_array($resultado)) {
        if ($fila['AMOBLADO'] != 'No'){
            $pila->push($fila);
        }
    }
    mysqli_free_result($resultado);
}
echo "<h1>Habitaciones filtradas por Amoblado<br></h1>";
while (!($pila->isEmpty())){
    $current = $pila->pop();
    echo "<b>Habitación # </b>".$current['ID_HABITACION']."<b> Amoblado: </b>".$current['AMOBLADO']."<b> Precio: </b>".$current['PRECIO']."<br><br>";
}
mysqli_close($conn);

/*
$tiempo_inicial = microtime(true);

for ($i = 0; $i <=10000000; $i++){
    $vivienda = rand( 1 , 1000);
    $area = rand(10, 500);
    $precio =  rand(100000, 5000000);
    $otro = 'otro';
    $vip = 1;
    $query = array($vivienda, $area, $precio, $otro, $vip);
    $pila->push($query) ;
}
$tiempo_final = microtime(true);
$tiempo_total = $tiempo_final - $tiempo_inicial;
echo $tiempo_total."<br>";
$tiempo_inicial = microtime(true);
$pila->pop() ;
$tiempo_final = microtime(true);
$tiempo_total = $tiempo_final - $tiempo_inicial;
echo $tiempo_total."<br>";
$tiempo_inicial = microtime(true);
$pila->push($query) ;
$tiempo_final = microtime(true);
$tiempo_total = $tiempo_final - $tiempo_inicial;
echo $tiempo_total."<br>";
*/
?>