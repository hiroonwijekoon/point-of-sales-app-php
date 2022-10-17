<!DOCTYPE html>
<html>
<head>
	<title>Sales</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
		
	<link rel="stylesheet" type="text/css" href="../Stylesheets/sales.css">
	<?php include '../PHP/check_login.php' ?>
</head>
<body>
<div class="sidenav">
  		<a href="../../index.php"><i class="fas fa-tachometer-alt"></i> &nbsp Dashboard <i class="fas fa-chevron-right chevron"></i></a>
  		<a href="cash_invoice.php"><i class="fa fa-th" aria-hidden="true"></i> &nbsp POS <i class="fas fa-chevron-right chevron"></i></a>
  		<a href="inventory.php"><i class="fas fa-warehouse"></i> &nbsp Inventory<i class="fas fa-chevron-right chevron"></i></a>
		<a href="customer_manager.php"><i class="fas fa-user-tie"></i> &nbsp Customers <i class="fas fa-chevron-right chevron"></i></a>
		<a href="employee_manager.php"><i class="fas fa-people-carry"></i> &nbsp Employees <i class="fas fa-chevron-right chevron"></i></a>
		<a href="user_control_panel.php"><i class="fas fa-users-cog"></i> &nbsp Users <i class="fas fa-chevron-right chevron"></i></a>
		<a href="sales.php" class="active_link"><i class="fas fa-chart-line"></i> &nbsp Sales </a>
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
        			  <a class="dropdown-item" href="login.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbspLogout</a>
        			</div>
      			</li>
      		</ul>
  		</div>
	</nav>

	<div class="container-fluid body_area body_content">
		<br>
		<img class="img-responsive heading_image" src="https://img.icons8.com/color/48/000000/total-sales-1.png"/><span id="heading">Sales</span><br><br>
		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-right:20px;">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
          <li class="breadcrumb-item"><span>Sales</span></li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->
	<br>
		<div class="search_box">
			<div class="row">
				<div class="col">
					<i class="fas fa-search"></i>&nbsp&nbsp&nbsp<input id="search_text" type="text" placeholder="Search" class="form-control search_text"></span>
				</div>
				<div class="col">
					From : &nbsp&nbsp<input type="date" id="fromDate" class="form-control search_text"></span>
				</div>
				<div class="col">
					To : &nbsp&nbsp<input type="date" id="toDate" class="form-control search_text"></span>
				</div>
			</div>
		
		</div>
		<br>
		<div class="table_area"><br>
		<table class="table table-hover">
    		<thead>
     			<tr>
     			  <th>Invoice ID</th>
     			  <th>Customer</th>
     			  <th>Total</th>
     			  <th>Discount</th>
     			  <th>Total Payable</th>
     			  <th>Invoice Date and Time</th>
     			  <th><center><a href="./sales.php"><button class="btn btn-outline-secondary"><i class="fas fa-sync"></i>&nbsp&nbspRefresh</button></a></center></th>
     			</tr>
    		</thead>
    		<tbody id="data_">
    		</tbody>
  		</table><br>
  		</div>
	</div>
</div>
</body>
</html>
<script>
//Set Date Picker Values
var date = new Date();
date.setDate(date.getDate()+1);
var datePre = new Date();
datePre.setMonth(datePre.getMonth() - 1);
var currentDate = date.toISOString().substring(0,10);
var PreDate = datePre.toISOString().substring(0,10);
document.getElementById("fromDate").value=PreDate;
document.getElementById("toDate").value=currentDate;

//Money Formatter
var formatter = new Intl.NumberFormat('en-US', {
style: 'currency',
currency: 'LKR',

  // These options are needed to round to whole numbers if that's what you want.
  //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
  //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
});



//Load Invoices List

//call ajax
var ajax = new XMLHttpRequest();
var method = "POST";
var url = "../API/getInvoicesList.php";
var asynchronous = true;

ajax.open(method,url,asynchronous);
ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//send ajax request
ajax.send("date_from="+document.getElementById("fromDate").value+"&date_to="+document.getElementById("toDate").value);

//recieve response
ajax.onreadystatechange = function()
{
    if(this.readyState == 4 && this.status== 200)
    {
        //Convert JSON back to an array
        var data = JSON.parse(this.responseText);

        //html value for <tbody>
        var html = "";

        //loop through data
        for(var i=0;i<data.length;i++)
        {
            var invoice_id = data[i].invoice_id;
            var cus_name = data[i].cus_name;
            var total = data[i].total;
            var discount = data[i].discount;
            var total_payable = data[i].total_payable;
            var date_time = data[i].date_time;

            //storing data in html variable

            html += "<tr>";
            html += "<td>"+invoice_id+"</td>";
            html += "<td>"+cus_name+"</td>";
            html += "<td>"+formatter.format(total)+"</td>";
            html += "<td>"+formatter.format(discount)+"</td>";
            html += "<td>"+formatter.format(total_payable)+"</td>";
            html += "<td>"+date_time+"</td>";
            html += "<td><center><a href='./invoice_details.php?invoice_id="+invoice_id+"'><button class='btn btn-warning'><i class='fas fa-chevron-right'></i></button></center></a></td>";
            html += "</tr>";

        }

        //replace <tbody> value

        document.getElementById("data_").innerHTML = html;
    }
}


document.getElementById("search_text").addEventListener("keyup",loadSearchResults);

function loadSearchResults()
{
	//call ajax
	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "../API/searchInvoices.php";
	var asynchronous = true;

	ajax.open(method,url,asynchronous);
	ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//send ajax request
	ajax.send("keyword="+document.getElementById("search_text").value+"&date_from="+document.getElementById("fromDate").value+"&date_to="+document.getElementById("toDate").value);

	//recieve response
	ajax.onreadystatechange = function()
	{
		if(this.readyState == 4 && this.status== 200)
		{
			//Convert JSON back to an array
			var data = JSON.parse(this.responseText);

			//html value for <tbody>
			var html = "";

			//loop through data
			for(var i=0;i<data.length;i++)
			{
				var invoice_id = data[i].invoice_id;
				var cus_name = data[i].cus_name;
				var total = data[i].total;
				var discount = data[i].discount;
				var total_payable = data[i].total_payable;
				var date_time = data[i].date_time;

				//storing data in html variable

				html += "<tr>";
				html += "<td>"+invoice_id+"</td>";
				html += "<td>"+cus_name+"</td>";
				html += "<td>"+formatter.format(total)+"</td>";
				html += "<td>"+formatter.format(discount)+"</td>";
				html += "<td>"+formatter.format(total_payable)+"</td>";
				html += "<td>"+date_time+"</td>";
				html += "<td><center><a href='./invoice_details.php?invoice_id="+invoice_id+"'><button class='btn btn-warning'><i class='fas fa-chevron-right'></i></button></center></a></td>";
				html += "</tr>";

			}

			//replace <tbody> value

			document.getElementById("data_").innerHTML = html;
		}
	}
	
}

</script>
