<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Open</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
</head>

<body onload="onLoad()" id="page-top">
    <header class="d-flex masthead" style="background-image:url('');">
        <div class="container my-auto text-center">
        <h1 id="label" style="display: none;">What it do</h1>
            <?php
                include_once 'dbh.inc.php';
                $code = $_POST['code'];
                //echo $code;
                
                $sql = "SELECT lockerNum FROM lockers_info WHERE lockerID = $code";
                $result = mysqli_query($link, $sql);

                if($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {     
                        echo "<h1 class='mb-1' id='lockerNum' value='" . $row['lockerNum'] . "'>" . $row['lockerNum'] . " OPEN </h1>";  
                    }
                }
                else {
                    echo "<p id='lockerNum' value='HelloWorld' style='color: darkred; font-size: 1.5rem;'><strong>INCORRECT PIN CODE OR QR SCANNED <br> PLEASE TRY AGAIN..</strong></p>";
                }
            ?>
            <h3 class="mb-5"></h3><a class="btn btn-primary btn-xl js-scroll-trigger" role="button" href="keypad.php">Back</a>
            <div class="overlay"></div>
        </div>
    </header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script>
        function onLoad() {
            setTimeout(function(){ window.location.href = "http://54.82.45.193/pickup/keypad.php" }, 10000);
        }
    </script>
</body>

</html>