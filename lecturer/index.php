<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <script src="assets/js/login.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body>
    <section>
        <div class="lgp-hd">
            <h2 style="font-size: 85px;"><strong>SLIIT</strong></h2>
            <h5 style="font-size: 33px;"><strong>Student groups management System</strong></h5>
        </div>
        <div class="container login-cont">
            <div class="row">
                <div class="col-10 col-sm-6 col-md-4 col-lg-4 offset-1 offset-sm-3 offset-md-4 offset-lg-4 login-col">
                    <h5 style="font-size: 33px;"><strong>LOGIN</strong></h5><i class="icon ion-lock-combination"></i>
                    <form class="login-form" id="login-form">
                        <div class="form-group"><input class="form-control form-control-lg lg-frc" id="username" type="text" required="" placeholder="Enter Email"></div>
                        <div class="form-group"><input class="form-control form-control-lg lg-frc" id="password" type="password" required="" placeholder="Enter Password"></div>
                        <div class="form-group"><button class="btn btn-light btn-lg login-btn" type="button" onclick="login()"><strong>Login</strong></button></div><a href="forget.html">Forget Password ?</a></form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>