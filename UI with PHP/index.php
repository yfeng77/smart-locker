<?php
//require("assets/php/db.php");
global $failed_msg;

if(isset($_POST["submit"])) {
        $pin     = $_POST["code"]; 
        $sql = "SELECT *** FROM ***  WHERE *** = '$pin'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result);
        if($count == 1) {
            $lNumber= $row['lNum'];
            header("location: open.php?lNum=$lNum");
        }else {
                $failed_msg = '<div class="alert alert-danger">
                    Wrong PIN number. 
                </div>';
            }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Entry UI</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
</head>

<body id="page-top">
    <header class="d-flex masthead" style="background-image:url('');">
        <div class="container my-auto text-center">
            <h1 class="mb-1">Enter PIN Number</h1>
            <form method="post">
                <?php echo $failed_msg; ?>
            <div class="btn-group-vertical ml-4 mt-4" role="group" aria-label="Basic example">
                <div class="btn-group">
                    <input class="text-center form-control-lg mb-2" id="code">
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-primary py-3 px-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '1';">1</button>
                    <button type="button" class="btn btn-outline-primary py-3 px-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '2';">2</button>
                    <button type="button" class="btn btn-outline-primary py-3 px-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '3';">3</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-primary py-3 px-4" onclick="document.getElementById('code').value=document.getElementById('code').value + '4';">4</button>
                    <button type="button" class="btn btn-outline-primary py-3 px-4" onclick="document.getElementById('code').value=document.getElementById('code').value + '5';">5</button>
                    <button type="button" class="btn btn-outline-primary py-3 px-4" onclick="document.getElementById('code').value=document.getElementById('code').value + '6';">6</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-primary py-3 px-4" onclick="document.getElementById('code').value=document.getElementById('code').value + '7';">7</button>
                    <button type="button" class="btn btn-outline-primary py-3 px-4" onclick="document.getElementById('code').value=document.getElementById('code').value + '8';">8</button>
                    <button type="button" class="btn btn-outline-primary py-3 px-4" onclick="document.getElementById('code').value=document.getElementById('code').value + '9';">9</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-danger py-3 px-4" onclick="document.getElementById('code').value=document.getElementById('code').value.slice(0,0);">✖</button>
                    <button type="button" class="btn btn btn-outline-primary py-3 px-4" onclick="document.getElementById('code').value=document.getElementById('code').value + '0';">0</button>
                    <button type="submit" class="btn btn-success py-3 px-4"  >✔</button>
                </div>
            </div>
               </form> 
            <h3 class="mb-5"></h3><a class="btn btn-primary btn-xl js-scroll-trigger" role="button" href="#about">QR Code</a>
            <div class="overlay"></div>
        </div>
    </header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
