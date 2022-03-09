<?php 
include '../connectionConfig/connect.php';
//
$products=array();
$sql='SELECT*From products ORDER BY SKU';
$result=mysqli_query($con,$sql);
$totalrecords = mysqli_num_rows($result);
while($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

if(isset($_POST['submit'])){
    if(isset($_POST['SKU'])){
        foreach($_POST['SKU'] as $SKU){
            $query="DELETE FROM products WHERE SKU='$SKU'";
            mysqli_query($con,$query);
        }
    }
    echo "<meta http-equiv='refresh' content='0'>";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>products list</title>
<style>
    <?php include "../css/display.css" ?>
    </style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
</head>
<body>
<form class="sub" action="display.php" method="post">
<header>
    <div class="pageTitle">
        <h1>Product List</h1>
    </div>
    <div class="buttons">
        <button class="button"><a href="add-product.php">ADD</a></button>
        <input class="button" type="submit" name="submit" value="MassDelete">
    </div>
</header>
<div class="line"></div>
<div class="products">
    <?php foreach($products as $product) {?>
        <div class="inproduct">
        <input type="checkbox" name="SKU[]" value="<?php echo $product['SKU'] ?>">
        <div class="text">
            <?php echo htmlspecialchars($product['SKU'])?><br>
            <?php echo htmlspecialchars($product['Name'])?><br>
            <?php echo htmlspecialchars($product['Price'])?> $<br>
            <?php if($product['Type']==="DVD") {?>
            Size :
            <?php echo htmlspecialchars($product['size'])?>
            <br>
            <?php } ?>
            <?php if($product['Type']==="Book") {?>
            Dimention : <?php echo htmlspecialchars($product['height'])?> x <?php echo htmlspecialchars($product['width'])?> x <?php echo htmlspecialchars($product['length'])?>
            <?php } ?>
            <?php if($product['Type']==="Furniture") {?>
            Weight :
            <?php echo htmlspecialchars($product['weight'])?>
            <?php } ?>
        </div>
    </div>
    <?php }?>
</div>
</form>
<footer>
    <div class="line"></div>
    <span class="footerspan">Scandiweb Test assignment</span>
</footer>
</body>
</html>