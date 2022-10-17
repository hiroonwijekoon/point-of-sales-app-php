<html>
	<head>
		<title>Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="./Resources/Stylesheets/index.css">
		<script type="text/javascript" src="./Resources/Javascripts/digital_clock.js"></script>
		<?php include './Resources/PHP/check_login.php' ?>
	</head>
	<body onload="startTime()">
	<div class="sidenav">
  		<a href="index.php" class="active_link"><i class="fas fa-tachometer-alt"></i> &nbsp Dashboard</a>
  		<a href="./Resources/Pages/cash_invoice.php"><i class="fa fa-th" aria-hidden="true"></i> &nbsp POS <i class="fas fa-chevron-right chevron"></i></a>
  		<a href="./Resources/Pages/inventory.php"><i class="fas fa-warehouse"></i> &nbsp Inventory <i class="fas fa-chevron-right chevron"></i></a>
		<a href="./Resources/Pages/customer_manager.php"><i class="fas fa-user-tie"></i> &nbsp Customers <i class="fas fa-chevron-right chevron"></i></a>
		<a href="./Resources/Pages/employee_manager.php"><i class="fas fa-people-carry"></i> &nbsp Employees <i class="fas fa-chevron-right chevron"></i></a>
		<a href="./Resources/Pages/user_control_panel.php"><i class="fas fa-users-cog"></i> &nbsp Users <i class="fas fa-chevron-right chevron"></i></a>
		<a href="./Resources/Pages/sales.php"><i class="fas fa-chart-line"></i> &nbsp Sales <i class="fas fa-chevron-right chevron"></i></a>
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
        			  <a class="dropdown-item" href="./Resources/PHP/logout.php"><i class="fas fa-sign-out-alt"></i>&nbspLogout</a>
        			</div>
      			</li>
      		</ul>
  		</div>
	</nav>
	<div class="row body_content">
				<div class="loader_area" id="loader_area">
					<div class="loading">Loading&#8230;</div>
					<br>
					<h4>Please Wait</h4>
				</div>
		<div class="col-sm-8">
			<div class="left_side">
				<h4 style="margin-bottom:15px;">Quick Links</h4>
			<div class="row">
				<div class="col">
					<a href="./Resources/Pages/cash_invoice.php"><button class="btn btn-outline-dark"><center><img src="https://img.icons8.com/color/48/000000/activity-grid-2.png"/></center>POS</button></a><br><br>
				</div>
				<div class="col">
					<a href="./Resources/Pages/inventory.php"><button class="btn btn-outline-dark"><center><img src="https://img.icons8.com/plasticine/48/000000/warehouse-1.png"/></center>Inventory</button></a><br><br>
				</div>
				<div class="col">
					<a href="./Resources/Pages/customer_manager.php"><button class="btn btn-outline-dark"><center><img src="https://img.icons8.com/bubbles/48/000000/man-with-orange-tie.png"/></center>Customers</button></a><br><br>
				</div>
				<div class="col">
					<a href="./Resources/Pages/employee_manager.php"><button class="btn btn-outline-dark"><center><img src="https://img.icons8.com/fluent/48/000000/workers-male.png"/></center>Employees</button></a><br><br>
				</div>				
				<div class="col">
					<a href="./Resources/Pages/user_control_panel.php"><button class="btn btn-outline-dark"><center><img src="https://img.icons8.com/cotton/48/000000/user-settings.png"/></center>Users</button></a><br><br>
				</div>
			</div>
			</div>

			<div class="charts_area">
				<h6>Sales Chart (Last 6 Months)</h6><br>
				<center><canvas id="myChart" width="200" height="200"></canvas></center>
				<br>
			</div>
			<br>

			<div class="charts_area">
				<h6>Inventory Chart</h6>
				<br>
				<center><canvas id="myChart2" width="200" height="200"></canvas></center>
				<br>
			</div>
		
		</div>
		<div class="col-sm-4">
			<div class="clock_card">
				<div class="clock">
					<div class="hourHand"></div>
					<div class="minuteHand"></div>
					<div class="secondHand"></div>
					<div class="center"></div>
					<ul>
						<li><span>1</span></li>
						<li><span>2</span></li>
						<li><span>3</span></li>
						<li><span>4</span></li>
						<li><span>5</span></li>
						<li><span>6</span></li>
						<li><span>7</span></li>
						<li><span>8</span></li>
						<li><span>9</span></li>
						<li><span>10</span></li>
						<li><span>11</span></li>
						<li><span>12</span></li>
					</ul>
				</div>
				<script type="text/javascript" src="./Resources/Javascripts/analog_clock.js"></script>
				<center><span id="day_">Day</span><br></center>
				<center><span id="date_">Date</span></center>
				
			</div>
			<div class="location_details">
					<label><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp&nbspBranch Name:</label>&nbsp<span>New Victory Motors - Mahiyanganaya</span><br>
					<label><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp&nbspLocation:</label>&nbsp<span>Mahiyanganaya</span><br>
					<label><i class="fa fa-user" aria-hidden="true"></i>&nbsp&nbspLogged in user:</label>&nbsp<span>hiroon123</span><br>
					<label><i class="fas fa-business-time"></i>&nbsp&nbspLogged in time:</label>&nbsp<span>16:30:22 9/5/2021</span><br>
			</div>
			<div class="numbers_area">
				<br>
					<div class="card-counter primary">
						<i class="fas fa-chart-line"></i>
						<span class="count-numbers" id="count-sales">0</span>
						<span class="count-name">Monthly Sales</span>
					</div>
					<br>
					<div class="card-counter success">
						<i class="fas fa-cubes"></i>
						<span class="count-numbers"  id="count-stock">0</span>
						<span class="count-name">Stock</span>
					</div>
					<br>
					<div class="card-counter info">
						<i class="fa fa-users"></i>
						<span class="count-numbers"  id="count-customers">0</span>
						<span class="count-name">Customers</span>
					</div>
					<br>
					<div class="card-counter danger">
						<i class="fas fa-walking"></i>
						<span class="count-numbers"  id="count-employees">0</span>
						<span class="count-name">Employees</span>
					</div>
					<br>

			</div>
			</div>
			<div style="display:none;">
				<input type="text" id="m1Value">
				<input type="text" id="m2Value">
				<input type="text" id="m3Value">
				<input type="text" id="m4Value">
				<input type="text" id="m5Value">
				<input type="text" id="m6Value" value="32500">
				<input type="text" id="sales_chart" value="">
				<input type="text" id="inventory_chart" value="">
			</div>
		</div>
	</div>
