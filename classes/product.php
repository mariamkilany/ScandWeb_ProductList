<?php
//parent class
class product{
    private $SKU;
    private $name;
    private $price;
    private $type;
    public function __construct($SKU,$name,$price,$type) {
        $this->setSKU($SKU);
        $this->setName($name);
        $this->setPrice($price);
        $this->settype($type);
    }
    //Setters and Getters 
    public function setSKU($SKU){
        $this->SKU=$SKU;
    }
    public function setName($name){
        if(is_string($name)&& strlen($name)>1)
        $this->name=$name;
    }
    public function setPrice($price){
        if(1 === preg_match('~[0-9]~', $price))
        $this->price=$price;
    }
    public function setType($type){
        $this->type=$type;
    }
    public function getSKU(){
        return $this->SKU;
    }
    public function getName(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getType(){
        return $this->type;
    }
}

?>
