<?php
include 'connect.php';
$sql = "DELETE FROM users WHERE user_id=".$_REQUEST['user_id'].";";
$result = mysqli_query($conn,$sql);
if($result)
{
	header("Location:../Pages/user_control_panel.php");
}
else
{
	mysqli_error($conn);
}
mysqli_close($conn);
?>