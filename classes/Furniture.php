<?php
class Furniture extends product{
    private $weight;
    public function __construct($SKU,$name,$price,$type,$weight) {
        parent::__construct($SKU,$name,$price,$type);
        $this->setWeight($weight);
    }
    //Setters and Getters
    public function setWeight($weight){
        $this->weight=$weight;
    }
    public function getWeight(){
        return $this->weight;
    }
    //Store To dataBase
    public function storeToDB($con){
        $s=parent::getSKU();
        $n=parent::getName();
        $p=parent::getPrice();
        $t=parent::getType();
        $w=$this->getWeight();
        $sql="insert into `products` (SKU,name,price,type,weight) 
        values('$s','$n','$p','$t','$w')";
        $result=mysqli_query($con,$sql);
        if(!$result){
            die(mysqli_error($con));
        }
    }
}
?>