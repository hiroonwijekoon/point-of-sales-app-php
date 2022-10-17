<?php
include 'connect.php';
$currentQty = $_REQUEST["currentqty"] + 0;
$addition = $_REQUEST["addition"] + 0;
$newQty = $currentQty + $addition;
$sql = "UPDATE inventory SET size='".$_REQUEST["size_"]."', brand='".$_REQUEST["brand_"]."', category='".$_REQUEST["cat_"]."', description='".$_REQUEST["desc_"]."', cost='".$_REQUEST["cost"]."', selling_price='".$_REQUEST["selling_price"]."', qty='".$newQty."' WHERE item_id='".$_REQUEST["store_id"]."';";
$result=mysqli_query($conn,$sql);
if($result)
{
	header("Location:../Pages/inventory.php");
}
else
{
	echo "Error".mysqli_error($conn);
}
?>