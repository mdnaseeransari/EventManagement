 		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $_SESSION['system']['name'] ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="admin/assets/css/jquery.datetimepicker.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Animation Libraries -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- Additional Animation Libraries -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/magic.css@1.4.8/dist/magic.min.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
        <link href="admin/assets/css/select2.min.css" rel="stylesheet">

        <script src="admin/assets/vendor/jquery/jquery.min.js"></script>
        <script src="admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="admin/assets/js/select2.min.js"></script>
        <script type="text/javascript" src="admin/assets/js/jquery.datetimepicker.full.min.js"></script>
        <!-- Animation JS Libraries -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js"></script>
        <!-- Advanced Animation Libraries -->
        <script src="js/typed.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.7.2/dist/vanilla-tilt.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
        
        <script>
          // Global initialization for animation libraries
          document.addEventListener('DOMContentLoaded', function() {
            // Initialize counter animations
            $('.counter').counterUp({
              delay: 10,
              time: 1000
            });
            
            // Initialize vanilla tilt for 3D hover effects
            VanillaTilt.init(document.querySelectorAll(".tilt-element"), {
              max: 25,
              speed: 400,
              glare: true,
              "max-glare": 0.5,
            });
          });
        </script>




