<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Open</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
</head>

<body id="page-top">
    <header class="d-flex masthead" style="background-image:url('');">
        <div class="container my-auto text-center">
            <?php
                include_once 'dbh.inc.php';
                $code = $_POST['code'];
                echo $code;
                
                $sql = "SELECT lockerNum FROM lockers_info WHERE lockerID = $code";
                $result = mysqli_query($link, $sql);

                while($row = mysqli_fetch_assoc($result)) {
                    echo "<h1 class='mb-1'>" . $row['lockerNum'] . " OPEN </h1>";
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
</body>

</html>