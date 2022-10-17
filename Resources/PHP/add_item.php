<?php
include 'connect.php';
$sql = "INSERT INTO inventory (brand,category,size,cost,selling_price,qty) VALUES ('".$_REQUEST['brand']."','".$_REQUEST['category']."','".$_REQUEST['size']."','".$_REQUEST['cost']."','".$_REQUEST['selling_price']."','".$_REQUEST['quantity']."')";
$result = mysqli_query($conn,$sql);
if($result)
{
	header("Location:../Pages/inventory.php");
}
else
{
	echo "Failed".mysqli_error($conn);
}
?>