<?php include_once('../config.php');
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($username==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($rfidcode==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}else{
		
		$userCount	=	$db->getQueryCount('pupils','id');
		$data	=	array(
						'username'=>$username,
						'rfidcode'=>$rfidcode,
						'pointaccumulated'=>$pointaccumulated,
					);
		$insert	=	$db->insert('pupils',$data);
		if($insert){
			header('location:index.php?msg=ras');
			exit;
		}else{
			header('location:index.php?msg=rna');
			exit;
		}
	}
}
?>

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
			<li class="active">
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
			<li>
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
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
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
					<h1>Students</h1>
					<ul class="breadcrumb1">
						<li>
							<a href="#">Students</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a href="#">List of RFID</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Register RFID</a>
						</li>
					</ul>
				</div>
				<a href="../students/index.php" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">List of RFID</span>
				</a>
			</div>

			<!-- Datatable -->
			<div class="container">

		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is required!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> RFID Code is required!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Point is required!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}

		?>

		<div class="card">

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Fields with <span class="text-danger">*</span> are required!</h5>

					<form method="post">

						<div class="form-group">
							<label>User Name <span class="text-danger">*</span></label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Enter user name" required>
						</div>

						<div class="form-group">
							<label>RFID Code <span class="text-danger">*</span></label>
							<input type="text" name="rfidcode" id="rfidcode" class="form-control" placeholder="Enter RFID Code" required>
						</div>

						<div class="form-group">
							<label hidden>Points</label>
							<input hidden type="number" name="pointaccumulated" id="pointaccumulated" class="form-control" placeholder="Enter Points" required value=0>
						</div>

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add Student</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>
			<!-- Datatable -->

			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script>
		$(document).ready(function() {
		jQuery(function($){
			  var input = $('[type=tel]')
			  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
			  input.bind('country.mobilePhoneNumber', function(e, country) {
				$('.country').text(country || '')
			  })
			 });
		});
	</script>
	<script>
	// Get the input element
const pointAccumulatedInput = document.getElementById("pointaccumulated");

// Log the value of the input element
console.log(pointAccumulatedInput.value);
	</script>

	<script src="../script.js"></script>
</body>
</html>