<?php
include('cn.php');
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


$consulta = "SELECT ID_HABITACION, AMOBLADO ,PRECIO FROM HABITACION WHERE ID_HABITACION NOT IN (SELECT ID_HABITACION FROM OCUPA WHERE FECHA_FIN IS NULL)";
if ($resultado = mysqli_query($conn, $consulta)) {
    while ($fila = mysqli_fetch_array($resultado)) {
        $pila->push($fila);
    }
    mysqli_free_result($resultado);
}
echo "<h1>Habitaciones <br></h1>";
while (!($pila->isEmpty())){
    $current = $pila->pop();
    echo "<div class='"card mb-3 border-success"'><div class="card-header border-success h5">".$current['ID_HABITACION']."</div><div class="row no-gutters"><div class="col-md-4"><img src="img/roompics/room2.jpg" style="max-width: 100%; max-height: 100%;"class="card-img align-middle" alt="roomimg"></div><div class="col-md-8"><div class="card-body"><p class="card-text">".$current['AMOBLADO']."</p><p><i class="fas fa-map-marker-alt"></i> : ".$current['DIRECCION']."</p><p><i class="fas fa-dollar-sign"></i> : ".$current['PRECIO']."</p></div></div></div><div class="card-footer bg-secondary"><b style="color: white;">Servicios: </b><i class="fas fa-dollar-toilet"></i><i class="fas fa-toilet" style='font-size:24px; color:grey'></i><i class="fas fa-wifi" style='font-size:24px; color:grey'></i><i class="fas fa-tv" style='font-size:24px; color:grey'></i><i class="fas fa-car" style='font-size:24px; color:grey'></i><i class="fas fa-couch" style='font-size:24px; color:grey'></i><i class="fas fa-tshirt" style='font-size:24px; color:grey'></i><i class="fas fa-utensils" style='font-size:24px; color:grey'></i><button type="button" class="btn btn-info float-right" data-toggle="modal"data-target="#exampleModalCenter">Agendar Cita</button><!-- Modal --><div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Cita Agendada</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Felicidades su cita fue asignada para <b id="fechaasg">una fecha especifica</b>, elpropietario se comunicará contigo para confirmar la hora y pueda conocer el lugar personalmente.</div></div></div></div></div></div>";
}
mysqli_close($conn);
?>