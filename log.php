<?php
include 'connect/login.php';
include 'core/load.php';

if(login::isLoggedIn()){
    header('location: index.php');
}else{

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Log in/sign Up-paapil</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="index.html"><span>Paapil</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <div class=" ">
                <!--                <nav class="nav-menu d-lg-none">-->
                <ul style="list-style: none;">
                    <!--
<li class="active"><a href="#index.html">Homea</a></li>
<li><a href="#about">About</a></li>
<li><a href="#services">Services</a></li>
<li><a href="#portfolio">Portfolio</a></li>
<li><a href="#team">Team</a></li>
<li><a href="#pricing">Pricing</a></li>
<li class="drop-down"><a href="">Drop Down</a>
    <ul>
        <li><a href="#">Drop Down 1</a></li>
        <li class="drop-down"><a href="#">Drop Down 2</a>
            <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
            </ul>
        </li>
        <li><a href="#">Drop Down 3</a></li>
        <li><a href="#">Drop Down 4</a></li>
        <li><a href="#">Drop Down 5</a></li>
    </ul>
</li>
<li><a href="#contact">Contact</a></li>
-->

                    <li class="get-started"><a href="#about" data-toggle="modal" data-target="#signup">Sign Up</a></li>
                </ul>
            </div>
            <!-- .nav-menu -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 hero-img" data-aos="fade-right" data-aos-delay="200">
                    <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Grow your community with Paapil</h1>
                    <div class="alert alert-danger sign-in-error" style="display:none;width:80%;" role="alert"></div>
                    <form data-aos="fade-up" style="width:80%;">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Phone, Email or Username</label>
                            <input type="text" class="form-control" id="in-email-mobile" name="in-email-mobile" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Password</label>
                            <input type="password" class="form-control" id="in-pass" name="in-pass" placeholder="">
                            <a href="forgotPassword.php" style="">Forgot Password</a>
                        </div>

                    </form>
                    <div class="login-wrap" data-aos="fade-up" data-aos-delay="600">
                        <div class="btn-get-started" style="width:80%;text-align:center;cursor:pointer;    transition: 1.5s;">
                            Log In
                        </div>



                    </div>



                </div>

            </div>
        </div>

    </section>
    <!-- End Hero -->

    <main id="main">

        <!-- ======= Clients Section ======= -->

    </main>

    <footer id="footer" style="display:none;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        &copy; Copyright <strong>Vesperr</strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                        <a href="privacy.php">Privacy Policy</a>
                        <a href="terms.php">Terms of Use</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create an account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger sign-up-error" style="display:none;" role="alert">

                    </div>
                    <form data-aos="fade-up">

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button"><i class='bx bxs-user'></i></button>
                            </div>
                            <input type="text" class="form-control" id="full-name-up" name="full-name" placeholder="Name">
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button"><i class='bx bx-envelope'></i></button>
                            </div>
                            <input type="text" class="form-control" id="email-mobile-up" name="email-mobile" placeholder="Phone Or Email">
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button"><i class='bx bxs-lock'></i></button>
                            </div>

                            <input type="password" class="form-control" id="password-up" name="password-up" placeholder="Password">
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button"><i class='bx bxs-user-plus'></i></button>
                            </div>
                            <div style="margin-left:5px;height: 38px;" class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-outline-info active">
                                    <input type="radio" name="gen" class="gender-up" autocomplete="off" checked value="male"> Male
                                </label>
                                <label class="btn btn-outline-info">
                                    <input type="radio" name="gen" class="gender-up" autocomplete="off" value="female"> Female
                                </label>
                                  <label class="btn btn-outline-info">
                                    <input type="radio" name="gen" class="gender-up" autocomplete="off" value="Others">   Others                             </label>

                            </div>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button"><i class='bx bxs-gift'></i></button>
                            </div>
                            <!--                            <label for="formGroupExampleInput2">Password</label>-->
                            <div class="sign-up-birthday" style="margin-left:5px;">
                                <div class="bday" style="margin-top: -8px;">Birthday</div>
                                <div class="form-birthday">
                                    <select name="birth-day" id="days" class="select-body  btn-outline-info"></select>
                                    <select name="birth-month" id="months" class="select-body btn-outline-info"></select>
                                    <select name="birth-year" id="years" class="select-body btn-outline-info"></select>

                                </div>

                            </div>
                        </div>

                    </form>

                    <p style="font-size: 12px;">By signing up, you agree to the <span><a href="terms.php">Terms of Service</a></span> and <span><a href="privacy.php">Privacy Policy</a></span>, including Cookie Use. Others will be able to find you by email or phone number when provided. </p>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Login</button>
                        <button class="btn btn-primary" id="sign-up-button">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        for (i = new Date().getFullYear(); i > 1900; i--) {
            //    2019,2018, 2017,2016.....1901
            $("#years").append($('<option/>').val(i).html(i));

        }
        for (i = 1; i < 13; i++) {
            $('#months').append($('<option/>').val(i).html(i));
        }
        updateNumberOfDays();

        function updateNumberOfDays() {
            $('#days').html('');
            month = $('#months').val();
            year = $('#years').val();
            days = daysInMonth(month, year);
            for (i = 1; i < days + 1; i++) {
                $('#days').append($('<option/>').val(i).html(i));
            }

        }
        $('#years, #months').on('change', function() {
            updateNumberOfDays();
        })

        function daysInMonth(month, year) {
            return new Date(year, month, 0).getDate();

        }

        //        For sign up
        $(function() {


            $(document).on('click', '#sign-up-button', function() {
                var emailaddress;
                var full_name = $('#full-name-up').val();
                var email_mobile_up = $('#email-mobile-up').val();
                var password_up = $('#password-up').val();
                var gender_up = $('input[name="gen"]:checked').val();
                var birth_day = $('#years').val() + '-' + $('#months').val() + '-' + $('#days').val();
                console.log(full_name + '-' + email_mobile_up + '-' + password_up + '-' + gender_up + '-' + birth_day)
                $('.modal-footer').html('<button class="btn btn-primary" type="button" disabled><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Loading...</button>');

                $.post('https://paapil.com/core/ajax/log.php', {
                    full_name_up: full_name,
                    email_mobile_up: email_mobile_up,
                    password_up: password_up,
                    gender_up: gender_up,
                    birth_day: birth_day
                }, function(data) {
                    console.log(data);
                    if (data.trim() !== '') {
                        console.log(data);
                        $('.modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Login</button><button class="btn btn-primary" id="sign-up-button">Sign Up</button>');
                        $('.sign-up-error').show().html(data);
                         setTimeout(function() {
                               $('.sign-up-error').empty().hide();
                            }, 3000); 
                    } else {
                        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                            if (testEmail.test(email_mobile_up))
                                window.location.href = "verify.php"
                            else
                                 window.location.href = "username.php"
                        
                        
                            //   var emailReg = /^[_a-z0-9-]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^/;
                               
                           
                            
                            
                            
                                                
                    }

                })

            })

            $(document).on('click', '.login-wrap', function() {
                var mob_email_username = $('#in-email-mobile').val();
                var password_in = $('#in-pass').val();
                $.post('https://paapil.com/core/ajax/log.php', {
                    mob_email_username_in: mob_email_username,
                    password_in: password_in
                }, function(data) {
                    if (data.trim() !== '') {

                        $('.sign-in-error').show().html(data);
                    } else {
                                                window.location.href = "index.php";
                    }

                })

            })
        })

        //var i = 0;
        //function AjaxSendForm(url, placeholder, form, append) {
        //var data = $(form).serialize();
        //append = (append === undefined ? false : true); // whatever, it will evaluate to true or false only
        //$.ajax({
        //    type: 'POST',
        //    url: url,
        //    data: data,
        //    beforeSend: function() {
        //        // setting a timeout
        //        $(placeholder).addClass('loading');
        //        i++;
        //    },
        //    success: function(data) {
        //        if (append) {
        //            $(placeholder).append(data);
        //        } else {
        //            $(placeholder).html(data);
        //        }
        //    },
        //    error: function(xhr) { // if error occured
        //        alert("Error occured.please try again");
        //        $(placeholder).append(xhr.statusText + xhr.responseText);
        //        $(placeholder).removeClass('loading');
        //    },
        //    complete: function() {
        //        i--;
        //        if (i <= 0) {
        //            $(placeholder).removeClass('loading');
        //        }
        //    },
        //    dataType: 'html'
        //});
        //}

    </script>
</body>

</html>
