<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['qty']) && isset($_POST['item_id']) ) {
    if ($db->dbConnect()) {
        if ($db->updateQty("inventory", $_POST['qty'] , $_POST['item_id'])) {
            echo "Operation Success";
        } else echo "Error".mysqli_error($db->connect);
    } else echo "Error: Database connection. ".mysqli_error($db->connect);
} else echo "All fields are required";
?>
