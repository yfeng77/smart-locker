<?php 
    session_start();
    // Database connection
    include('assets/php/db.php');
    date_default_timezone_set('America/New_York');

    if(!isset($_SESSION['admin']))
    {
        header("Location: login.php");
    }

    $sql = "SELECT * FROM admin WHERE aid=".$_SESSION['admin'];
    $result = mysqli_query($db,$sql);
    $userRow = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $sql1 = "SELECT * FROM locker";
    $result1 = mysqli_query($db,$sql1);
    $num_rows = mysqli_num_rows($result1);
    
    for($i=1; $i<= $num_rows; $i++ ) { 
        $lockerRow = mysqli_fetch_array($result1,MYSQLI_ASSOC);
        $lockers[$i] = $lockerRow["lstatus"];
    }
    
    // Error & success messages
    global $success_msg, $failed_msg, $emptyError1, $emptyError2, $emptyError3;
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $aname = $userRow['aname'];
        $sname = $_POST["sname"];
        $email = $_POST["email"];
        $bnum  = $_POST["bnum"];
        $lnum  = $_POST["lnum"];
        $pin  = $_POST["pin"];
        $status = 1;
                     
        $currTime=date("Y-m-d H:i:s");   
    
        $sql2 = $db->query("INSERT INTO egn.form (fid, aname, sname, email, bnum, lnum, pin, currTime,lstatus) 
            VALUES (NULL,'$aname', '$sname','$email','$bnum','$lnum','$pin','$currTime','$status')");
        if($sql2)
        {
            $success_msg = '<div class="alert alert-success">
            Submit successfully!
            </div>';
        }else{
            $failed_msg = '<div class="alert alert-danger">
            Failed. 
            </div>';
        }
        
        $sql3 = $db->query("UPDATE locker SET sname = '$sname', pin= '$pin', lstatus='$status' WHERE lid = '$lnum';");
        if($sql3)
        {
            $success_msg = '<div class="alert alert-success">
            Locker updated!
            </div>';
        }else{
            $failed_msg = '<div class="alert alert-danger">
            Locker updated Failed. 
            </div>';
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Form - FAU Library</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>FAU Library</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php"><i class="fas fa-window-maximize"></i><span>Form</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="lockers.php"><i class="fas fa-window-maximize"></i><span>Locker Access</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="history.php"><i class="fas fa-table"></i><span>History</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php"><i class="far fa-user-circle"></i><span>Logout</span></a></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
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
                    <h3 class="text-dark mb-1">Student Form</h3>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">                        
                                            <h2>Student Info</h2>
                                        </div>
                                    </div>
                                    <div align="center">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3" >
                                            <form id="student-form" class="form" method="POST" role="form">
                                                <?php echo $success_msg; ?>
                                                <?php echo $failed_msg; ?>
                                                <div class="form-group" >
                                                    <?php echo $emptyError1; ?>
                                                    <label class="form-label" for="name">Student Name</label>
                                                    <input type="text" class="form-control" id="sname" name="sname" placeholder="Enter Student Name"  required>
                                                </div>
                                                <div class="form-group">
                                                    <?php echo $emptyError2; ?>
                                                    <label class="form-label" for="email">Student  Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Student Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <?php echo $emptyError3; ?>
                                                    <label class="form-label" for="subject">Number of Books</label>
                                                    <input type="number" class="form-control" id="bnum" name="bnum" placeholder="Enter Number of Books" required>
                                                </div>    
                                                <div class="form-group">
                                                    <label class="form-label" for="subject">Locker #</label>
                                                    <select  class="form-control" id="lnum" name="lnum">
                                                        <option value="" selected disabled hidden>Choose Locker Number</option>
                                                        <option value="1" <?php if($lockers[1] == 1){ echo 'hidden'; } ?>>1</option>
                                                        <option value="2" <?php if($lockers[2] == 1){ echo 'hidden'; } ?>>2</option>
                                                        <option value="3" <?php if($lockers[3] == 1){ echo 'hidden'; } ?>>3</option>
                                                        <option value="4" <?php if($lockers[4] == 1){ echo 'hidden'; } ?>>4</option>
                                                        <option value="5" <?php if($lockers[5] == 1){ echo 'hidden'; } ?>>5</option>
                                                        <option value="6" <?php if($lockers[6] == 1){ echo 'hidden'; } ?>>6</option>
                                                        <option value="7" <?php if($lockers[7] == 1){ echo 'hidden'; } ?>>7</option>
                                                        <option value="8" <?php if($lockers[8] == 1){ echo 'hidden'; } ?>>8</option>
                                                        <option value="9" <?php if($lockers[9] == 1){ echo 'hidden'; } ?>>9</option>
                                                    </select>
                                                </div>                            
                                                <div class="form-group">
                                                    <label class="form-label" for="subject"> Pin #</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="pin" name="pin" placeholder="PIN Code" required>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-primary" type="button" onclick="createPIN()">Generate Pin</button>
                                                        </div>
                                                    </div>
                                                </div>    
                                                <button class="btn btn-primary btn-block text-white btn-user" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script>
        function createPIN(){
            var num= Math.random().toFixed(6).slice(-6)
            document.getElementById('pin').value= num
        }
    </script>
</body>

</html>