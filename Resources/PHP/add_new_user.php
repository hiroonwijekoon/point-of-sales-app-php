<?php
include 'connect.php';
$sql="SELECT * FROM users WHERE username='".$_REQUEST['username']."';";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	header("Location:../Pages/user_control_panel.php?user_exist");
}
else
{
	$hash = password_hash($_REQUEST['password'],PASSWORD_BCRYPT);
	$sql = "INSERT INTO users (full_name,username,password,acc_type,created_date) VALUES ('".$_REQUEST['full_name']."','".$_REQUEST['username']."','".$hash."','".$_REQUEST['acc_type']."','".date("Y-m-d h:i:sa")."')";
	$result = mysqli_query($conn,$sql);
	if($result)
	{
		header("Location:../Pages/user_control_panel.php");
	}
	else
	{
		header("Location:../Pages/user_control_panel.php?error");
	}
}

?>