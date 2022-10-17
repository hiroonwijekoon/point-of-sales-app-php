<!DOCTYPE html>
<html>
<head>
	<title>Customer Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="../Stylesheets/customer_details.css">
  	<?php include '../PHP/check_login.php' ?>
	  <?php include '../PHP/connect.php';
  $keyword = $_REQUEST['cus_id'];
  $sql = "SELECT * FROM customers_details WHERE cus_id=$keyword";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0)
  {
        while($row = mysqli_fetch_assoc($result))
        {
            $FullName = $row['cus_name'];
            $Address1 = $row['address_1'];
            $Address2 = $row['address_2'];
            $City = $row['city'];
            $Remarks = $row['special_remarks'];
            $NIC = $row['nic'];
            $Contact = $row['contact_no'];
            $Fax = $row['fax'];
            $email = $row['email'];
            $creditBalance = $row['credit_balance'];
			$img = $row['img'];
        }
  } 
  ?>
</head>
<body>
<div class="sidenav">
  		<a href="../../index.php"><i class="fas fa-tachometer-alt"></i> &nbsp Dashboard<i class="fas fa-chevron-right chevron"></i></a>
  		<a href="cash_invoice.php"><i class="fa fa-th" aria-hidden="true"></i> &nbsp POS <i class="fas fa-chevron-right chevron"></i></a>
  		<a href="inventory.php"><i class="fas fa-warehouse"></i> &nbsp Inventory <i class="fas fa-chevron-right chevron"></i></a>
		<a href="customer_manager.php" class="active_link"><i class="fas fa-user-tie"></i> &nbsp Customers</a>
		<a href="./Resources/Pages/"><i class="fas fa-people-carry"></i> &nbsp Employees <i class="fas fa-chevron-right chevron"></i></a>
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
		<img class="img-responsive" src="https://img.icons8.com/cute-clipart/64/000000/details-pane.png"/><span id="heading">Customer Details</span><br><br>
		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-right:20px;">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php"><i class="fas fa-home"></i>&nbsp&nbspHome</a></li>
          <li class="breadcrumb-item"><a href="./customer_manager.php"><span>Customers</span></a></li>
          <li class="breadcrumb-item"><span>Customer Details</span></li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->
	  <br>
		<form action="../PHP/update_customer.php" method="POST">
      <div class="row">
        <div class="col-sm-7 left_side">
          <center><table class="table table-borderless table_add_new">
          <tbody>
            <tr><td><label>Full Name:</label></td><td><input type="text" name="cus_name" class="form-control" value="<?php echo $FullName ?>"></td></tr>
            <tr><td><label>Address Line 1:</label></td><td><input type="text" name="address1" class="form-control" value="<?php echo $Address1 ?>"></td></tr>
            <tr><td><label>Address Line 2:</label></td><td><input type="text" name="address2" class="form-control" value="<?php echo $Address2 ?>"></td></tr>
            <tr><td><label>City:</label></td><td><input type="text" name="city" class="form-control" value="<?php echo $City ?>"></td></tr>
            <tr><td><label>Special Remarks:</label></td><td><input type="text" name="special_remarks" class="form-control" value="<?php echo $Remarks ?>"></td></tr>
            <tr><td><label>NIC or Driver License Number:</label></td><td><input type="text" name="nic" class="form-control" value="<?php echo $NIC ?>"></td></tr>
            <tr><td><label>Contact No:</label></td><td><input type="text" name="contact_no" class="form-control" value="<?php echo $Contact ?>"></td></tr>
            <tr><td><label>Fax No:</label></td><td><input type="text" name="fax_no" class="form-control" value="<?php echo $Fax ?>"></td></tr>
            <tr><td><label>Email:</label></td><td><input type="text" name="email" class="form-control" value="<?php echo $email ?>"></td></tr>
            <tr><td><label>Credit Balance:</label></td><td><input type="text" name="credit" class="form-control" value="<?php echo $creditBalance ?>"></td></tr>
			<input type="hidden" name="image_" class="image-tag" src="<?php echo $img ?>" value="<?php echo $img ?>">
			<input type="hidden" name="CusID" value="<?php echo $keyword ?>">
          </tbody>
        </table></center>
        <button type="submit" class="btn btn-outline-success" style="float: right;margin-right: 10px;"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbspUpdate Customer</button>
        </div>
        <div class="col-sm-5">
          <div class="right_side">
          <center>
            <div id="cam_border"><div id="camera">
			<img src='<?php echo $img ?>'>
			</div></div><br>
            <div id="varButton"><button type="button" class="btn btn-outline-warning cam_button" onclick="turn_on_camera()"><i class="fa fa-power-off" aria-hidden="true"></i>&nbspTurn on Camera</button></div>
          </center>
		  </div>
        </div>
      </div>
		</form>
	</div>
	<br><br>

</body>
</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
<script type="text/javascript" src="../Javascripts/camera.js"></script>