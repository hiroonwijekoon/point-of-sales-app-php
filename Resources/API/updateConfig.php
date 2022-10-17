<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_GET['config']) && isset($_GET['value']) ) {
    if ($db->dbConnect()) {
        if ($db->updateConfig("config", $_GET['config'] , $_GET['value'])) {
            echo "Operation Success";
        } else echo "Error".mysqli_error($db->connect);
    } else echo "Error: Database connection. ".mysqli_error($db->connect);
} else echo "All fields are required";
?>
