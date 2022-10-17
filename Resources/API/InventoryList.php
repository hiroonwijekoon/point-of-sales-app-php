<?php 
require "DataBase.php";
$db = new DataBase();
if ($db->dbConnect()) 
{
    echo $db->readAllInventory("inventory");
} 
else 
{
    echo "Error: Database connection";
}
?>