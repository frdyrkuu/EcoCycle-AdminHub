<?php include_once('../config.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Datatable -->
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../style.css">
	<link rel="icon" type="image/png" href="../adminhub/img/logo-icon.png">
	<!-- Toaster -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<title>EcoCycle</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-trash'></i>
			<span class="text">EcoCycle</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="../dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="../students/index.php">
				<i class="bx bx-book-reader"></i>
					<span class="text">Students</span>
				</a>
			</li>
			<li>
				<a href="../points/index.php">
				<i class='bx bxs-medal'></i>
					<span class="text">Points</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li  class="active">
				<a href="../activity/index.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Activity Logs</span>
				</a>
			</li>
			<li>
				<a href="../register.php">
					<i class='bx bxs-cog'></i>
					<span class="text">Register</span>
				</a>
			</li>
			<li>
				<a href="../logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">


				<div class="form-input">
					<input type="search" name="username" id="username" class="form-control" value="<?php echo isset($_REQUEST['username'])?$_REQUEST['username']:''?>" placeholder="Search Student Name">
					<button type="submit" name="submit" value="search" id="submit" class="search-btn"><i class="bx bx-search"></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Activities</h1>
					<ul class="breadcrumb1">
						<li>
							<a href="#">Activities</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Activity List</a>
						</li>
					</ul>
				</div>
				<a href="../students/create.php" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Claim Rewards Here</span>
				</a>
			</div>

			<!-- Datatable -->
			<div class="table-data">
				<div class="order">
					


		
				<?php
				$condition	=	'';
				if(isset($_REQUEST['username']) and $_REQUEST['username']!=""){
					$condition	.=	' AND username LIKE "%'.$_REQUEST['username'].'%" ';
				}
				if(isset($_REQUEST['rfidcode']) and $_REQUEST['rfidcode']!=""){
					$condition	.=	' AND rfidcode LIKE "%'.$_REQUEST['rfidcode'].'%" ';
				}
				if(isset($_REQUEST['pointaccumulated']) and $_REQUEST['pointaccumulated']!=""){
					$condition	.=	' AND pointaccumulated LIKE "%'.$_REQUEST['pointaccumulated'].'%" ';
				}
				if(isset($_REQUEST['status']) and $_REQUEST['status']!=""){
					$condition	.=	' AND [status] LIKE "%'.$_REQUEST['status'].'%" ';
				}
				if(isset($_REQUEST['df']) and $_REQUEST['df']!=""){

					$condition	.=	' AND DATE(recorddate)>="'.$_REQUEST['df'].'" ';

				}
				if(isset($_REQUEST['recorddate']) and $_REQUEST['recorddate']!=""){

					$condition	.=	' AND DATE(recorddate)<="'.$_REQUEST['recorddate'].'" ';

				}
				
				$userData	=	$db->getAllRecords('activity','*',$condition,'ORDER BY id DESC');
				?>
				<div class="container">

						<?php
						if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
							echo	'<div id="toast-alert" class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
						}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
							echo	'<div id="toast-alert" class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';
						}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
							echo	'<div id="toast-alert" class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change anything!</div>';
						}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
							echo	'<div id="toast-alert" class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is something wrong <strong>Please try again!</strong></div>';
						}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
							echo	'<div id="toast-alert" class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
						}
						?>

							
					<hr>
					
					<div>
					<table>
							<thead>
								<tr>
									<th>Sr#</th>
									<th>User Name</th>
									<th class="text-center">RFID Code</th>
									<th class="text-center">Point Accumulated</th>
									<th class="text-center">Record Date</th>
									<th class="text-center" hidden>Status</th>
									<th class="text-center">Action</th>
								</tr>	
							</thead>
							<tbody>
								<?php 
								if(count($userData)>0){
									$s	=	'';
									foreach($userData as $val){
										$s++;
								?>
								<tr>
									<td><?php echo $s;?></td>
									<td><?php echo $val['username'];?></td>
									<td><?php echo $val['rfidcode'];?></td>
									<td align="center"><?php echo $val['pointaccumulated'];?></td>
									<td align="center"><?php echo date('Y-m-d',strtotime($val['recorddate']));?></td>
									<td align="center" hidden><?php echo $val['status'];?></td>
									<td align="center">
										<a href="../students/edit.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
										<a href="../students/delete.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
									</td>	

								</tr>
								<?php 
									}
								}else{
								?>
								<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
								<?php } ?>
							</tbody>
						</table>
					</div> <!--/.col-sm-12-->
					
				</div>
				
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
				<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
				<script
			src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
			integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
			crossorigin="anonymous"></script>
				<script>
					$(document).ready(function() {
						jQuery(function($){
							var input = $('[type=tel]')
							input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
							input.bind('country.mobilePhoneNumber', function(e, country) {
								$('.country').text(country || '')
							})
						});
						
						//From, To date range start
						var dateFormat	=	"yy-mm-dd";
						fromDate	=	$(".fromDate").datepicker({
							changeMonth: true,
							dateFormat:'yy-mm-dd',
							numberOfMonths:2
						})
						.on("change", function(){
							toDate.datepicker("option", "minDate", getDate(this));
						}),
						toDate	=	$(".toDate").datepicker({
							changeMonth: true,
							dateFormat:'yy-mm-dd',
							numberOfMonths:2
						})
						.on("change", function() {
							fromDate.datepicker("option", "maxDate", getDate(this));
						});
						
						
						function getDate(element){
							var date;
							try{
								date = $.datepicker.parseDate(dateFormat,element.value);
							}catch(error){
								date = null;
							}
							return date;
						}
						//From, To date range End here	
						
					});
				</script>
			<!-- Datatable -->

			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script>
		document.getElementById("username").addEventListener("input", function(event) {
  var value = event.target.value;
  if (value.endsWith("\n")) {
    // Enter key was pressed, do something here
    console.log("Enter key was pressed!");
    // Reset the input value to remove the newline character
    event.target.value = value.slice(0, -1);
  }
});
	</script>
	<script>
    setTimeout(function() {
        var alert = document.getElementById('toast-alert');
        alert.parentNode.removeChild(alert);
    }, 5000);
</script>
	<script src="../script.js"></script>
</body>
</html>