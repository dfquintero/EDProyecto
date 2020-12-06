<?php 
include('cn.php');
class DoublyLinkedList {
    public $head = null;
    public $tail = null;

    public function push($data, $id) {
        $node = new Node($data, $id);
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

    public function returnNodes(){
        $curr = $this->head;
        $arr = array();
        while ($curr != null){
            if(in_array($curr->id, $arr)){
                $curr = $curr->next;
            }
            else{
                $arr[] = $curr->id;
                
            }

        }
        return $arr;
    }
}

class Node {
    public $prev;
    public $next;
    public $data;
    public $id;

    public function __construct($data, $id) {
        $this->data = $data;
        $this->id = $id;
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

class HashTable{

    public $array;
    public $colisiones = 0;
    public $normales = 0;

    public function __construct(){
        $this->array = array();
    }

    public function insert($data, $id){

        $hashValue = hash("md4", $data);
        if (array_key_exists($hashValue,$this->array)){
            $this->array[$hashValue]->push($data, $id);
            $this->colisiones += 1;
        }
        else{
            $lista = new  DoublyLinkedList();
            $this->array[$hashValue] = $lista;  
            $this->array[$hashValue]->push($data, $id);
            $this->normales += 1;

        } 
    }

    public function search($data){
        $hashValue = hash("md4", $data);
        if (array_key_exists($hashValue,$this->array)){
            return $this->array[$hashValue]->returnNodes();
        }
    }
}

$consulta = "SELECT * from habitacion where id_casa in (select id_casa from vivienda where ID_ARRENDADOR = 1);";
$hashTable = new HashTable();
$arrayI = array();
if ($resultado = mysqli_query($conn, $consulta)) {
    while ($fila = mysqli_fetch_array($resultado)) {
        $arrayI[$fila['ID_HABITACION']] = $fila;
    }
    mysqli_free_result($resultado);
}
mysqli_close($conn);

foreach($arrayI as &$val){
    $arr = explode(" ", $val['AMOBLADO']);
    foreach($arr as &$valor){
        $ult = substr($valor, -1);
        if ($ult == "," || $ult == "." || $ult == ";"){
            $hashTable->insert(substr($valor, -1), $val['ID_HABITACION']);
        } 
        else{
            $hashTable->insert($valor, $val['ID_HABITACION']);
        }
        
    } 
}

$arrR = $hashTable->search('Duis');
foreach($arrR as &$value){
    $arrF = $arrayI[$value];
    echo "ID HABITACION: ". $arrF['ID_HABITACION']." "."AMOBLADO: ". $arrF['AMOBLADO']." "."PRECIO: ". $arrF['PRECIO'].'<br>';
}
/*
function getRandomWord($len = 2) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}


for ($i = 0; $i <= 10000000; $i++){
    $hashTable->insert(getRandomWord());
}
$inicio = microtime(true);

$arr = $hashTable->search(getRandomWord());

foreach($arr as &$valor){
    echo $valor."<br>";
}

$final = microtime(true);
$total = $final - $inicio;
echo $total;
*/
//

?> 