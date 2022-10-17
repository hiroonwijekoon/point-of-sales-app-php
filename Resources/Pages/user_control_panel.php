<!DOCTYPE html>
<html>
<head>
	<title>User Control Panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="../Stylesheets/user_control_panel.css">
  <?php include '../PHP/check_login.php' ?>
</head>
<body>
<div class="sidenav">
  		<a href="../../index.php"><i class="fas fa-tachometer-alt"></i> &nbsp Dashboard<i class="fas fa-chevron-right chevron"></i></a>
  		<a href="cash_invoice.php"><i class="fa fa-th" aria-hidden="true"></i> &nbsp POS <i class="fas fa-chevron-right chevron"></i></a>
  		<a href="inventory.php"><i class="fas fa-warehouse"></i> &nbsp Inventory <i class="fas fa-chevron-right chevron"></i></a>
		<a href="customer_manager.php"><i class="fas fa-user-tie"></i> &nbsp Customers<i class="fas fa-chevron-right chevron"></i></a>
		<a href="employee_manager.php"><i class="fas fa-people-carry"></i> &nbsp Employees <i class="fas fa-chevron-right chevron"></i></a>
		<a href="user_control_panel.php" class="active_link"><i class="fas fa-users-cog"></i> &nbsp Users</a>
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
      			<li class="nav-item">
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
        			  <a class="dropdown-item" href="../PHP/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbspLogout</a>
        			</div>
      			</li>
      		</ul>
  		</div>
	</nav>
  <?php 
  if(isset($_GET['user_exist']))
  {
       echo '
        <div class="alert alert-danger alert-dismissible" id="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span id="alert_text"><strong>Username already exist!</strong>&nbspCheck current usernames from below list and use a new username</span>
        </div>
      ';
  }
  ?>
	<div class="container-fluid body_content">
		<br>
		<img class="img-responsive heading_image" src="https://img.icons8.com/fluent/48/000000/group.png"/><span id="heading">User Control Panel</span><br><br>
		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-right:20px;">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
          <li class="breadcrumb-item"><span>Users</span></li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->
	<br>
		<div class="row">
			<div class="col-sm-8">
				<i class="fas fa-search"></i>&nbsp&nbsp&nbsp<input id="search_text" type="text" placeholder="Search" class="form-control search_text"></span>
		  	</div>
		  	<div class="col-sm-4">
		  		<button type="button" class="float-right btn btn-outline-info add_button" data-toggle="modal" data-target="#add_new_modal"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp&nbspAdd New</button>
		  	</div>
		<br><br><br>
		<div class="table_area container-fluid"><br>
		<table class="table table-hover">
    		<thead>
     			<tr>
     			  <th style="width: 12vw;">Name</th>
     			  <th style="width: 12vw;">Username</th>
     			  <th style="width: 12vw;">Account Type</th>
     			  <th style="width: 12vw;">Created Date and Time</th>
     			  <th style="width: 12vw;min-width: 120px;"><center><a href="user_control_panel.php"><button class="btn btn-outline-secondary"><i class="fas fa-sync-alt"></i>&nbsp&nbspRefresh</button></a></center></th>
     			</tr>
    		</thead>
    		<tbody id="data_">
    		</tbody>
  		</table><br>
  		</div>
	</div>
</body>
</html>
<div class="modal" id="add_new_modal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp&nbspAdd New User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger alert-dismissible" id="alert_validate" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span id="alert_validate_text"></span>
        </div>
      	<form action="../PHP/add_new_user.php" method="POST" name="add_user_form">
        <center><table class="table table-borderless table_add_new">
        	<tbody>
        		<tr><td><label>Name:</label></td><td style='width:150px;'><input type="text" name="full_name" class="form-control" required=""></td></tr>
        		<tr><td><label>Username:</label></td><td><input type="text" name="username" id="username" class="form-control" required=""></td></tr>
        		<tr><td><label>Password</label></td><td><input type="Password" name="password" class="form-control" required=""></td></tr>
        		<tr><td><label>Verify Password:</label></td><td><input type="Password" name="confirm_password" class="form-control" required=""></td></tr>
        		<tr><td><label>Account Type:</label></td><td><select name="acc_type" class="form-control"><option value="Administrator">Administrator</option><option value="Standard">Standard</option></select>
        	</tbody>
        </table></center>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbspSubmit</button>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbspClose</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal" id="update">
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp&nbspAdd New User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger alert-dismissible" id="alert_validate" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span id="alert_validate_text"></span>
        </div>
      	<form>
        <center><table class="table table-borderless table_add_new">
        	<tbody>
				<input type="hidden" id="temp_id"><br>
        		<tr><td><label>Name:*</label></td><td style='width:150px;'><input type="text" id="full_name_" name="full_name" class="form-control" required=""></td></tr>
        		<tr><td><label>Username:*</label></td><td><input type="text" name="username" id="username_" class="form-control" required=""></td></tr>
				<tr><td><label>Old Password:*</label></td><td><input type="Password" id="old_password_" name="old_password" class="form-control" required=""></td></tr>
        		<tr><td><label>New Password:</label></td><td><input type="Password" id="password_" name="password" class="form-control" required=""></td></tr>
        		<tr><td><label>Verify Password:</label></td><td><input type="Password" id="confirm_password_" name="confirm_password" class="form-control" required=""></td></tr>
        		<tr><td><label>Account Type:*</label></td><td><select name="acc_type" id="acc_type_" class="form-control"><option value="Administrator">Administrator</option><option value="Standard">Standard</option></select>
        	</tbody>
        </table></center>
      </div>
      <div class="modal-footer">
      	<button id="updateButton" type="button" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbspSubmit</button>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbspClose</button>
      </div>
      </form>
    </div>
  </div>