</body>
</html>



<script type="text/javascript">
	function loadBrand()
	{
		document.getElementById("title").innerHTML = "<i class='fa fa-font-awesome' aria-hidden='true'></i>&nbsp&nbspEdit Brands List";
	}
	function loadSize()
	{
		document.getElementById("title").innerHTML = "<i class='fa fa-arrows-alt' aria-hidden='true'></i>&nbsp&nbspEdit Sizes List";
	}
	function loadCategory()
	{
		document.getElementById("title").innerHTML = "<i class='fa fa-list-alt' aria-hidden='true'></i>&nbsp&nbspEdit Categories List";
	}
</script>

<!-- Chart Configurations -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" crossorigin="anonymous"></script>
<script type="text/javascript">
//Money Formatter
var formatter = new Intl.NumberFormat('en-US', {
style: 'currency',
currency: 'LKR',

  // These options are needed to round to whole numbers if that's what you want.
  //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
  //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
});

//get ChartTypes
//Sales Chart
//call ajax
	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./Resources/API/getConfig.php?config=SALES_CHART";
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
			document.getElementById("sales_chart").value=data;
		}
		
	}

	//Inventory Chart
	//call ajax
	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./Resources/API/getConfig.php?config=INVENTORY_CHART";
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
			document.getElementById("inventory_chart").value=data;
		}
		
	}


