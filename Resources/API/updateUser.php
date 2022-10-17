<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['full_name']) && isset($_POST['username']) && isset($_POST['acc_type']) && isset($_POST['user_id']) && isset($_POST['password']))
{
    if ($db->dbConnect()) {
        if ($db->updateUserPW("users", $_POST['full_name'] , $_POST['username'], $_POST['acc_type'], $_POST['user_id'], $_POST['password'])) {
            echo "true";
        } else echo "Error".mysqli_error($db->connect);
    } else echo "Error: Database connection. ".mysqli_error($db->connect);
}
else if (isset($_POST['full_name']) && isset($_POST['username']) && isset($_POST['acc_type']) && isset($_POST['user_id']) ) {
    if ($db->dbConnect()) {
        if ($db->updateUser("users", $_POST['full_name'] , $_POST['username'], $_POST['acc_type'], $_POST['user_id'])) {
            echo "true";
        } else echo "Error".mysqli_error($db->connect);
    } else echo "Error: Database connection. ".mysqli_error($db->connect);
} else echo "All fields are required";
?>
