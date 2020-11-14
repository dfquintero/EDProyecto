<?php 
$servername = "localhost";
$database = "prueba";
$username = "jorodriguezal";
$password = "12345";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed{
         <br>" . mysqli_connect_error());
}
echo "Connected successfully <br>";

class Node{
        public $parent;
        public $left;
        public $right;
        public $data;
        public $precio;

    public function __construct ($data){

        $this->data = $data;
        $this->precio = $data['PRECIO'];

    }

    public function insert($data){
        if ($this->data != null)
        {
            if ($data['PRECIO'] < $this->precio)
            {
                if ($this->left === null) 
                {
                    $this->left = new Node($data);
                    $this->left->parent = $this; 
                }            
                else
                {
                    $this->left->insert($data);
                }
            }
            
            elseif ($data['PRECIO'] > $this->precio)
            {
                if ($this->right === null)
                {
                    $this->right = new Node($data);
                    $this->right->parent = $this;             
                }    
                else
                {
                    $this->right->insert($data);
                }
            }
        }
        else
        {
            $this->data = $data;
        }
    }

    public function findval($val)
    {
        if ($val < $this->precio)
        {
            if ($this->left === null || $this->left->precio < $val)
            {
                return $this;
            }
            return $this->left->findval($val);
        }
        elseif ($val > $this->precio )
        {
            if ($this->right === null || $this->right->precio > $val)
            {
                return $this->right;
            }
            return $this->right->findval($val);
        }
        else{
            return $this;
        }
    }

    public function nextNode($node)
    {
        $curr = $node;
        if ($curr->right != null)
        {
            $curr = $curr->right;
            while(true)
            {
                if ($curr->left === null)
                {
                    return $curr;
                }
                else
                {
                    $curr = $curr->left; 
                }
            }
        }
        elseif ($curr->parent != null)
        {
            while(true)
            {
                if ($curr->parent != null)
                {
                    if ($curr === $curr->parent->left)
                    {
                        return $curr->parent;
                    }
                    else
                    {
                        $curr = $curr->parent;
                    }
                }
                else
                {
                    return null;
                }
            }
        }
        else
        {
            return null;
        }
    }
    public function rangeSearch($min, $max)
    {
        $arr = array();
        $curr = $this->findval($min);
        while(true){

            array_push($arr, $curr->data);
            $curr = $this->nextNode($curr);

            if ($curr === null || $curr->data['PRECIO'] > $max)
            {
                return $arr;
            } 
        }
    }
    
/*
    public function PrintTree()
    {
        $table = $this->data;
        if ($this->left != null)
        {
            $this->left->PrintTree();
        }
        echo '<b></b>'.$this->precio.'<br>';
        if ($this->right)
        {
            $this->right->PrintTree();
        }
    }
    */
}


class Heap
{
    protected $heap;

    public function __construct() 
    {
        $this->heap  = array();
    }

    public function isEmpty() 
    {
        return empty($this->heap);
    }

    public function count() 
    {
        return count($this->heap) - 1;
    }

    public function extract() 
    {
        if ($this->isEmpty()) 
        {
            return;
        }

        $root = array_shift($this->heap);

        if (!$this->isEmpty()) 
        {
            $last = array_pop($this->heap);
            array_unshift($this->heap, $last);
            $this->adjust(0);
        }

        return $root;
    }

    public function compare($item1, $item2) 
    {
        if ($item1['PRIORIDAD'] === $item2['PRIORIDAD']) 
        {
            return 0;
        }
        return ($item1['PRIORIDAD'] > $item2['PRIORIDAD'] ? 1 : -1);
    }

    protected function isLeaf($node) 
    {
        return ((2 * $node) + 1) > $this->count();
    }

    protected function adjust($root) 
    {
        if (!$this->isLeaf($root)) 
        {
            $left  = (2 * $root) + 1; 
            $right = (2 * $root) + 2; 
            $h = $this->heap;
            if ((isset($h[$left]) && $this->compare($h[$root], $h[$left]) < 0) || (isset($h[$right]) && $this->compare($h[$root], $h[$right]) < 0)) 
            {
                if (isset($h[$left]) && isset($h[$right])) 
                {
                  $j = ($this->compare($h[$left], $h[$right]) >= 0) ? $left : $right;
                }
                else if (isset($h[$left])) {
                  $j = $left; 
                }
                else {
                  $j = $right; 
                }

                list($this->heap[$root], $this->heap[$j]) = array($this->heap[$j], $this->heap[$root]);
                $this->adjust($j);
            }
        }

    
    }
    public function printHeap()
    {
        while (!$this->isEmpty()) {
            
            $current = $this->extract();
            echo "<b>Prioridad # </b>".$current['PRIORIDAD']." <b>Habitación # </b>".$current['ID_HABITACION']."<b> Amoblado: </b>".$current['AMOBLADO']."<b> Precio: </b>".$current['PRECIO']."<br><br>";
        
        }
    }

    public function insert($item) 
    {
        $this->heap[] = $item;
    
        $place = $this->count();
        $parent = floor($place / 2);
        while ($place > 0 && $this->compare($this->heap[$place], $this->heap[$parent]) >= 0)
        {
            list($this->heap[$place], $this->heap[$parent]) = array($this->heap[$parent], $this->heap[$place]);
            $place = $parent;
            $parent = floor($place / 2);
        }
    }
}

class BSTtoHeap {

    public $rangeArray;
    public $tree;
    public $heap; 
    public function __construct($min, $max, $tree) 
    {
        $this->rangeArray  = $tree->rangeSearch($min, $max);
        $this->heap = new Heap();
        $this->insertOnHeap();
    }

    public function printRangeArray()
    {
        foreach ($this->rangeArray as &$valor) 
        {
            echo $valor['PRECIO'].'<br>';
        }
    }

    public function assignPriority($arr)
    {
        $conn = mysqli_connect('localhost', 'jorodriguezal', '12345', 'prueba');
        $pri = 0;
        $id = $arr['ID_HABITACION'];
        $servicios = "SELECT ID_SERVICIO FROM TIENE_SERVICIO WHERE ID_HABITACION = '".$id."' ";
        if ($resultado = mysqli_query($conn, $servicios)) {
            while ($fila = mysqli_fetch_array($resultado)) {
                switch($fila['ID_SERVICIO'])
                {
                    case 1:
                        $pri += 1;
                        break;
                    case 2:
                        $pri += 2;
                        break;
                    case 3: 
                        $pri += 3;
                        break;
                }
            }
            mysqli_free_result($resultado);
            
        }
        mysqli_close($conn);
        return $pri;
    }

    public function insertOnHeap()
    {
        foreach ($this->rangeArray as &$valor) 
        {
            $valor['PRIORIDAD'] = $this->assignPriority($valor);
            $this->heap->insert($valor);
        }
    }
    public function printAll()
    {
        $this->heap->printHeap();
    }
}


$consulta = "SELECT ID_HABITACION, AMOBLADO ,PRECIO FROM HABITACION WHERE ID_HABITACION NOT IN (SELECT ID_HABITACION FROM OCUPA WHERE FECHA_FIN IS NULL)";

if ($resultado = mysqli_query($conn, $consulta)) {
    $visitsTree = new Node(mysqli_fetch_array($resultado));
    while ($fila = mysqli_fetch_array($resultado)) {
        $visitsTree->insert($fila);
    }
    mysqli_free_result($resultado);
}
$heapbst = new BSTtoHeap(200000, 1000000, $visitsTree);
$heapbst->printAll();

//$visitsTree->PrintTree();

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