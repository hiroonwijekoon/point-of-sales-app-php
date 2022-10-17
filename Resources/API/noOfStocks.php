<?php 
require "DataBase.php";
$db = new DataBase();
if ($db->dbConnect()) 
{
    echo $db->noOfStocks("inventory");
} 
else 
{
    echo "Error: Database connection";
}
?>