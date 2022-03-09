<?php
class Book extends product{
    private $height;
    private $length;
    private $width;
    public function __construct($SKU,$name,$price,$type,$height,$width,$length) {
        parent::__construct($SKU,$name,$price,$type);
        $this->setHeight($height);
        $this->setWidth($width);
        $this->setLength($length);
    }
    //Setters and Getters
    public function setHeight($height){
        $this->height=$height;
    }
    public function getHeight(){
        return $this->height;
    }
    public function setWidth($width){
        $this->width=$width;
    }
    public function getWidth(){
        return $this->width;
    }
    public function setLength($length){
        $this->length=$length;
    }
    public function getLength(){
        return $this->length;
    }
    //Store To dataBase
    public function storeToDB($con){
        $s=parent::getSKU();
        $n=parent::getName();
        $p=parent::getPrice();
        $t=parent::getType();
        $h=$this->getHeight();
        $w=$this->getWidth();
        $l=$this->getLength();
        $sql="insert into `products` (SKU,name,price,type,height,width,length) 
        values('$s','$n','$p','$t','$h','$w','$l')";
        $result=mysqli_query($con,$sql);
        if(!$result){
            die(mysqli_error($con));
        }
    }
}
?>