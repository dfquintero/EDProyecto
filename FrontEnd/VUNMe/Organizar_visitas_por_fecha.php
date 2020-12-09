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
        global $inOrder;
        $table = $this->data;
        if ($this->left != null)
        {
            $this->left->PrintTree();
        }
        $inOrder[] = $table;
        if ($this->right)
        {
            $this->right->PrintTree();
        }
    }
}


$consulta = "SELECT ID_VISITA, ID_HABITACION, ID_ESTUDIANTE, FECHA FROM VISITA WHERE ID_HABITACION = 932 ORDER BY FECHA ASC;";
$inOrder = array();
if ($resultado = mysqli_query($conn, $consulta)) {
    $visitsTree = new Node(mysqli_fetch_array($resultado));
    while ($fila = mysqli_fetch_array($resultado)) {
        $visitsTree->insert($fila);
    }
    mysqli_free_result($resultado);
}
mysqli_close($conn);
$visitsTree->PrintTree();


?>