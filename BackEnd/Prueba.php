
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


class DoublyLinkedList {
    public $head = null;
    public $tail = null;

    public function push($data) {
        $node = new Node($data);
        if($this->head === null) {
            $this->head = $node;
            $this->tail = $node;
            return;
        }

        $this->tail->setNext($node);
        $node->setPrevious($this->tail);
        $this->tail = $node;
    }

    public function getHead() {
        return $this->head;
    }

    public function getTail() {
        return $this->tail;
    }

    public function showList() {
        $current = $this->head ;
        while($current->next != null){
            //echo $current->data[0]." ".$current->data[1]; 
            echo "<b>Habitación # </b>".$current->data['ID_HABITACION']."<b> Amoblado: </b>".$current->data['AMOBLADO']."<b> Precio: </b>".$current->data['PRECIO']."<b> VIP: </b>".$current->data['VIP']."<br><br>";
            $current = $current->next;
        }
        //echo $current->data[0]." ".$current->data[1]; 
        echo "<b>Habitación # </b>".$current->data['ID_HABITACION']."<b> Amoblado: </b>".$current->data['AMOBLADO']."<b> Precio: </b>".$current->data['PRECIO']."<b> VIP: </b>".$current->data['VIP']."<br><br>";
    }
}

class Node {
    public $prev;
    public $next;
    public $data;

    public function __construct($data) {
        $this->data = $data;
        
    }

    public function setPrevious(Node $node) {
        $this->prev = $node;
    }

    public function setNext(Node $node) {
        $this->next = $node;
    }

    public function setData($data) {
        $this->data = $data;
    }

}
 
function concatenateLists(DoublyLinkedList $VIPlist, DoublyLinkedList $NPlist) {
    $list = new DoublyLinkedList();
    $tailVIP = $VIPlist->getTail();
    $tailNP = $NPlist->getTail();
    $headNP = $NPlist->getHead();
    $headVIP = $VIPlist->getHead();
    $tailVIP->setNext($headNP);
    $headNP->setPrevious($tailVIP);
    $list->tail = $tailNP;
    $list->head = $headVIP; 
    $list->showList();
}
$VIPlist = new DoublyLinkedList();
$NPlist = new DoublyLinkedList();

$tiempo_inicial = microtime(true);

$consulta = "SELECT ID_HABITACION, AMOBLADO ,PRECIO, VIP FROM HABITACION WHERE VIP = 0";
$consulta2 = "SELECT ID_HABITACION, AMOBLADO ,PRECIO, VIP FROM HABITACION WHERE VIP = 1";



if ($resultado = mysqli_query($conn, $consulta)) {

    while ($fila = mysqli_fetch_array($resultado)) {
        //$toNode = [$fila['ID_USUARIO'] ,$fila['NOMBRE']];
        $fila['VIP'] = 'No';
        $NPlist->push($fila);
    }
    mysqli_free_result($resultado);
}

if ($resultado = mysqli_query($conn, $consulta2)) {

    while ($fila = mysqli_fetch_array($resultado)) {
        $fila['VIP'] = 'Sí';
        $VIPlist->push($fila);
    }
    mysqli_free_result($resultado);
}

echo "<b><h2>Habitaciones: </h2></b><br>";
concatenateLists($VIPlist, $NPlist);

for ($i = 0; $i <=100000000; $i++){
    $vivienda = rand( 1 , 1000);
    $area = rand(10, 500);
    $precio =  rand(100000, 5000000);
    $otro = 'otro';
    $vip = 1;
    $query = array($vivienda, $area, $precio, $otro, $vip);
    $VIPlist->push($query) ;
}

$tiempo_final = microtime(true);
$tiempo_total = $tiempo_final - $tiempo_inicial;
echo $tiempo_total.'<br>';
mysqli_close($conn);
$tiempo_inicial = microtime(true);
$VIPlist->push(array());
$tiempo_final = microtime(true);
$tiempo_total = $tiempo_final - $tiempo_inicial;
echo $tiempo_total;

 ?>