//Configure Axis
var months = ["","January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var d = new Date();
var m1 = d.getMonth();
var m2 = d.getMonth()-1;
var m3 = d.getMonth()-2;
var m4 = d.getMonth()-3;
var m5 = d.getMonth()-4;
var m6 = d.getMonth()-5;
if(m1<0){m1 = 12+m1;}
if(m2<0){m2 = 12+m2;}
if(m3<0){m3 = 12+m3;}
if(m4<0){m4 = 12+m4;}
if(m5<0){m5 = 12+m5;}
if(m6<0){m6 = 12+m6;}

//getSalesTotal
function getSales(month,mTag)
{
	//call ajax
	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./Resources/API/getTotalSalesByMonth.php?month="+month;
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
			if(isNaN(parseInt(data))){data="0";};
			if(mTag=="m1") {document.getElementById("m1Value").value=data;document.getElementById("count-sales").innerHTML = formatter.format(data)};
			if(mTag=="m2") {document.getElementById("m2Value").value=data;};
			if(mTag=="m3") {document.getElementById("m3Value").value=data;};
			if(mTag=="m4") {document.getElementById("m4Value").value=data;};
			if(mTag=="m5") {document.getElementById("m5Value").value=data;};
			if(mTag=="m6") {document.getElementById("m5Value").value=data;};
		}
		
	}
	
}


//getInventoryData
function getInventoryList()
{
	//call ajax
	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./Resources/API/InventoryList.php";
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
			var labelName=new Array("1", "2", "3");
			var qtys=new Array("1", "2", "3");
			for(var i=0;i<data.length;i++)
			{
				var brand = data[i].brand;
				var category = data[i].category;
				var size = data[i].size;
				var qty = data[i].qty;
				labelName[i]= brand+"|"+size;
				qtys[i]=qty;
			}
			console.log(qtys);
			var myChart = document.getElementById('myChart2').getContext('2d');
			var massPopChart = new Chart(myChart, {
				type: document.getElementById("inventory_chart").value,
				data: {
					labels: labelName,
					datasets: [{
						label: '# of Sales',
						data: qtys,
						backgroundColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					scales: {
						y: {
							beginAtZero: true
						}
					}
				},
				legend:{
					display:false
				},
			});

		}
	}
	
}

getSales(++m1,"m1");
getSales(++m2,"m2");
getSales(++m3,"m3");
getSales(++m4,"m4");
getSales(++m5,"m5");
getSales(++m6,"m6");
getInventoryList();

setTimeout(function() { loadChart(); }, 1000);

var type_="pie";
function loadChart()
{
	document.getElementById("loader_area").style.display ="none";
	var m1Value =document.getElementById("m1Value").value;
	var m2Value =document.getElementById("m2Value").value;
	var m3Value =document.getElementById("m3Value").value;
	var m4Value =document.getElementById("m4Value").value;
	var m5Value =document.getElementById("m5Value").value;
	var m6Value =document.getElementById("m6Value").value;
	var myChart = document.getElementById('myChart').getContext('2d');
	var massPopChart = new Chart(myChart, {
		type: document.getElementById("sales_chart").value,
		data: {
			labels: [months[m6], months[m5], months[m4], months[m3], months[m2], months[m1]],
			datasets: [{
				label: '# of Sales',
				data: [m6Value, m5Value, m4Value, m3Value, m2Value,m1Value ],
				backgroundColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			responsive: true,
			scales: {
				y: {
					beginAtZero: true
				}
			}
		},
		legend:{
			display:false
		},
	});
}

//Date and Time
var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var day_index = d.getDay();
document.getElementById("day_").innerHTML = days[day_index];
document.getElementById("date_").innerHTML = d.getFullYear()+" / "+months[d.getMonth()+1]+" / "+d.getDate();


//load card values

//get Stock Count
//call ajax
var ajax = new XMLHttpRequest();
var method = "GET";
var url = "./Resources/API/noOfStocks.php";
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
			document.getElementById("count-stock").innerHTML = data;
		}
		
}

//get Customers Count
//call ajax
var ajax = new XMLHttpRequest();
var method = "GET";
var url = "./Resources/API/noOfCustomers.php";
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
			document.getElementById("count-customers").innerHTML = data;
		}
		
}

//get Employees Count
//call ajax
var ajax = new XMLHttpRequest();
var method = "GET";
var url = "./Resources/API/noOfEmployees.php";
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
			document.getElementById("count-employees").innerHTML = data;
		}
		
}

</script>
