<?php 
require "DataBase.php";
$db = new DataBase();
if ($db->dbConnect()) 
{
    echo $db->noOfEmployees("employees");
} 
else 
{
    echo "Error: Database connection";
}
?>