<?php 
require "DataBase.php";
$db = new DataBase();
if ($db->dbConnect()) 
{
    echo $db->noOfCustomers("customers_details");
} 
else 
{
    echo "Error: Database connection";
}
?>