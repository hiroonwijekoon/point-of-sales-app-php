<?php

include 'connect.php';

$sql = "UPDATE customers_details SET cus_name= '".$_REQUEST['cus_name']."', address_1= '".$_REQUEST['address1']."', address_2= '".$_REQUEST['address2']."', city= '".$_REQUEST['city']."' , special_remarks='".$_REQUEST['special_remarks']."' ,nic='".$_REQUEST['nic']."' , contact_no= '".$_REQUEST['contact_no']."', fax= '".$_REQUEST['fax_no']."', email= '".$_REQUEST['email']."' ,credit_balance= '".$_REQUEST['credit']."', img= '".$_REQUEST['image_']."' WHERE cus_id = '".$_REQUEST['CusID']."'";
$result= mysqli_query($conn,$sql);
if($result)
{
   header("Location:../Pages/customer_manager.php");
}
else
{
    echo "Error".mysqli_error($conn);
}
?>