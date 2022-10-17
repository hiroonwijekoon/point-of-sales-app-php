<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
		
	<link rel="stylesheet" type="text/css" href="../Stylesheets/inventory.css">
	<?php include '../PHP/check_login.php' ?>
</head>
<body>
<div class="sidenav">
  		<a href="../../index.php"><i class="fas fa-tachometer-alt"></i> &nbsp Dashboard <i class="fas fa-chevron-right chevron"></i></a>
  		<a href="cash_invoice.php"><i class="fa fa-th" aria-hidden="true"></i> &nbsp POS <i class="fas fa-chevron-right chevron"></i></a>
  		<a href="inventory.php"  class="active_link"><i class="fas fa-warehouse"></i> &nbsp Inventory</a>
		<a href="customer_manager.php"><i class="fas fa-user-tie"></i> &nbsp Customers <i class="fas fa-chevron-right chevron"></i></a>
		<a href="employee_manager.php"><i class="fas fa-people-carry"></i> &nbsp Employees <i class="fas fa-chevron-right chevron"></i></a>
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

	<div class="container-fluid body_area body_content">
		<br>
		<img class="img-responsive heading_image" src="https://img.icons8.com/fluent/48/000000/warehouse-1.png"/><span id="heading">Inventory</span><br><br>
		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-right:20px;">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php"><i class="fas fa-home"></i>&nbsp&nbspHome</a></li>
          <li class="breadcrumb-item"><span>Inventory</span></li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->
	<br>
		<div class="row">
			<div class="col-sm-8">
			<i class="fas fa-search"></i>&nbsp&nbsp&nbsp<input id="search_text" type="text" placeholder="Search" class="form-control search_text"></span>
		  	</div>
		  	<div class="col-sm-4">
		  		<button type="button" class="float-right btn btn-outline-info add_button" data-toggle="modal" data-target="#add_item_modal"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp&nbspAdd Item</button>&nbsp&nbsp
		  	</div>
		<br><br><br>
		<div class="table_area container-fluid"><br>
		<table class="table table-hover">
    		<thead>
     			<tr>
     			  <th>Size</th>
     			  <th>Brand</th>
     			  <th>Category</th>
     			  <th>Quantity</th>
     			  <th>Cost</th>
     			  <th>Selling Price</th>
     			  <th><center><a href="inventory.php"><button class="btn btn-outline-secondary"><i class="fas fa-sync"></i>&nbsp&nbspRefresh</button></a></center></th>
     			</tr>
    		</thead>
    		<tbody id="data_">
    		</tbody>
  		</table><br>
  		</div>
	</div>
</body>
</html>
<div class="modal" id="add_item_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp&nbspAdd Item</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger alert-dismissible" id="alert_validate" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span id="alert_validate_text"></span>
        </div>
      	<form action="../PHP/add_item.php" method="POST">
		<div class="container-fluid">
					<center><table class="table table-borderless table_add_new">
          				<tbody>
          				  <tr><td><label>Brand:</label></td><td>
							<select id="inventory" class="form-control" style="width:450px;" name="brand">
								<option selected  disabled>-- Select Item --</option>
								<?php
									include '../PHP/get_brands_list.php';
									if(mysqli_num_rows($result)>0)
										{
											while ($row = mysqli_fetch_assoc($result) )
											{
												echo "<option>$row[brand_name]</option>";
											}
										}
								?>
							</select>
							</td></tr>
          				  <tr><td><label>Category:</label></td><td>
							<select id="category" class="form-control" style="width:450px;"  name="category">
								<option selected  disabled>-- Select Item --</option>
								<?php
									include '../PHP/get_categories_list.php';
									if(mysqli_num_rows($result)>0)
										{
											while ($row = mysqli_fetch_assoc($result) )
											{
												echo "<option>$row[category]</option>";
											}
										}
								?>
							</select>
							</td></tr>
          				  <tr><td><label>Size</label></td><td>
							<select id="size" class="form-control" style="width:450px;" name="size">
								<option selected  disabled>-- Select Item --</option>
								<?php
									include '../PHP/get_sizes_list.php';
									if(mysqli_num_rows($result)>0)
										{
											while ($row = mysqli_fetch_assoc($result) )
											{
												echo "<option>$row[size]</option>";
											}
										}
								?>
							</select>
							</td></tr>
          				  <tr><td><label>Cost</label></td><td><input type="text" name="cost" class="form-control"></td></tr>
          				  <tr><td><label>Selling Price:</label></td><td><input type="text" name="selling_price" class="form-control"></td></tr>
						<tr><td><label>Quantity:</label></td><td><input type="text" name="quantity" class="form-control"></td></tr>
						</tbody>
					</table></center>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-lg btn-outline-success" style="float: right;margin-right: 10px;"><i class="fa fa-check" aria-hidden="true"></i>&nbspSave</button>
	</div>
		</form>
    </div>
  </div>
</div>


