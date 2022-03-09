<?php
//dvd child extends from parent class product
class DVD extends product{
    private $size;
    public function __construct($SKU,$name,$price,$type,$size) {
        parent::__construct($SKU,$name,$price,$type);
        $this->setSize($size);
    }
    //Setters and Getters
    public function setSize($size){
        $this->size=$size;
    }
    public function getSize(){
        return $this->size;
    }
    //Store To dataBase
    public function storeToDB($con){
        $s=parent::getSKU();
        $n=parent::getName();
        $p=parent::getPrice();
        $t=parent::getType();
        $z=$this->getSize();
        $sql="insert into `products` (SKU,name,price,type,size) 
        values('$s','$n','$p','$t','$z')";
        $result=mysqli_query($con,$sql);
        if(!$result){
            die(mysqli_error($con));
        }
    }
}

?>
