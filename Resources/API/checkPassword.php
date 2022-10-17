<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['old_password']) && isset($_POST['user_id'])) {
    if ($db->dbConnect()) {
        if ($db->checkPWD("users", $_POST['old_password'], $_POST['user_id'])) {
            echo "true";
        } else echo "Error ".mysqli_error($db->connect);
    } else echo "Error: Database connection. ".mysqli_error($db->connect);
} else echo "All fields are required";
?>