</div>



<script type="text/javascript">
	$('#update').on('show.bs.modal', function (e){
		var temp = $(e.relatedTarget).attr('data-id');
		var splitted_text = temp.split("-");
		document.getElementById("temp_id").value= splitted_text[0];
		document.getElementById("full_name_").value= splitted_text[1];
		document.getElementById("username_").value= splitted_text[2];
		document.getElementById("acc_type_").value= splitted_text[3];
	})
</script>
<script>
	let updateButton = document.getElementById("updateButton");

	updateButton.addEventListener("click", function() {

		var fullname_=document.getElementById("full_name_").value;
		var username_=document.getElementById("username_").value;
		var old_password_=document.getElementById("old_password_").value;
		var password_=document.getElementById("password_").value;
		var confirm_password=document.getElementById("confirm_password_").value;
		var acc_type_=document.getElementById("acc_type_").value;
		if(document.getElementById("username_").style.borderColor == "red")
		{
			alert("Username unavailable. Please enter a different one.");
		}
		else
		{
			if(fullname_ && username_ && old_password_ && acc_type_)
			{
				//calling ajax
				var ajax = new XMLHttpRequest();
				var method = "POST";
				var url = "../API/checkPassword.php";
				var asynchronous = true;

				ajax.open(method,url,asynchronous);
				ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				//send ajax request
				ajax.send("old_password="+old_password_+"&user_id="+document.getElementById("temp_id").value);

				ajax.onreadystatechange = function()
				{
					if(this.readyState == 4 && this.status== 200)
					{
						if(this.responseText=="true")
						{
							if(password_!="" && confirm_password!="")
							{
								if(password_==confirm_password)
								{
									//calling ajax
									var ajax = new XMLHttpRequest();
									var method = "POST";
									var url = "../API/updateUser.php";
									var asynchronous = true;

									ajax.open(method,url,asynchronous);
									ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
									//send ajax request
									ajax.send("full_name="+fullname_+"&username="+username_+"&acc_type="+acc_type_+"&user_id="+document.getElementById("temp_id").value+"&password="+password_);
									ajax.onreadystatechange = function()
									{
										if(this.readyState == 4 && this.status== 200)
										{
											if(this.responseText="true")
											{
												
												window.location.replace("./user_control_panel.php");
											}
											else
											{
												console.log(this.responseText);
											}
										}
									}
								}
								else
								{
									alert("Passwords don't match. Please try again.");
								}
							}
							else
							{
								//calling ajax
								var ajax = new XMLHttpRequest();
								var method = "POST";
								var url = "../API/updateUser.php";
								var asynchronous = true;

								ajax.open(method,url,asynchronous);
								ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
								//send ajax request
								ajax.send("full_name="+fullname_+"&username="+username_+"&acc_type="+acc_type_+"&user_id="+document.getElementById("temp_id").value);
								ajax.onreadystatechange = function()
								{
									if(this.readyState == 4 && this.status== 200)
									{
										if(this.responseText="true")
										{
											window.location.replace("./user_control_panel.php");
										}
										else
										{
											console.log(this.responseText);
										}
									}
								}
							}
						}
						else
						{
							alert("Wrong Password. Please try again.");
						}
					}   
				}
			}
			else
			{
				alert("Please fill all the required fields.");
			}
		}
		
	

	});



	//check username availability
$(document).ready(function(){

	$("#username_").keyup(function(){

		var username = $(this).val();

		console.log(username);
	if(username != '')
	{

							//calling ajax
							var ajax = new XMLHttpRequest();
							var method = "GET";
							var url = "../API/checkUsername.php?username="+username;
							var asynchronous = true;

							ajax.open(method,url,asynchronous);
							//send ajax request
							ajax.send();
							ajax.onreadystatechange = function()
							{
								if(this.readyState == 4 && this.status== 200)
								{
									if(this.responseText=="true")
									{
										document.getElementById("username_").style.borderColor = "red";
									}
									else
									{
										document.getElementById("username_").style.borderColor = "green";
									}
								}
							}
	}

	});

});
	
</script>

<script>
document.getElementById("search_text").addEventListener("keyup",loadSearchResults);

loadSearchResults();
function loadSearchResults()
{
	//call ajax
	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "../API/searchUsers.php";
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
				var user_id = data[i].user_id;
				var full_name = data[i].full_name;
				var username = data[i].username;
				var acc_type = data[i].acc_type;
				var created_date = data[i].created_date;

				//storing data in html variable

				html += "<tr>";
				html += "<td>"+full_name+"</td>";
				html += "<td>"+username+"</td>";
				html += "<td>"+acc_type+"</td>";
				html += "<td>"+created_date+"</td>";
				html += "<td><center><button class='btn btn-outline-warning' data-toggle='modal' data-target='#update' data-id='"+user_id+"-"+full_name+"-"+username+"-"+acc_type+"'><i class='fas fa-user-edit'></i></button>&nbsp&nbsp&nbsp<a href='../PHP/delete_user.php?user_id="+user_id+"'><button class='btn btn-outline-danger'><i class='far fa-trash-alt'></i></button></a></center></td>";
				html += "</tr>";

			}

			//replace <tbody> value

			document.getElementById("data_").innerHTML = html;
		}
	}
	
}
</script>