<?php
require "DataBase.php";
$db = new DataBase();

if ($db->dbConnect()) 
{
    echo $db->getInvoicesList("invoices",$_POST['date_from'],$_POST['date_to']);
} 
else 
{
    echo "Error: Database connection";
}

?>