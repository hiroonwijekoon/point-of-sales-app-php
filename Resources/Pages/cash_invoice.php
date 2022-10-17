<!DOCTYPE html>
<html>
<head>
	<title>POS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" />  
	<link rel="stylesheet" type="text/css" href="../Stylesheets/cash_invoice.css">
	<link rel="stylesheet" type="text/css" href="../Stylesheets/side_nav.css">
  <?php include '../PHP/check_login.php' ?>
</head>
<body>
<div class="sidenav">
  		<a href="../../index.php"><i class="fas fa-tachometer-alt"></i> &nbsp Dashboard <i class="fas fa-chevron-right chevron"></i></a>
  		<a href="cash_invoice.php" class="active_link"><i class="fa fa-th" aria-hidden="true"></i> &nbsp POS</a>
  		<a href="inventory.php"><i class="fas fa-warehouse"></i> &nbsp Inventory <i class="fas fa-chevron-right chevron"></i></a>
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
    <div class="body_content">
    <div class="container-fluid body_area">
	<div class="alert alert-success alert-dismissible alert_success" id="alert_success">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<strong>Invoice Saved Successfully!</strong> Click "Print Bill" to print the invoice.
	</div>
	<br>
        <img class="heading_image" src="https://img.icons8.com/color/48/000000/activity-grid-2.png"/><span id="heading">POS</span><br><br> 
		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
          <li class="breadcrumb-item"><span>POS</span></li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->
	<br>
		<div class="card1">
        <span>Search Item</span>&nbsp
        <select id="inventory" class="form-control" style="width:300px;" onchange="load_data_to_fields()">
            <option selected  disabled>-- Select Item --</option>
            <?php
                include '../PHP/get_full_inventory_list.php';
                if(mysqli_num_rows($result)>0)
      				{
      					while ($row = mysqli_fetch_assoc($result) )
      					{
                              echo "<option value='$row[item_id]'>$row[brand] | $row[size] | $row[category]</option>";
                        }
                    }
            ?>
		</select>
		&nbsp&nbsp&nbsp<label>Unit Price:</label>&nbsp&nbsp<input type="text" id="unit_price" class="form-control" style="width:200px;display:inline-block;" placeholder="0.00">
		&nbsp&nbsp&nbsp<label>Qty:</label>&nbsp&nbsp<input type="text" id="qty" class="form-control" style="width:150px;display:inline-block;" placeholder="0">
		&nbsp&nbsp&nbsp<button class="btn btn-outline-success" id="add_button"><i class="fas fa-plus"></i>&nbsp Add</button>
		&nbsp&nbsp&nbsp<button class="btn btn-outline-danger" id="delete_button"><i class="far fa-trash-alt"></i>&nbsp Delete</button>
		<br><br>
		<div class="row">
			<div class="col-sm-9">
			<div class="cart">
				<table class="table table-hover thead-dark" id="cart_table">
					<tr>
						<th>Item Name</th>
						<th>Unit Price</th>
						<th>Qty</th>
						<th>Sub Total</th>
					</tr>
				</table>
		</div>
			</div>
			<div class="col-sm-3">
					<label>Select Customer</label><br>
					<select id="customers" class="form-control" style="width:90%;">
					<option value='10'>Walk-In Customer</option>
					<?php
						include '../PHP/get_full_customer_list.php';
						if(mysqli_num_rows($result)>0)
							{
								while ($row = mysqli_fetch_assoc($result) )
								{
									echo "<option value='$row[cus_id]'>$row[cus_name] | $row[city] | $row[contact_no]</span</option>";
								}
							}
						?>
					</select>
					<br><br>
					<table class="table table-sm" style="width:90%; padding:5px 5px;">	
					<tr class="table-active"><td><label>Total Items</label><span style="float:right;" id="total_items">0</span><br></td></tr>
					<tr class="table-info"><td><label>Total</label><span style="float:right;" id="grand_total">0.00</span><br></td></tr>
					<tr class="table-warning"><td><label>Discount</label><span style="float:right;" id="discount">0.00</span><br></td></tr>
					<tr class="table-success"><td><label>Total Payable</label><span style="float:right;" id="total_payable">0.00</span><br></td></tr>
					</table>
					<a href="#" onclick="this.href='print_invoice.php?ID='+getInvoiceID" target="_blank" id="print_button_link"><button id="printButton" class="btn btn-info" style="width:90%;margin-bottom:10px;"><i class="fas fa-print"></i> Print Bill</button></a>
					<button class="btn btn-success" style="width:90%"  data-toggle="modal" data-target="#payment" id="payment_button"><i class="fas fa-wallet"></i> Payment</button>
			</div>
		</div>
	</div>		
	</div>
	</div>

</body>
</html>

<!-- The Modal -->
<div class="modal fade" id="payment">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><i class="fas fa-wallet"></i> Payment</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
		<label>Total Payable :</label><input type="text" class="form-control" readonly id="modal_total_payable" style="text-align:right;"><br>
		<label>Cash Recieved :</label><input type="number" class="form-control" style="text-align:right;" placeholder="0.00" id="modal_cash_recieved"><br>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"  id="saveAndPrint"><i class="fas fa-print"></i> Save and Print</button>
      </div>

    </div>
  </div>
</div>


<!-- scripts for inventory and customer selector-->
<script>
    $("#inventory").chosen();
</script>
<script>
    $("#customers").chosen();
</script>

<script src="../Javascripts/POS_billing.js"></script>