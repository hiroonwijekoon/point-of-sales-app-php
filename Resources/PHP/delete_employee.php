<?php
include 'connect.php';
$sql = "DELETE FROM employees WHERE empID=".$_REQUEST['emp_id'].";";
$result = mysqli_query($conn,$sql);
if($result)
{
	header("Location:../Pages/employee_manager.php");
}
else
{
	mysqli_error($conn);
}
mysqli_close($conn);
?>