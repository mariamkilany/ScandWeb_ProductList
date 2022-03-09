<?php
require_once('../classes/classes.php');
//get values and store by type 
if(isset($_POST['save'])){
    //When type is DVD
    if($_POST['type']==="DVD"){
    $p=new DVD($_POST['SKU'],$_POST['name'],$_POST['price'],$_POST['type'],$_POST['size']);
    $p->storeToDB($con);
    }
    //When type is Book
    else if($_POST['type']==="Book"){
    $p=new Book($_POST['SKU'],$_POST['name'],$_POST['price'],$_POST['type'],$_POST['height'],$_POST['width'],$_POST['length']);
    $p->storeToDB($con);
    }
    //When type is Furniture
    else if($_POST['type']==="Furniture"){
    $p=new Furniture($_POST['SKU'],$_POST['name'],$_POST['price'],$_POST['type'],$_POST['weight']);
    $p->storeToDB($con);
    }
    //after store to dataBase go to home page automatuclly
    header("Location: display.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    <?php 
    include "../css/display.css";
    include "../css/add.css"; ?>
    </style>
    <!-- <link rel="stylesheet" href="display.css"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <form method="post" id="product_form" name="form" >
    <header>
        <div class="pageTitle">
            <h1>Product Add</h1>
        </div>
        <div class="buttons">
            <button type="submit" name="save" class="button" id="save" >save</button>
            <button class="button"><a href="">Cancel</a></button>
        </div>
    </header>
    <div class="line"></div>
    <div class="container">
        <div>
            <label for="SKU">SKU</label>
            <input type="text" name="SKU" id="SKU" require="required" onblur="SKUrequired_data(this);">
            <p class="msg" id="sku_msg1">Please enter the SKU</p>
            <p class="msg two" id="sku_msg2">You can only Enter letter[A-Z] followed by numbers</p>
        </div>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" require="required" onblur="Name_TypeRequired_data(this,`name_msg`);">
            <p class="msg" id="name_msg">Please enter the Name</p>
        </div>
        <div>
            <label for="price">Price ($)</label>
            <input type="text" name="price" id="price" require="required" onblur="required_data(this,`price_msg1`,`price_msg2`);">
            <p class="msg" id="price_msg1">Please enter the price</p>
            <p class="msg two" id="price_msg2">Price can only be number</p>
        </div>
        <div>
            <label for="productType">Type Switcher</label>
            <select id="productType" name="type" require="required" onChange="update()" onblur="Name_TypeRequired_data(this,`type_msg`);">
                <option value="" disabled selected>Type Switcher</option>
                <option value="DVD">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select>
            <p class="msg" id="type_msg">Please select the product type</p>
        </div>
            <div class="option" id="DVD">
                <label for="size"> Size (MB)</label>
                <input type="text" id="size" name="size" require="required" onblur="required_data(this,`size_msg1`,`size_msg2`);">
                <p class="msg" id="size_msg1">Please enter the Size</p>
                <p class="msg two" id="size_msg2">Size can only be number</p>
                <span class="description" >"Product description"</span>
            </div>
            <div class="option"id="Book">
                <label for=" height">Height (CM)</label>
                <input type="text" id="height" name="height" require="required" onblur="required_data(this,`height_msg1`,`height_msg2`);">
                <p class="msg" id="height_msg1">Please enter the Height</p>
                <p class="msg two" id="height_msg2">Height can only be number</p>
                <label for=" width">Width (CM)</label>
                <input type="text" id="width" name="width" require="required" onblur="required_data(this,`width_msg1`,`width_msg2`);">
                <p class="msg" id="width_msg1">Please enter the Width</p>
                <p class="msg two" id="width_msg2">Width can only be number</p>
                <label for="length">Length (CM)</label>
                <input type="text" id="length" name="length" require="required" onblur="required_data(this,`length_msg1`,`length_msg2`);">
                <p class="msg" id="length_msg1">Please enter the Length</p>
                <p class="msg two" id="length_msg2">Length can only be number</p>
                <span class="description">"Product description"</span>
            </div>
            <div class="option" id="Furniture">
                <label for="weight">Weight (KG)</label>
                <input type="text" id="weight" name="weight" require="required" onblur="required_data(this,`weight_msg1`,`weight_msg2`);">
                <p class="msg" id="weight_msg1">Please enter the Weight</p>
                <p class="msg two" id="weight_msg2">Weight can only be number</p>
                <span class="description">"Product description"</span>
            </div>
        </form>
    </div>
    <footer>
    <div class="line"></div>
    <span class="footerspan">Scandiweb Test assignment</span>
    </footer>
    <script>
function update() {
var select = document.getElementById('productType');
var value = select.options[select.selectedIndex].value;
Array.from(select.options).forEach(function(op){
    document.getElementById(value).classList.add('rq');
    op.value!==""&&op.value!==value?document.getElementById(op.value).classList.remove('rq'):"";
})
}
function SKUrequired_data(input)
{
    var ms1=document.getElementById('sku_msg1');
    var ms2=document.getElementById('sku_msg2');

    if ( input.value == ""||input.value == null||input.value.length < 2)
    {
        ms1.style.display="block";
        ms2.style.display="none";
    }
    else if(input.value.match(/[^A-Z0-9$]+/)){
        ms1.style.display="none";
        ms2.style.display="block";
    }
    else{
        ms1.style.display="none";
        ms2.style.display="none";
    }
}
function Name_TypeRequired_data(input,id)
{
    var ms1=document.getElementById(id);

    if ( input.value == ""||input.value == null||input.value.length < 2)
    {
        ms1.style.display="block";
    }
    else{
        ms1.style.display="none";
    }
}
function required_data(input,id1,id2)
{
    var ms1=document.getElementById(id1);
    var ms2=document.getElementById(id2);

    if ( input.value == ""||input.value == null)
    {
        ms1.style.display="block";
        ms2.style.display="none";
    }
    else if(input.value.match(/[^0-9]+/)){
        ms1.style.display="none";
        ms2.style.display="block";
    }
    else{
        ms1.style.display="none";
        ms2.style.display="none";
    }
}
// document.getElementById("save").disabled = true;

// document.getElementById("save").addEventListener('click', ValidationEvent());

// function ValidationEvent(){
// var masseges=document.getElementsByClassName("msg");
// var corr=true;
// for(var i=0;i<masseges.length;i++){
//     if(!masseges[i].style.display === "none"){
//     corr=false;
//     }
// }
// if(corr){
//     document.getElementById("save").disabled = false;
// }
// }
// document.querySelectorAll('input[type=text]').forEach(item => {
//     item.addEventListener('change', event => {
//         ValidationEvent();
//     })
// })
// console.log(document.getElementsByClassName("two"));
    </script>
</body>
</html>
