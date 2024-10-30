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
            <form action="open.php" method="POST">
                <?php echo $failed_msg; ?>
            <div class="btn-group-vertical ml-4 mt-4" role="group" aria-label="Basic example">
                <div class="btn-group">
                    <input class="text-center form-control-lg mb-2" name="code" id="code">
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '1';">1</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '2';">2</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '3';">3</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '4';">4</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '5';">5</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '6';">6</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '7';">7</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '8';">8</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '9';">9</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value.slice(0, -1);">C</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '0';">0</button>
                    <button type="submit" class="btn btn-primary">E</button>
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

