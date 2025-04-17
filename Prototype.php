<?php

interface orderManagementSystem
{
    public function clone();

}

class Order implements orderManagementSystem {

    private $orderNumber;
    private $items;
    private $totalAmount;
    public function __construct(string $orderNumber, string $items, float $totalAmount) {
        $this->orderNumber = $orderNumber;
        $this->items = $items;
        $this->totalAmount = $totalAmount;
    }
    public function clone(){
        return new Order($this->orderNumber, $this->items, $this->totalAmount);
    }
    public function __tostring(): string {
        
        return "Order №({$this->orderNumber}, {$this->items}, {$this->totalAmount})";
    }
}

$a=new Order(2,'tomatoes, cucumbers, milk, meat, fish',1300);
$b= $a->clone()

?>

