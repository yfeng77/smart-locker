<?php 
    session_start();
    // Database connection
    include('assets/php/db.php');

    if(!isset($_SESSION['admin']))
        {
            header("Location: login.php");
        }

        $sql = "SELECT * FROM admin WHERE aid=".$_SESSION['admin'];
        $result = mysqli_query($db,$sql);
        $userRow = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
	<title>Locker Access - FAU Library</title>
	<link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" rel="stylesheet">
</head>
<body id="page-top">
	<div id="wrapper">
		<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
			<div class="container-fluid d-flex flex-column p-0">
				<a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">
					<span>FAU Library</span>
				</div></a>
				<hr class="sidebar-divider my-0">
				<ul class="nav navbar-nav text-light" id="accordionSidebar">
					<li class="nav-item" role="presentation">
						<a class="nav-link" href="index.php"><i class="fas fa-window-maximize"></i><span>Form</span></a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link ac" href="lockers.php"><i class="fas fa-window-maximize"></i><span>Locker Access</span></a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" href="history.php"><i class="fas fa-table"></i><span>History</span></a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" href="login.php"><i class="far fa-user-circle"></i><span>Logout</span></a>
					</li>
					<li class="nav-item" role="presentation"></li>
				</ul>
				<div class="text-center d-none d-md-inline">
					<button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
				</div>
			</div>
		</nav>
		<div class="d-flex flex-column" id="content-wrapper">
			<div id="content">
				<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
					<div class="container-fluid">
						<ul class="nav navbar-nav flex-nowrap ml-auto">
							<li class="nav-item dropdown no-arrow" role="presentation">
								<div class="nav-item dropdown no-arrow">
									<span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $userRow['aname']; ?></span>
								</div>
							</li>
						</ul>
					</div>
				</nav>
				<div class="container-fluid">
					<h3 class="text-dark mb-1" id="legend-block">Legend:</h3>
					<div>
						<p id="rcorners1">Insert Books</p>
						<p id="rcorners2">Not In-Use</p>
						<p id="rcorners3">In-Use</p>
						<p id="rcorners4">Pickup Expired</p>
					</div>
					<div class="card shadow">
						<div class="card-body">
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
										<h2>Locker Doors</h2>
										<div class="btn-group1" id="btn_groups">
											<button class="button2" id="Locker_btn1">Locker 1</button> 
											<button class="button2" id="Locker_btn2">Locker 2</button> 
											<button class="button2" id="Locker_btn3">Locker 3</button>
											<br>
											<button class="button2" id="Locker_btn4">Locker 4</button>
											<button class="button2" id="Locker_btn5">Locker 5</button> 
											<button class="button2" id="Locker_btn6">Locker 6</button>
											<br>
											<button class="button2" id="Locker_btn7">Locker 7</button> 
											<button class="button2" id="Locker_btn8">Locker 8</button> 
											<button class="button2" id="Locker_btn9">Locker 9</button>
										</div>
										<br>
										<button class="btn-done done" id="done_btn">Done</button>
										<p id="msg"></p>
									</div>
								</div>
								<p id="demo"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js">
	</script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js">
	</script> 
    <?php
    echo ' <script src="assets/js/lockers.js"></script>';
    ?>
	<script src="assets/js/script.min.js">
	</script> 
</body>
</html>