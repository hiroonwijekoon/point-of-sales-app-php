<?php
include 'connect.php';
$sql = "DELETE FROM inventory WHERE item_id=".$_REQUEST['item_id'].";";
$result = mysqli_query($conn,$sql);
if($result)
{
	header("Location:../Pages/inventory.php");
}
else
{
	mysqli_error($conn);
}
mysqli_close($conn);
?>