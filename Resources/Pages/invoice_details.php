<!DOCTYPE html>
<html>
<head>
	<title>Invoice Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="../Stylesheets/invoice_details.css">
  	<?php include '../PHP/check_login.php' ?>
</head>
<body>
<div class="sidenav">
<a href="../../index.php"><i class="fas fa-tachometer-alt"></i> &nbsp Dashboard <i class="fas fa-chevron-right chevron"></i></a>
  		<a href="cash_invoice.php"><i class="fa fa-th" aria-hidden="true"></i> &nbsp POS <i class="fas fa-chevron-right chevron"></i></a>
  		<a href="inventory.php"><i class="fas fa-warehouse"></i> &nbsp Inventory<i class="fas fa-chevron-right chevron"></i></a>
		<a href="customer_manager.php"><i class="fas fa-user-tie"></i> &nbsp Customers <i class="fas fa-chevron-right chevron"></i></a>
		<a href="employee_manager.php"><i class="fas fa-people-carry"></i> &nbsp Employees <i class="fas fa-chevron-right chevron"></i></a>
        <a href="sales.php" class="active_link"><i class="fas fa-chart-line"></i> &nbsp Sales </a>
		<a href="user_control_panel.php"><i class="fas fa-users-cog"></i> &nbsp Users <i class="fas fa-chevron-right chevron"></i></a>
        <a href="sales.php"><i class="fas fa-chart-line"></i> &nbsp Sales <i class="fas fa-chevron-right chevron"></i></a>
		<a href="./Resources/Pages/"><i class="fas fa-tools"></i> &nbsp Settings <i class="fas fa-chevron-right chevron"></i></a>
        
</div>	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<a class="navbar-brand" href="#"><i class="fab fa-vuejs"></i>&nbsp&nbspNew Victory Motors</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
    		</ul>
    		<ul class="navbar-nav my-2 my-lg-0">
    			<li class="nav-item dropdown">
      			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user"></i>&nbsp&nbsp<?php echo $_SESSION['username'] ?>
      			  </a>
        			<div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
        			  <a class="dropdown-item" href="#"><i class="fa fa-cog" aria-hidden="true"></i>&nbspAccount Settings</a>
        			  <a class="dropdown-item" href="#"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbspView Log</a>
        			  <div class="dropdown-divider"></div>
        			  <a class="dropdown-item" href="login.php"><i class="fas fa-sign-out-alt"></i>&nbspLogout</a>
        			</div>
      			</li>
      		</ul>
  		</div>
	</nav>
	<div class="container-fluid body_area body_content">
		<br>
        <span id="IDholder" style="display:none"><?php echo $_GET['invoice_id'] ?></span>
		<div class="site_path">
			<span><i class="fa fa-home" aria-hidden="true"></i>&nbsp<a href="../../index.php">Home</a> \ <a href="sales.php">Sales</a> \ Invoice Details </span>
		</div>
		<br>
		<img class="img-responsive" src="https://img.icons8.com/cotton/64/000000/invoice.png"/><span id="heading">Invoice Details</span><br><br>

      <div class="row container-fluid">
        <div class="col-sm-12 top_card">
                <div class="row">
                    <div class="col-sm-6">
                    <table class ="table table-borderless" style='width:90%'>   
                        <tr>
                            <td><i class="fas fa-funnel-dollar"></i>&nbsp&nbsp&nbspTotal:</td>
                            <td id="total_" style='text-align:right;'></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-tag"></i>&nbsp&nbsp&nbspDiscount:</td>
                            <td id="discount_" style='text-align:right;'></td>
                        </tr> 
                        <tr>
                            <td><i class="fas fa-money-check-alt"></i>&nbsp&nbsp&nbspTotal Payable:</td>
                            <td id="total_payable_" style='text-align:right;'></td>
                        </tr> 
                        <tr>
                            <td><i class="fas fa-money-bill-wave"></i>&nbsp&nbsp&nbspCash Recieved:</td>
                            <td id="cash_recieved_" style='text-align:right;'></td>
                        </tr>   
                    </table>
                    </div>
                    <div class="col-sm-6">
                    <table class ="table table-borderless"  style='width:90%'>   
                        <tr>
                            <td><i class="fas fa-file-invoice"></i>&nbsp&nbsp&nbspInvoice ID:</td>
                            <td id="invoice_id_" style='text-align:right;'></td>
                        </tr> 
                        <tr>
                            <td><i class="fas fa-calendar-day"></i>&nbsp&nbsp&nbspInvoice Date and Time:</td>
                            <td id="date_time_" style='text-align:right;'></td>
                        </tr> 
                        <tr>
                            <td><i class="fas fa-user-tag"></i>&nbsp&nbsp&nbspCutomer:</td>
                            <td id="customer_name_" style='text-align:right;'></td>
                        </tr>
                        <tr>
                        </tr>     
                    </table> 
                    </div>
                </div>
            </table>
        </div>
	</div>
	<br>
    <div class="row container-fluid">
        <div class="bottom_card">
        <table class="table table-hover">
    		<thead>
     			<tr>
     			  <th style="text-align:left;">Item Name</th>
     			  <th style="text-align:right;">Unit Price</th>
     			  <th style="text-align:right;">Qty</th>
     			  <th style="text-align:right;">Sub Total</th>
     			</tr>
    		</thead>
    		<tbody id="data_">
    		</tbody>
  		</table>
        </div>
    </div>

