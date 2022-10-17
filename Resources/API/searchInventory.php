<?php 
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['keyword']))
{
    if ($db->dbConnect()) 
    {
        echo $db->searchInventory("inventory",$_POST['keyword']);
    } 
    else 
    {
        echo "Error: Database connection";
    }
}
else
{
    echo "keyword not selected.";
}

?>