<?php
include 'connect.php';
$sql= "SELECT * FROM users WHERE username='".$_REQUEST["username"]."'";
$result=mysqli_query($conn,$sql);
$verify = false;
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$verify = password_verify($_REQUEST['password'], $row['password']);
		if($verify)
			{
				session_start();
				$_SESSION["username"]=$row["username"];
				$_SESSION["user_id"]=$row["user_id"];
			}
	}
}
else
{
	echo "Error".mysqli_error($conn);
}
if($verify)
{
	header("Location:../../index.php");
}
else
{
	header("Location:../../login.php?error");
}
mysqli_close($conn);
?>