</body>
</html>
<script>
//Money Formatter
var formatter = new Intl.NumberFormat('en-US', {
style: 'currency',
currency: 'LKR',

  // These options are needed to round to whole numbers if that's what you want.
  //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
  //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
});

//Load single invoice details
//call ajax
var ajax = new XMLHttpRequest();
var method = "GET";
var url = "../API/getInvoiceDetails.php?invoice_id="+document.getElementById("IDholder").innerHTML;
var asynchronous = true;

ajax.open(method,url,asynchronous);
//send ajax request
ajax.send();

//recieve response
ajax.onreadystatechange = function()
{
    if(this.readyState == 4 && this.status== 200)
    {
        //Convert JSON back to an array
        var data = JSON.parse(this.responseText);
        console.log(data);

        //loop through data
        for(var i=0;i<data.length;i++)
        {
            var invoice_id = data[i].invoice_id;
            var cus_id = data[i].cus_id;
            var cus_name = data[i].cus_name;
            var total = data[i].total;
            var discount = data[i].discount;
            var total_payable = data[i].total_payable;
            var date_time = data[i].date_time;
            var cash_recieved = data[i].cash_recieved;

            //storing data

            document.getElementById("invoice_id_").innerHTML = invoice_id;
            document.getElementById("total_").innerHTML = formatter.format(total);
            document.getElementById("discount_").innerHTML = formatter.format(discount);
            document.getElementById("total_payable_").innerHTML = formatter.format(total_payable);
            document.getElementById("date_time_").innerHTML = date_time;
            document.getElementById("cash_recieved_").innerHTML = formatter.format(cash_recieved);
            document.getElementById("customer_name_").innerHTML = "<a target='_blank' href='./customer_details.php?cus_id="+cus_id+"'>"+cus_name+"&nbsp<i class='fas fa-external-link-square-alt'></i></a>";

        }

    }
}

//Load Invoices List

//call ajax
var ajax = new XMLHttpRequest();
var method = "GET";
var url = "../API/getInvoiceAttributes.php?invoice_id="+document.getElementById("IDholder").innerHTML;
var asynchronous = true;

ajax.open(method,url,asynchronous);
//send ajax request
ajax.send();

//recieve response
ajax.onreadystatechange = function()
{
    if(this.readyState == 4 && this.status== 200)
    {
        //Convert JSON back to an array
        var data = JSON.parse(this.responseText);
        console.log(data);

        //html value for <tbody>
        var html = "";

        //loop through data
        for(var i=0;i<data.length;i++)
        {
            var item_name = data[i].item_name;
            var unit_price = data[i].unit_price;
            var qty = data[i].qty;
            var sub_total = data[i].sub_total;

            //storing data in html variable

            html += "<tr>";
            html += "<td '>"+item_name+"</td>";
            html += "<td style='text-align:right'>"+formatter.format(unit_price)+"</td>";
            html += "<td style='text-align:right'>"+qty+"</td>";
            html += "<td style='text-align:right'>"+formatter.format(sub_total)+"</td>";
            html += "</tr>";

        }

        //replace <tbody> value

        document.getElementById("data_").innerHTML = html;
    }
}

</script>