<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_GET['username'])) 
{
    if ($db->dbConnect()) {
        if ($db->checkUsername("users", $_GET['username'])) 
        {
            echo "true";
        } 
        else echo "false";
    }   
    else echo "Error: Database connection. ".mysqli_error($db->connect);
} 
else echo "All fields are required";
?>