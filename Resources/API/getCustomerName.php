<?php
require "DataBase.php";
$db = new DataBase();

if ($db->dbConnect()) 
{
    echo $db->getCustomerName("customers_details",$_GET['cus_id']);
} 
else 
{
    echo "Error: Database connection";
}

?>