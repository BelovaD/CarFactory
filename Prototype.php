<?php

interface orderManagementSystem
{
    public function clone();
}

class Order implements orderManagementSystem {
    private $id;
    public function __construct($id) {
        $this->id = $id;
    }
    public function clone(){
        return new Order($this->id);
    }
}

$a=new Order(5);
$b= $a->clone()


?>

