<?php
include 'connect.php';
$sql = "INSERT INTO customers_details (cus_name,address_1,address_2,city,special_remarks,nic,contact_no,fax,email,img) VALUES ('".$_REQUEST['cus_name']."','".$_REQUEST['address1']."','".$_REQUEST['address2']."','".$_REQUEST['city']."','".$_REQUEST['special_remarks']."','".$_REQUEST['nic']."','".$_REQUEST['contact_no']."','".$_REQUEST['fax_no']."','".$_REQUEST['email']."','".$_REQUEST['image_']."')";
$result = mysqli_query($conn,$sql);
if($result)
{
	header("Location:../Pages/customer_manager.php");
}
else
{
	echo "Failed".mysqli_error($conn);
}
?>