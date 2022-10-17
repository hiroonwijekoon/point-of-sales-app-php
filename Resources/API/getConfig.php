<?php
require "DataBase.php";
$db = new DataBase();

if ($db->dbConnect()) 
{
    echo $db->getConfig("config",$_GET['config']);
} 
else 
{
    echo "Error: Database connection";
}

?>