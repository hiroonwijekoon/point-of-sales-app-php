<!DOCTYPE html>
<html>
<head>
	<title>Employee Manager</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="../Stylesheets/employee_manager.css">
  <?php include '../PHP/check_login.php' ?>
</head>
<body>
<div class="sidenav">
  		<a href="../../index.php"><i class="fas fa-tachometer-alt"></i> &nbsp Dashboard<i class="fas fa-chevron-right chevron"></i></a>
  		<a href="cash_invoice.php"><i class="fa fa-th" aria-hidden="true"></i> &nbsp POS <i class="fas fa-chevron-right chevron"></i></a>
  		<a href="inventory.php"><i class="fas fa-warehouse"></i> &nbsp Inventory <i class="fas fa-chevron-right chevron"></i></a>
		<a href="customer_manager.php"><i class="fas fa-user-tie"></i> &nbsp Customers <i class="fas fa-chevron-right chevron"></i></a>
		<a href="employee_manager.php" class="active_link"><i class="fas fa-people-carry"></i> &nbsp Employees </a>
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
        			  <a class="dropdown-item" href="login.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbspLogout</a>
        			</div>
      			</li>
      		</ul>
  		</div>
</nav>
<div class="container-fluid body_content">
        <br>
		<img class="img-responsive heading_image" src="https://img.icons8.com/fluent/48/000000/workers-male.png"/>&nbsp<span id="heading">Employee Manager</span><br><br>
		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-right:20px;">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php"><i class="fas fa-home"></i>&nbsp&nbspHome</a></li>
          <li class="breadcrumb-item"><span>Employees</span></li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->
	  <br>
		<div class="row">
			<div class="col-sm-8">
			<i class="fas fa-search"></i>&nbsp&nbsp&nbsp<input id="search_text" type="text" placeholder="Search" class="form-control search_text"></span>
		  	</div>
		  	<div class="col-sm-4">
		  		<a href="add_employee.php"><button type="button" class="float-right btn btn-outline-info add_button"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp&nbspAdd</button></a>
		  	</div>
		<br><br><br>
</div>

<div class="table_area container-fluid"><br>
		<table class="table table-hover">
    		<thead>
     			<tr>
     			  <th style="width: 12vw;">Full Name</th>
     			  <th style="width: 12vw;">Address Line 1</th>
     			  <th style="width: 12vw;">Address Line 2</th>
     			  <th style="width: 12vw;">City</th>
     			  <th style="width: 12vw;">Contact Number 1</th>
     			  <th style="width: 12vw;min-width: 120px;"><center><a href="employee_manager.php"><button class="btn btn-outline-secondary"><i class="fas fa-redo"></i>&nbsp&nbspRefresh</button></a></center></th>
     			</tr>
    		</thead>
    		<tbody id="data_">
    		</tbody>
  		</table><br>
  		</div>
	</div>
</body>
</html>

<script>
document.getElementById("search_text").addEventListener("keyup",loadSearchResults);
loadSearchResults();
function loadSearchResults()
{
	//call ajax
	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "../API/searchEmployees.php";
	var asynchronous = true;

	ajax.open(method,url,asynchronous);
	ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//send ajax request
	ajax.send("keyword="+document.getElementById("search_text").value);

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
				var empID = data[i].empID;
				var empName = data[i].empName;
				var Address1 = data[i].Address1;
				var Address2 = data[i].Address2;
				var City = data[i].City;
				var Contact1 = data[i].Contact1;

				//storing data in html variable

				html += "<tr>";
				html += "<td>"+empName+"</td>";
				html += "<td>"+Address1+"</td>";
				html += "<td>"+Address2+"</td>";
				html += "<td>"+City+"</td>";
				html += "<td>"+Contact1+"</td>";
				html += "<td><center><a href='employee_details.php?emp_id="+empID+"'><button class='btn btn-outline-warning'><i class='fa fa-eye' aria-hidden='true'></i></button></a>&nbsp&nbsp&nbsp<a href='../PHP/delete_employee.php?emp_id="+empID+"'><button class='btn btn-outline-danger'><i class='far fa-trash-alt'></i></button></a></center></td>";
				html += "</tr>";

			}

			//replace <tbody> value

			document.getElementById("data_").innerHTML = html;
		}
	}
	
}
</script>


