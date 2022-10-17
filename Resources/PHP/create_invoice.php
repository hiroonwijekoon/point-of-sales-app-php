<?php
include 'connect.php';
$sql = "SELECT * FROM customers_details WHERE cus_id='".$_REQUEST['cus_id']."' LIMIT 1";
$result = mysqli_query($conn,$sql);
$cus_name="";
if(mysqli_num_rows($result))
{
    while($row = mysqli_fetch_assoc($result))
    {
        $cus_name= $row['cus_name'];
    }
}
$sql = "INSERT INTO invoices (cus_id,cus_name,total,discount,total_payable,date_time,cash_recieved) VALUES ('".$_REQUEST['cus_id']."','".$cus_name."','".$_REQUEST['total']."','".$_REQUEST['discount']."','".$_REQUEST['total_payable']."','". date("Y/m/d H:m:s") ."','".$_REQUEST['cash_recieved']."')";
$result = mysqli_query($conn,$sql);
if($result)
{
    $last_id = $conn->insert_id;
    echo json_encode($last_id);
}
else
{
    echo json_encode("Error.".mysqli_error($conn));
}