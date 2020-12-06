 <?php 
include('cn.php');
class Node{
        public $parent;
        public $left;
        public $right;
        public $data;
        public $fecha;
    public function __construct ($data){

        $this->data = $data;
        $this->fecha = $this->data['FECHA'];

    }

    public function insert($data){
        if ($this->data != null)
        {
            if ($data['FECHA'] <= $this->fecha)
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
            
            elseif ($data['FECHA'] >= $this->fecha)
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
        if ($val < $this->data)
        {
            if ($this->left === null)
            {
                return;
            }
            return $this->left->findval($val);
        }
        elseif ($val > $this->data)
        {
            if ($this->right === null)
            {
                return;
            }
            return $this->right->findval($val);
        }
        else{
            return $this;
        }
    }
    

    public function PrintTree()
    {
        $table = $this->data;
        if ($this->left != null)
        {
            $this->left->PrintTree();
        }
        echo '<b> Habitación # : </b>'.($table['ID_HABITACION']).'<b> Estudiante # : </b>'.($table['ID_ESTUDIANTE']).'<b> Visita # : </b>'.($table['ID_VISITA']).'<b> Fecha: </b>'.($table['FECHA']).'<br><br>';
        if ($this->right)
        {
            $this->right->PrintTree();
        }
    }
}


$consulta = "SELECT ID_VISITA, ID_HABITACION, ID_ESTUDIANTE, FECHA FROM VISITA WHERE ID_HABITACION = 932 ORDER BY FECHA ASC;";

if ($resultado = mysqli_query($conn, $consulta)) {
    $visitsTree = new Node(mysqli_fetch_array($resultado));
    while ($fila = mysqli_fetch_array($resultado)) {
        $visitsTree->insert($fila);
    }
    mysqli_free_result($resultado);
}
mysqli_close($conn);
$visitsTree->PrintTree();

/*
$tiempo_inicial = microtime(true);
$a = array();
$a['FECHA'] = rand(0, 100);
$a['ID_VISITA'] = rand(0, 100);
$a['ID_HABITACION'] = rand(0, 100);
$a['ID_ESTUDIANTE'] = rand(0, 100);

$v = new Node($a);

for ($i = 0; $i <=1000; $i++){
    $a = array();
    $a['FECHA'] = rand(0, 100);
    $a['ID_VISITA'] = rand(0, 100);
    $a['ID_HABITACION'] = rand(0, 100);
    $a['ID_ESTUDIANTE'] = rand(0, 100);
    $v->insert($a) ;
}
$tiempo_final = microtime(true);
$tiempo_total = $tiempo_final - $tiempo_inicial;
echo $tiempo_total;
$tiempo_inicial = microtime(true);
$a = array();
$a['FECHA'] = rand(0, 100);
$a['ID_VISITA'] = rand(0, 100);
$a['ID_HABITACION'] = rand(0, 100);
$a['ID_ESTUDIANTE'] = rand(0, 100);
$v->insert($a);
$v->printTree();
$tiempo_final = microtime(true);
$tiempo_total = $tiempo_final - $tiempo_inicial;
echo '<br>'.$tiempo_total;
*/
?>