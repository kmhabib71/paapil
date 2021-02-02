<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Set username</title>
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

        </header>
        <!-- End Header -->



        <main id="main">

            <!-- ======= Clients Section ======= -->
            <div class="modal show" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true" style="display: block;background-color: #00000096;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body" style="height: 50vh;display: flex;justify-content: center;">
                            <div class="verify-wrap" style="display: flex;flex-direction: column;justify-content: center;align-items: center;">
                                <div class="alert alert-danger verify-error" style="display:none;width:100%;" role="alert"></div>
                                <div class="alert alert-success resend-code-sent" style="display:none;width:100%;" role="alert"></div>
                                <h4 style="color:black;font-weight:600;">Write a Useranme</h4>
                                
                                <div class="verify-input pb-2">
                                    <input type="text" id="username-text" class="form-control" placeholder="Username" style="text-align: center;">
                                     <div class="caution">
                                    <p class="text-secondary" style="cursor:pointer;font-size:12px;">Write username without space and @ symbol</p>
                                </div>
                                </div>
                                <div class="verify-buttoon">
                                    <button class="btn btn-primary username-btn">Next</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer id="footer" style="display:none;">

        </footer>


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
            $(function(){
                $(document).on('click', 'button.btn.btn-primary.username-btn', function(){
                    var usernameText = $("input#username-text").val();
                    alert(usernameText);
                    
                      $.post('https://paapil.com/core/ajax/username.php', {
                          
                        usernameTextPut: usernameText
                        
                    }, function(data) {
                        
                        if (data.trim() !== '') {

                            $('.verify-error').show().html(data);
                            
                            setTimeout(function() {
                                 
                               $('.verify-error').empty().hide();
                               
                            }, 3000); 
                            
                        } else {
                            $('.resend-code-sent').show().html('Username set successfully.');
                             setTimeout(function() {
                                 
                               $('.resend-code-sent').empty().hide();
                              window.location.href = "index.php";
                            }, 3000); 
                        }

                    })
                })
            })
            
        </script>
        </body>
        </html>