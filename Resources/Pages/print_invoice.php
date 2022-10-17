<?php
            
    include '../PHP/connect.php';
    $invoiceId="";
    $invoiceDate="";
    $invoiceTime="";
    $customerID="";
    $total="";
    $discount="";
    $totalPayable="";
    $sql= "SELECT * FROM invoices WHERE invoice_id='".$_REQUEST["ID"]."'";
    $result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $invoiceId = $row["invoice_id"];
            $invoiceDate=substr($row['date_time'],0,10);
            $invoiceTime=substr($row['date_time'],10,14);
            $customerID=$row["cus_id"];
            $total = $row["total"];
            $discount = $row["discount"];
            $totalPayable = $row["total_payable"];
        }
    }
    
    setlocale(LC_MONETARY, 'en_IN');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Print Invoice</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />		<link rel="stylesheet" type="text/css" href="./Resources/Stylesheets/index.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Stylesheets/print_invoice.css">
</head>
<body>
<div class="container">
    <div class="header">
        <div class="row">
            <div class="col-sm-6 header_left">
                <h3><i class="fab fa-vuejs"></i>&nbsp&nbspNew Victory Motors</h3>
            </div>
            <div class="col-sm-6 header_right">
                New Victory Motors<br>
                69/2, Padiyathalawa Rd,
                Mahiyanganaya.<br>
                055 225 8220 | 077 158 1818
            </div>
        </div>
    </div>
    <hr>
    <div class="invoice_body">
        <div class="row">
            <div class="col-sm-6">
                <h4>Invoice To</h4>
                <span> <?php 
                $sql= "SELECT * FROM customers_details WHERE cus_id='".$customerID."' LIMIT 1";
                $result= mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0)
                {
                    while($row=mysqli_fetch_assoc($result))
                    {
                        echo "
                        $row[cus_name]<br>
                        $row[address_1]<br>
                        $row[address_2]<br>
                        $row[contact_no]<br>
                        ";
                    }
                }
                ?></span>
            </div>
            <div class="col-sm-6" style="text-align:right;">
                <span>Invoice No: <?php echo $invoiceId ?></span><br>
                <span>Invoice Date: <?php echo $invoiceDate ?></span><br>
                <span>Invoice Time: <?php echo $invoiceTime ?></span>
            </div>
        </div>
        <br>
        
        <table class="table thead-dark table-bordered">
            <tr>
                <th>Item Name</th>
                <th style="text-align:right">Unit Price</th>
                <th style="text-align:center">Qty</th>
                <th style="text-align:right">Sub Total</th>
            </tr>
            <?php
            $sql= "SELECT * FROM invoice_attributes WHERE invoice_id='".$_REQUEST["ID"]."'";
            $result= mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    $itemName= "";
                    $sql2 = "SELECT * FROM inventory WHERE item_id='".$row["item_id"]."' LIMIT 1";
                    $result2= mysqli_query($conn,$sql2);
                    if(mysqli_num_rows($result2)>0)
                    {
                        while($row2=mysqli_fetch_assoc($result2))
                        {
                            $itemName = $row2['brand']." | ".$row2['size']." | ".$row2['category'];
                        }
                    }

                    echo "
                    <tr>
                        <td>".$itemName."</td>
                        <td style='text-align:right;'>".money_format("Rs %.2n ",$row["unit_price"])."</td>
                        <td style='text-align:center;'>".$row["qty"]."</td>
                        <td style='text-align:right;'>".money_format("Rs %.2n ",$row["sub_total"])."</td>
                    </tr>
                    ";
                }
            }

            ?>
        </table>
        <br>
        <hr>
        <div class="totals">
            <table class="table table-striped" style="width:260px">
                <tr>
                    <td>Total:</td>
                    <td class="values"><?php echo money_format("Rs %.2n ",$total) ?></td>
                </tr>
                <tr>
                    <td>Discount:</td>
                    <td class="values"><?php echo money_format("Rs %.2n ",$discount) ?></td>
                </tr>
                <tr>
                    <td>Total Payable:</td>
                    <td class="values"><?php echo money_format("Rs %.2n ",$totalPayable) ?></td>
                </tr>
            </table>
        </div>
        <br><br><br><br>
        <h6 align="center">Thank you for visiting. Please come again :)</h6>
    </div>
</div>
</body>
<script>
    window.print();
</script>