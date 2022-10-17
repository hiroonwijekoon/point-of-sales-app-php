<?php
include 'connect.php';
if(isset($_REQUEST['id']))
{
	$keyword = $_REQUEST['id'];
    $sql = "SELECT * FROM inventory WHERE item_id = $keyword";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
      	while ($row = mysqli_fetch_assoc($result) )
      	{
              $getPrice = $row["selling_price"];
        }
        echo json_encode($getPrice);
    }
}