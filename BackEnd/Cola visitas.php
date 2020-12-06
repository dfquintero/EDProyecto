 <?php 
include('cn.php');

class Queue {
    public $head = null;
    public $tail = null;
    public function enqueue($data) {
        $node = new Node($data);
        if($this->tail === null) {
            $this->head = $node;
            $this->tail = $this->head;

            return;
        }
        $this->tail->next = $node;
        $node->next = null;
        $this->tail = $node;
    }

    public function dequeue(){
        if ($this->head === null){
            return;
        } 
            $curr = $this->head->data;
            $this->head = $this->head->next;
            return $curr;
    }

    public function getHead() {
        return $this->head;
    }

    public function getTail() {
        return $this->tail;
    }
}


class Node {
    public $next;
    public $data;
    public function __construct($data) {
        $this->data = $data;    
    }
}
$visitsQueue = new Queue();


$consulta = "SELECT ID_VISITA, ID_HABITACION, ID_ESTUDIANTE, FECHA FROM VISITA WHERE ID_HABITACION = 932 ORDER BY FECHA ASC;";

if ($resultado = mysqli_query($conn, $consulta)) {

    while ($fila = mysqli_fetch_array($resultado)) {
        $visitsQueue->enqueue($fila);
        //echo $fila['ID_VISITAS'];
    }
    mysqli_free_result($resultado);
}
mysqli_close($conn);

echo "<h1> Visitas de la habitación 510 </h1><br>";
while ($visitsQueue->head != null) {
    $arr =  $visitsQueue->dequeue();
    echo "<b>Visita #</b>".$arr['ID_VISITA']." "." <b>Habitación: </b>".$arr['ID_HABITACION']." <b>ID de Estudiante: </b>".$arr['ID_ESTUDIANTE']."<b> Fecha: </b>".$arr['FECHA']."<br><br>";
}
/*
$tiempo_inicial = microtime(true);

for ($i = 0; $i <=10000; $i++){
    $vivienda = rand( 1 , 1000);
    $area = rand(10, 500);
    $precio =  rand(100000, 5000000);
    $otro = 'otro';
    $vip = 1;
    $query = array($vivienda, $area, $precio, $otro, $vip);
    $visitsQueue->enqueue($query) ;
}
$tiempo_final = microtime(true);
$tiempo_total = $tiempo_final - $tiempo_inicial;
echo $tiempo_total;
*/
?>