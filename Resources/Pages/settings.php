<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
		
	<link rel="stylesheet" type="text/css" href="../Stylesheets/settings.css">
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
		<a href="sales.php"><i class="fas fa-chart-line"></i> &nbsp Sales <i class="fas fa-chevron-right chevron"></i></a>
		<a href="./settings.php" class="active_link"><i class="fas fa-tools"></i> &nbsp Settings</a>
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
		<img class="img-responsive heading_image" src="https://img.icons8.com/color/48/000000/settings--v2.png"/><span id="heading">Settings</span><br><br>
		<div class="settings_card">
            <div class="container">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
          <li class="breadcrumb-item"><span>Settings</span></li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->

      <div class="row gutters-sm">
        <div class="col-md-4 d-none d-md-block">
          <div class="card">
            <div class="card-body">
              <nav class="nav flex-column nav-pills nav-gap-y-1">
                <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card mr-2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>Dashboard Settings
                </a>
                <a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings mr-2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>Lists Settings
                </a>
                <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield mr-2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>Log
                </a>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header border-bottom mb-3 d-flex d-md-none">
              <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                <li class="nav-item">
                  <a href="#profile" data-toggle="tab" class="nav-link has-icon active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
                </li>
                <li class="nav-item">
                  <a href="#account" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a>
                </li>
                <li class="nav-item">
                  <a href="#security" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></a>
                </li>
                <li class="nav-item">
                  <a href="#notification" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></a>
                </li>
                <li class="nav-item">
                  <a href="#billing" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
                </li>
              </ul>
            </div>
            <div class="card-body tab-content">
              <div class="tab-pane active" id="profile">
                <h6>DASHBOARD SETTINGS</h6>
                <hr>
                <form>
                  <div class="form-group">
                    <label for="SalesChartType">Sales Chart Type</label>
                    <select class="form-control" id="sales_chart">
                        <option value="line">Line Chart</option>
                        <option value="bar">Bar Chart</option>
                        <option value="radar">Radar Chart</option>
                        <option value="doughnut">Doughnut Chart</option>
                        <option value="pie">Pie Chart</option>
                        <option value="polarArea">Polar Area Chart</option>
                        <option value="bubble">Bubble Chart</option>
                        <option value="scatter">Scatter Chart</option>
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="inventoryChartType"> Inventory Chart Type</label>
                    <select class="form-control" id="inventory_chart">
                    <option value="line" >Line Chart</option>
                        <option value="bar">Bar Chart</option>
                        <option value="radar">Radar Chart</option>
                        <option value="doughnut">Doughnut Chart</option>
                        <option value="pie">Pie Chart</option>
                        <option value="polarArea">Polar Area Chart</option>
                        <option value="bubble">Bubble Chart</option>
                        <option value="scatter">Scatter Chart</option>
                    </select>
                  </div>
                  <button type="button" class="btn btn-primary" id="update_dash">Update Changes</button>
                </form>
              </div>
              <div class="tab-pane" id="account">
                <h6>LISTS SETTINGS</h6>
                <hr>
                <form>
                <div class="list_area card">
                  <h6><i class="fas fa-shield-alt"></i>&nbsp&nbspBrands List</h6>
                  <br>
                    <div class="row">
                      <div class="col-sm-3">
                        <label>Add Item</label>
                      </div>
                      <div class="col-sm-7">
                        <input type="text" name="input" class="form-control">
                      </div>
                      <div class="col-sm-2">
                        <button class="btn btn-outline-success">Add</button>
                      </div>
                      </div>
                      <br>
                      <div class="table_area">
                        <table class="table table-hover list_table">
                          <thead>
                            <tr><th>List of Brands</th></tr>
                          </thead>
                          <tbody>
                          <?php
                            include '../PHP/connect.php';
                            $sql = "SELECT * FROM brands";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0)
                            {
                              while($row=mysqli_fetch_assoc($result))
                              {
                                echo "<tr><td>".$row["brand_name"]."<button style='float:right' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
                              }
                            }
                          ?>
                          </tbody>
                      </div>
                      </table>
                    </div>
                  </div>

                  <br><br>

                  <div class="list_area card">
                  <h6><i class="fas fa-expand-arrows-alt"></i>&nbsp&nbspBrands List</h6>
                  <br>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Add Item</label>
                    </div>
                    <div class="col-sm-7">
                      <input type="text" name="input" class="form-control">
                    </div>
                    <div class="col-sm-2">
                      <button class="btn btn-outline-success">Add</button>
                    </div>
                </div>
                <br>
                <div class="table_area">
                  <table class="table table-hover list_table">
                    <thead>
                      <tr><th>List of Sizes</th></tr>
                    </thead>
                    <tbody>
                    <?php
                      include '../PHP/connect.php';
                      $sql = "SELECT * FROM sizes";
                      $result = mysqli_query($conn,$sql);
                      if(mysqli_num_rows($result)>0)
                      {
                        while($row=mysqli_fetch_assoc($result))
                        {
                          echo "<tr><td>".$row["size"]."<button style='float:right' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
                        }
                      }
                    ?>
                    </tbody>
                      </div>
                      </table>
                    </div>
                  </div>

                  <br><br>

                  <div class="list_area card">
                  <h6><i class="fas fa-boxes"></i>&nbsp&nbspCategories List</h6>
                  <br>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Add Item</label>
                    </div>
                    <div class="col-sm-7">
                      <input type="text" name="input" class="form-control">
                    </div>
                    <div class="col-sm-2">
                      <button class="btn btn-outline-success">Add</button>
                    </div>
                </div>
                <br>
                <div class="table_area">
                  <table class="table table-hover list_table">
                    <thead>
                      <tr><th>List of Sizes</th></tr>
                    </thead>
                    <tbody>
                    <?php
                      include '../PHP/connect.php';
                      $sql = "SELECT * FROM categories";
                      $result = mysqli_query($conn,$sql);
                      if(mysqli_num_rows($result)>0)
                      {
                        while($row=mysqli_fetch_assoc($result))
                        {
                          echo "<tr><td>".$row["category"]."<button style='float:right' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
                        }
                      }
                    ?>
                    </tbody>
                      </div>
                      </table>
                    </div>
                  </div>

                </form>
              </div>
              <div class="tab-pane" id="security">
                <h6>Log</h6>
                <hr>
                <form>
                  
                </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>

    </div>
        </div>
    </div>
</body>
</html>
<script>
    //get config
    //set sales chart
    var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "../API/getConfig.php?config=SALES_CHART";
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

    //set inventory chart
    var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "../API/getConfig.php?config=INVENTORY_CHART";
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

    //save dashboard changes
    function saveDash()
    {
        //save sales chart
        var ajax = new XMLHttpRequest();
	    var method = "GET";
	    var url = "../API/updateConfig.php?config=SALES_CHART&value="+document.getElementById("sales_chart").value;
	    var asynchronous = true;

        ajax.open(method,url,asynchronous);
        //send ajax request
        ajax.send();

        //recieve response
        ajax.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status== 200)
            {
                console.log(this.responseText);
            }
            
        }
        //save inventory chart
        var ajax = new XMLHttpRequest();
	    var method = "GET";
	    var url = "../API/updateConfig.php?config=INVENTORY_CHART&value="+document.getElementById("inventory_chart").value;
	    var asynchronous = true;

        ajax.open(method,url,asynchronous);
        //send ajax request
        ajax.send();

        //recieve response
        ajax.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status== 200)
            {
                console.log(this.responseText);
            }
            
        }

        alert("Configuration Upated");
    }
    document.getElementById("update_dash").addEventListener("click", function() {
    saveDash(); 
    });
    


</script>