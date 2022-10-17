<?php 
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['keyword']))
{
    if ($db->dbConnect()) 
    {
        echo $db->searchUsers("users",$_POST['keyword']);
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