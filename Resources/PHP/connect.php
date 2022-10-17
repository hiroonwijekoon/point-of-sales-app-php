<?php
$conn = mysqli_connect("localhost","root","","WebPOS");
if(!$conn)
{
	die("Connection Error: ".mysql_connect_error());
}

?>