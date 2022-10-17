<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function logIn($table, $username, $password)
    {
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $this->sql = "select * from " . $table . " where username = '" . $username . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
            if ($dbusername == $username && password_verify($password, $dbpassword)) {
                $login = true;
            } else $login = false;
        } else $login = false;

        return $login;
    }

    function readAllInventory($table)
    {
        $this->sql = "SELECT * FROM $table";
        $result = mysqli_query($this->connect, $this->sql);
        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($data,$row);
        }

        echo json_encode($data);

    }

    function updateQty($table,$qty,$item_id)
    {
        $qty = $this->prepareData($qty);
        $item_id = $this->prepareData($item_id);
        $this->sql = "UPDATE $table SET qty = '".$qty."' WHERE item_id='".$item_id."'";
        if(mysqli_query($this->connect,$this->sql))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    function searchInventory($table,$keyword)
    {

        $this->sql = "SELECT * FROM $table WHERE size LIKE '%".$keyword."%' OR brand LIKE '%".$keyword."%' OR category LIKE '%".$keyword."%'";
        $result = mysqli_query($this->connect, $this->sql);
        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($data,$row);
        }

        echo json_encode($data);
    }


    function checkPWD($table, $old_password, $user_id)
    {
        $old_password = $this->prepareData($old_password);
        $user_id = $this->prepareData($user_id);
        $this->sql = "select * from " . $table . " where user_id = '" . $user_id . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbuserid = $row['user_id'];
            $dbpassword = $row['password'];
            if ($dbuserid == $user_id && password_verify($old_password, $dbpassword)) {
                $login = true;
            } else $login = false;
        } else $login = false;

        return $login;
    }

    function updateUser($table,$fullname,$username,$acc_type,$user_id)
    {
        $fullname = $this->prepareData($fullname);
        $username = $this->prepareData($username);
        $acc_type = $this->prepareData($acc_type);
        $user_id = $this->prepareData($user_id);
        $this->sql = "UPDATE $table SET full_name = '".$fullname."',username = '".$username."',acc_type = '".$acc_type."' WHERE user_id='".$user_id."'";
        if(mysqli_query($this->connect,$this->sql))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    function updateUserPW($table,$fullname,$username,$acc_type,$user_id,$password)
    {
        $fullname = $this->prepareData($fullname);
        $username = $this->prepareData($username);
        $acc_type = $this->prepareData($acc_type);
        $user_id = $this->prepareData($user_id);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->sql = "UPDATE $table SET full_name = '".$fullname."',username = '".$username."',acc_type = '".$acc_type."',password = '".$password."' WHERE user_id='".$user_id."'";
        if(mysqli_query($this->connect,$this->sql))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function checkUsername($table,$username)
    {
        $username = $this->prepareData($username);
        $this->sql = "select * from " . $table . " where username = '" . $username . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
             $login = true;
        } else $login = false;

        return $login;
    }

    function getInvoicesList($table,$date_from,$date_to)
    {
        $this->sql = "SELECT * FROM $table WHERE date_time BETWEEN '".$date_from."' and '".$date_to."'";
        $result = mysqli_query($this->connect, $this->sql);
        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($data,$row);
        }

        echo json_encode($data);
    }

    function getInvoiceDetails($table,$invoice_id)
    {
        $this->sql = "SELECT * FROM $table WHERE invoice_id=$invoice_id LIMIT 1";
        $result = mysqli_query($this->connect, $this->sql);
        $data = array();
        $numRows = mysqli_num_rows($result);
        if($numRows>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                array_push($data,$row);
            }
        }
        echo json_encode($data);
    }

    function getInvoiceAttributes($table,$invoice_id)
    {
        $this->sql = "SELECT * FROM $table WHERE invoice_id=$invoice_id";
        $result = mysqli_query($this->connect, $this->sql);
        $data = array();
        $numRows = mysqli_num_rows($result);
        if($numRows>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                array_push($data,$row);
            }
        }
        echo json_encode($data);
    }

    function getCustomerName($table,$cus_id)
    {
        $this->sql = "SELECT * FROM $table WHERE cus_id=$cus_id LIMIT 1";
        $result = mysqli_query($this->connect, $this->sql);
        $returnCusName="";
        $numRows = mysqli_num_rows($result);
        if($numRows>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $returnCusName= $row['cus_name'];
            }
        }
        echo json_encode($returnCusName);
    }


    function searchInvoices($table,$keyword,$date_from,$date_to)
    {

        $this->sql = "SELECT * FROM $table WHERE invoice_id LIKE '%".$keyword."%' OR cus_name LIKE '%".$keyword."%' AND date_time BETWEEN '".$date_from."' and '".$date_to."'";
        $result = mysqli_query($this->connect, $this->sql);
        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($data,$row);
        }

        echo json_encode($data);
    }

    function searchUsers($table,$keyword)
    {

        $this->sql = "SELECT * FROM $table WHERE full_name LIKE '%".$keyword."%' OR username LIKE '%".$keyword."%'";
        $result = mysqli_query($this->connect, $this->sql);
        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($data,$row);
        }

        echo json_encode($data);
    }

    function getSalesByMonth($table,$month)
    {

        $this->sql = "SELECT SUM(total) FROM $table WHERE EXTRACT(MONTH FROM date_time) = $month ";
        $result = mysqli_query($this->connect, $this->sql);
        $data = "";
        while($row = mysqli_fetch_assoc($result))
        {
            $data = $row['SUM(total)'];
        }

        echo json_encode($data);
    }

    function noOfStocks($table)
    {
        $this->sql = "SELECT SUM(qty) FROM $table";
        $result = mysqli_query($this->connect, $this->sql);
        $data = "";
        while($row = mysqli_fetch_assoc($result))
        {
            $data = $row['SUM(qty)'];
        }

        echo json_encode($data);
    }

    function noOfCustomers($table)
    {
        $this->sql = "SELECT Count(cus_id) FROM $table";
        $result = mysqli_query($this->connect, $this->sql);
        $data = "";
        while($row = mysqli_fetch_assoc($result))
        {
            $data = $row['Count(cus_id)'];
        }

        echo json_encode($data);
    }

    function noOfEmployees($table)
    {
        $this->sql = "SELECT Count(empID) FROM $table";
        $result = mysqli_query($this->connect, $this->sql);
        $data = "";
        while($row = mysqli_fetch_assoc($result))
        {
            $data = $row['Count(empID)'];
        }

        echo json_encode($data);
    }

    function getConfig($table,$config)
    {
        $this->sql = "SELECT * FROM $table WHERE config='".$config."' LIMIT 1";
        $result = mysqli_query($this->connect, $this->sql);
        $data = "";
        while($row = mysqli_fetch_assoc($result))
        {
            $data = $row['value'];
        }

        echo json_encode($data);
    }

    function updateConfig($table,$config,$value)
    {
        $config = $this->prepareData($config);
        $value = $this->prepareData($value);
        $this->sql = "UPDATE $table SET value = '".$value."' WHERE config='".$config."'";
        if(mysqli_query($this->connect,$this->sql))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function searchEmployees($table,$keyword)
    {

        $this->sql = "SELECT * FROM $table WHERE empName LIKE '%".$keyword."%' OR NIC LIKE '%".$keyword."%'";
        $result = mysqli_query($this->connect, $this->sql);
        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($data,$row);
        }

        echo json_encode($data);
    }

    function searchCustomers($table,$keyword)
    {

        $this->sql = "SELECT * FROM $table WHERE cus_name LIKE '%".$keyword."%' OR city LIKE '%".$keyword."%'";
        $result = mysqli_query($this->connect, $this->sql);
        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($data,$row);
        }

        echo json_encode($data);
    }





}


?>
