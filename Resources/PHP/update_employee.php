<?php

include 'connect.php';

$sql = "UPDATE employees SET empName= '".$_REQUEST['emp_name']."', Address1= '".$_REQUEST['address1']."', Address2= '".$_REQUEST['address2']."', City= '".$_REQUEST['city']."' , Remarks='".$_REQUEST['special_remarks']."' ,NIC='".$_REQUEST['nic']."' , Contact1= '".$_REQUEST['contact_no']."', Contact2= '".$_REQUEST['contact_no2']."', img= '".$_REQUEST['image_']."' WHERE empID = '".$_REQUEST['emp_id_']."'";
$result= mysqli_query($conn,$sql);
if($result)
{
    header("Location:../Pages/employee_manager.php");
}
else
{
    echo "Error".mysqli_error($conn);
}
?>