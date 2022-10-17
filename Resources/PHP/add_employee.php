<?php

include 'connect.php';

$sql = "INSERT INTO employees (empName,Address1,Address2,City,Remarks,NIC,Contact1,Contact2,img) VALUES ('".$_REQUEST['emp_name']."','".$_REQUEST['address1']."','".$_REQUEST['address2']."','".$_REQUEST['city']."','".$_REQUEST['special_remarks']."','".$_REQUEST['nic']."','".$_REQUEST['contact_no']."','".$_REQUEST['contact_no2']."','".$_REQUEST['image_']."')";
$result = mysqli_query($conn,$sql);
if($result)
{
    header("Location:../Pages/employee_manager.php");
}
else
{
    echo "Error".mysqli_error($conn);
}

?>