<div class="modal" id="updateqty">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>&nbsp&nbspUpdate Stock</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger alert-dismissible" id="alert_validate" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span id="alert_validate_text"></span>
        </div>
      	<form action="../PHP/update_inventory.php" method="GET" name="add_user_form">
      		<p id="temp_id" style="display: none;"></p><input type="text" name="store_id" class="form-control" id="store_id" style="display: none;">
      		<div class="row container">
      			<div class="col-sm-6">
      				<table class="update-modal-table">
      					<tbody>
      						<tr><td><label>Size:</label></td><td>
							  <select id="size_" name="size_" class="form-control" style="width:380px;">
								<?php
									include '../PHP/get_sizes_list.php';
									if(mysqli_num_rows($result)>0)
										{
											while ($row = mysqli_fetch_assoc($result) )
											{
												echo "<option>$row[size]</option>";
											}
										}
								?>
							</select></td></tr>
      						<tr><td><label>Brand:</label></td><td>
							  <select id="brand_" name="brand_"  class="form-control" style="width:380px;">
								<option selected  disabled>-- Select Item --</option>
								<?php
									include '../PHP/get_brands_list.php';
									if(mysqli_num_rows($result)>0)
										{
											while ($row = mysqli_fetch_assoc($result) )
											{
												echo "<option>$row[brand_name]</option>";
											}
										}
								?>
							</select></td></tr>
      						<tr><td><label>Category:</label></td><td>
							  <select id="cat_" class="form-control" style="width:380px;"  name="cat_" >
								<option selected  disabled>-- Select Item --</option>
								<?php
									include '../PHP/get_categories_list.php';
									if(mysqli_num_rows($result)>0)
										{
											while ($row = mysqli_fetch_assoc($result) )
											{
												echo "<option>$row[category]</option>";
											}
										}
								?>
							</select></td></tr>
      						<tr><td><label>Description:</label></td><td><textarea name="desc_"  class="form-control" id="desc_"></textarea></td></tr>
      					</tbody>
      				</table>
      			</div>
      			<div class="col-sm-6">
      				<table  class="update-modal-table">
      					<tbody>
      						<tr><td><label>Cost</label></td><td><input type="text" name="cost" class="form-control" id="cost"  style="text-align: right;"></td></tr>
      						<tr><td><label>Selling Price</label></td><td><input type="text" name="selling_price"  class="form-control" id="selling_price"  style="text-align: right;"></td></tr>
      					</tbody>
      				</table>
      				<br><br>
      				<table class="update-modal-table">
      					<tbody>
       						<tr><td><label>Current Quantity</label></td><td><input type="text" name="currentqty" class="form-control" id="qty" style="width: 100%;float: right;text-align: center;" readonly></td></tr>
      						<tr><td><label>Quantity Addition</label></td><td><input type="number" value="0" name="addition"  class="form-control" style="width: 100%;text-align: center;display:inline;margin-top:5px;float:right;"></td></tr>
      					</tbody>
      				</table>
      			</div>
      		</div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-outline-warning"><i class="fa fa-check" aria-hidden="true"></i>&nbspUpdate Inventory</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">

//Money Formatter
var formatter = new Intl.NumberFormat('en-US', {
style: 'currency',
currency: 'LKR',

  // These options are needed to round to whole numbers if that's what you want.
  //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
  //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
});

	$('#updateqty').on('show.bs.modal', function (e){
		var temp_id = $(e.relatedTarget).attr('data-id');
		document.getElementById("temp_id").innerHTML= temp_id;
		var splitted_text = temp_id.split("-");
		document.getElementById("store_id").value= splitted_text[0];
		document.getElementById("size_").value= splitted_text[1];
		document.getElementById("brand_").value= splitted_text[2];
		document.getElementById("cat_").value= splitted_text[3];
		document.getElementById("qty").value= splitted_text[4];
		//document.getElementById("cost").value= "Rs. "+splitted_text[5].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		//document.getElementById("selling_price").value= "Rs. "+splitted_text[6].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		document.getElementById("cost").value= splitted_text[5];
		document.getElementById("selling_price").value= splitted_text[6];
		document.getElementById("desc_").value= splitted_text[7];
	})
</script>

<script>
document.getElementById("search_text").addEventListener("keyup",loadSearchResults);
loadSearchResults();
function loadSearchResults()
{
	//call ajax
	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "../API/searchInventory.php";
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
				var item_id = data[i].item_id;
				var brand = data[i].brand;
				var category = data[i].category;
				var size = data[i].size;
				var qty = data[i].qty;
				var cost = data[i].cost;
				var description = data[i].description;
				var selling_price = data[i].selling_price;

				//storing data in html variable

				html += "<tr>";
				html += "<td>"+size+"</td>";
				html += "<td>"+brand+"</td>";
				html += "<td>"+category+"</td>";
				html += "<td>"+qty+"</td>";
				html += "<td>"+cost+"</td>";
				html += "<td>"+selling_price+"</td>";
				html += "<td><center><button class='btn btn-outline-warning' data-toggle='modal' data-target='#updateqty' data-id='"+item_id+"-"+size+"-"+brand+"-"+category+"-"+qty+"-"+cost+"-"+selling_price+"-"+description+"'><i class='far fa-edit'></i></button></a>&nbsp&nbsp&nbsp<a href='../PHP/delete_inventory_item.php?item_id="+item_id+"'><button class='btn btn-outline-danger'><i class='far fa-trash-alt'></i></button></a></center></td>";
				html += "</tr>";

			}

			//replace <tbody> value

			document.getElementById("data_").innerHTML = html;
		}
	}
	
}
</script>