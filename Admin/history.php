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

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    
    $sql1 = "SELECT * FROM form";
    $result1 = mysqli_query($db,$sql1);
    $num_rows = mysqli_num_rows($result1);
        
    $pageSize = 5;
    $offset = ($page-1) * $pageSize; 
        
    $totalPage = ceil ($num_rows / $pageSize);  
    
    $sql2 = "SELECT * FROM form ORDER BY `currTime` DESC LIMIT $offset, $pageSize";
    $result2 = mysqli_query($db,$sql2);
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - FAU Library</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-window-maximize"></i><span>Form</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="lockers.php"><i class="fas fa-window-maximize"></i><span>Locker Access</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="history.php"><i class="fas fa-table"></i><span>History</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php"><i class="far fa-user-circle"></i><span>Logout</span></a></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button" ></button></div>
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
                    <h3 class="text-dark mb-4">History</h3>
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="search.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <input id="mysearch" type="text" id="searchname" name="searchname" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search">
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-primary py-0" type="submit" name="search" id="search"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Admin Name</th>
                                            <th>Student Name</th>
                                            <th>Email</th>
                                            <th>Locker</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result2,MYSQLI_ASSOC)) { 
                                                                $aname = $row["aname"];
                                                                $sname = $row["sname"];
                                                                $email = $row["email"];
                                                                $lnum  = $row["lnum"];
                                                                $time = strtotime($row['currTime']);
                                                                $lstatus = $row['lstatus'];
                                            ?>                          
                                        <tr>
                                            <td><?php echo $aname;?></td>
                                            <td><?php echo $sname;?></td>
                                            <td><?php echo $email;?></td>
                                            <td><?php echo $lnum;?></td>
                                            <td><?php echo date('m/d',$time); ?></td>
                                            <td> <?php if ($lstatus==1) { echo 'Pending'; }else if ($lstatus==0) { echo 'Completed'; }else if ($lstatus==-1) { echo 'Cancelled'; }?> </td> 
                                        </tr>
                                        <?php
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
                                                <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>" aria-label="Previous">
                                                    <span aria-hidden="true">«</span>
                                                </a>
                                            </li>                                           
                                            <li class="page-item">
                                                    <a class="page-link" href ="<?php echo '?page='.$page; ?>"> <?php echo $page ?> <span aria-hidden="true">/ </span><?php echo $totalPage ?>
                                                </a>
                                            </li>
                                            <li class="<?php if($page >= $totalPage){ echo 'disabled'; } ?>">
                                                <a class="page-link" href="<?php if($page >= $totalPage){ echo '#'; } else { echo "?page=".($page + 1); } ?>" aria-label="Next">
                                                    <span aria-hidden="true">»</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
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
    <script src="assets/js/lockers.js"></script>
</body>

</html>