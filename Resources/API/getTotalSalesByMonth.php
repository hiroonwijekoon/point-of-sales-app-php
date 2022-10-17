<?php 
require "DataBase.php";
$db = new DataBase();
if (isset($_GET['month']))
{
    if ($db->dbConnect()) 
    {
        echo $db->getSalesByMonth("invoices",$_GET['month']);
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