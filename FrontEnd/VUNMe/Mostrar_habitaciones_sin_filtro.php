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


?>