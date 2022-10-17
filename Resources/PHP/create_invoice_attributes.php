<?php

include 'connect.php';
$data = json_decode(stripslashes($_POST['cartArray']));
$tempArray = array();
$tempArray2 = array();
$item_id="0";
if(isset($data))
{
    foreach($data as $item) {
        //$tempArray = implode("!",$_REQUEST["cartArray"]);
        //$tempArray= explode("!", $tempArray);
            $tempArray2 = explode(":",json_encode($item));
            $item_name = substr(explode("#",$tempArray2[0])[0],1);
            $item_id=explode("#",$tempArray2[0])[1];
            $sql = "INSERT INTO invoice_attributes (item_id,item_name,unit_price,qty,sub_total,invoice_id) VALUES ('".$item_id."','".$item_name."','".$tempArray2[1]."','".$tempArray2[2]."','".$tempArray2[3]."','".$_REQUEST["lastId"]."')";
            $result= mysqli_query($conn,$sql);
            if($result)
            {
                echo json_encode($item);
            }
            else
            {
                echo json_encode("Error".mysqli_error($conn));
            }
    }
}
else
{
    echo json_encode("Cart Array Not Found");
}

?>