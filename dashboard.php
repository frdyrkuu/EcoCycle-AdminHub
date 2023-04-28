<?php
// session_start();
include('connection.php');
include 'check_logout.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
	<link href="dist/output.css" rel="stylesheet">

	<title>EcoCycle | Dashboard</title>
</head>

<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.html" class="brand">
			<i class='bx bxs-trash'></i>
			<span class="text">EcoCycle</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="dashboard.php">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="students/index.php">
					<i class="bx bx-book-reader"></i>
					<span class="text">Students</span>
				</a>
			</li>
			<li>
				<a href="points/index.php">
					<i class='bx bxs-medal'></i>
					<span class="text">Points</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="activity/index.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Activity Logs</span>
				</a>
			</li>
			<li>
				<a href="register.php">
					<i class='bx bxs-cog'></i>
					<span class="text">Register</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
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
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-ref">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
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
					<h1>Welcome
						<?php echo $_SESSION['admin-name']; ?>
					</h1>
					<h1>Dashboard</h1>
					<ul class="breadcrumb1">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<div class="w-1/2 bg-gradient-to-b shadow-xl from-green-500  rounded-full p-5">
						<img src="img/plastic.png" alt="Plastic" class="rounded-lg hover:animate-waving-hand">
					</div>
					<span class="text">
						<h3>120</h3>
						<p>Plastics</p>
					</span>
				</li>
				<li>
					<div class="w-1/2 bg-gradient-to-b shadow-xl from-blue-500  rounded-full p-5">
						<img src="img/paper.png" alt="Paper" class="rounded-lg hover:animate-waving-hand">
					</div>
					<span class="text">
						<h3>284</h3>
						<p>Papers</p>
					</span>
				</li>
				<li>
					<div class="w-1/2 bg-gradient-to-b shadow-xl from-red-500  rounded-full p-5">
						<img src="img/metal.png" alt="Metal" class="rounded-lg hover:animate-waving-hand">
					</div>
					<span class="text">
						<h3>543</h3>
						<p>Metals</p>
					</span>
				</li>
				<li>
					<div class="w-1/2 bg-gradient-to-b shadow-xl from-yellow-500  rounded-full p-5">
						<img src="img/others.png" alt="Others" class="rounded-lg hover:animate-waving-hand">
					</div>
					<span class="text">
						<h3>284</h3>
						<p>Others</p>
					</span>
				</li>
			</ul>

			<!-- RECENT ORDER -->
			<div class="table-data ">
				<div class="order">
					<!-- ADD CHART HERE -->
					<!-- Left Card content goes here -->
					<h1 class="head text-4xl font-extrabold mb-4">Graph</h1>

					<!-- graph CONTENT HERE -->

					<h1 class="text-2xl mb-4 text font-bold">Waste Types Distribution</h1>
					<div class="flex items-center">
						<div class="flex-shrink-0">
							<div class="w-8 h-8 bg-blue-500 rounded-md"></div>
						</div>
						<div class="flex-grow ml-4">
							<div class="text-gray-700 font-semibold">Paper</div>
							<div class="bg-blue-200 h-2 rounded-md mt-1">
								<div class="h-full w-3/4 bg-blue-500 rounded-md"></div>
							</div>
						</div>
						<div class="ml-2 text-gray-600 font-semibold">75%</div>
					</div>
					<div class="flex items-center mt-3">
						<div class="flex-shrink-0">
							<div class="w-8 h-8 bg-green-500 rounded-md"></div>
						</div>
						<div class="flex-grow ml-4">
							<div class="text-gray-700 font-semibold">Plastic</div>
							<div class="bg-green-200 h-2 rounded-md mt-1">
								<div class="h-full w-2/3 bg-green-500 rounded-md"></div>
							</div>
						</div>
						<div class="ml-2 text-gray-600 font-semibold">65%</div>
					</div>
					<div class="flex items-center mt-3">
						<div class="flex-shrink-0">
							<div class="w-8 h-8 bg-red-500 rounded-md"></div>
						</div>
						<div class="flex-grow ml-4">
							<div class="text-gray-700 font-semibold">Metal</div>
							<div class="bg-red-200 h-2 rounded-md mt-1">
								<div class="h-full w-1/2 bg-red-500 rounded-md"></div>
							</div>
						</div>
						<div class="ml-2 text-gray-600 font-semibold">50%</div>
					</div>
					<div class="flex items-center mt-3">
						<div class="flex-shrink-0">
							<div class="w-8 h-8 bg-yellow-500 rounded-md"></div>
						</div>
						<div class="flex-grow ml-4">
							<div class="text-gray-700 font-semibold">Others</div>
							<div class="bg-yellow-200 h-2 rounded-md mt-1">
								<div class="h-full w-1/4 bg-yellow-500 rounded-md"></div>
							</div>
						</div>
						<div class="ml-2 text-gray-600 font-semibold">25%</div>
					</div>
				</div>
				<!-- END TRASHBIN CONTENT -->
			</div>
			</div>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script>
		const notification = document.querySelector('.notification');

		notification.addEventListener('click', function() {
			this.classList.toggle('active');
		});
	</script>
	<script src="script.js"></script>
</body>

</html>