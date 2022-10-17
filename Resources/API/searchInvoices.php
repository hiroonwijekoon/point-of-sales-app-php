<?php 
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['keyword']))
{
    if ($db->dbConnect()) 
    {
        echo $db->searchInvoices("invoices",$_POST['keyword'],$_POST['date_from'],$_POST['date_to']);
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