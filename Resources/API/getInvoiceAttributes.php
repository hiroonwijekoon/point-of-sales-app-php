<?php
require "DataBase.php";
$db = new DataBase();

if ($db->dbConnect()) 
{
    echo $db->getInvoiceAttributes("invoice_attributes",$_GET['invoice_id']);
} 
else 
{
    echo "Error: Database connection";
}

?>