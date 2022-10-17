<?php
require "DataBase.php";
$db = new DataBase();

if ($db->dbConnect()) 
{
    echo $db->getInvoiceDetails("invoices",$_GET['invoice_id']);
} 
else 
{
    echo "Error: Database connection";
}

?>