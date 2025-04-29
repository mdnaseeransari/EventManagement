<style>
  .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }
  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }
  
  /* Newsletter form */
  .newsletter-form {
    position: relative;
    max-width: 400px;
    margin: 0 auto;
  }
  
  .newsletter-form input {
    height: 50px;
    padding-right: 60px;
    border-radius: var(--border-radius);
    border: none;
  }
  
  .newsletter-form button {
    position: absolute;
    right: 0;
    top: 0;
    height: 50px;
    width: 50px;
    border-radius: 0 var(--border-radius) var(--border-radius) 0;
    background-color: var(--primary);
    color: var(--white);
    border: none;
  }
  
  /* Social links */
  .social-links {
    display: flex;
    justify-content: center;
    margin-top: 1.5rem;
  }
  
  .social-links a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: rgba(255,255,255,0.1);
    color: var(--white);
    margin: 0 0.5rem;
    transition: var(--transition-base);
  }
  
  .social-links a:hover {
    background-color: var(--primary);
    transform: translateY(-3px);
  }
  
  /* Footer nav */
  .footer-nav {
    margin: 0;
    padding: 0;
    list-style: none;
  }
  
  .footer-nav li {
    margin-bottom: 0.75rem;
  }
  
  .footer-nav a {
    color: var(--gray-400);
    transition: var(--transition-base);
  }
  
 

</style>

<!-- Custom Footer Section -->
<footer class="bg-dark text-white py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mb-5 mb-lg-0">
        <h4 class="mb-4" style="color: white;"><?php echo $_SESSION['system']['name'] ?></h4>
        <p class="text-muted mb-4">Find and book the perfect venue for your next event with our premium selection of spaces.</p>
        <div class="social-links">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
        <h5 class="mb-4" style="color: white;">Quick Links</h5>
        <ul class="footer-nav">
          <li><a href="index.php?page=home">Home</a></li>
          <li><a href="index.php?page=venue">Venues</a></li>
          <li><a href="index.php?page=about">About Us</a></li>
          <li><a href="index.php?page=contact">Contact</a></li>
        </ul>
      </div>
      <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
        <h5 class="mb-4" style="color: white;">Services</h5>
        <ul class="footer-nav">
          <li><a href="#">Venue Booking</a></li>
          <li><a href="#">Event Planning</a></li>
          <li><a href="#">Corporate Events</a></li>
          <li><a href="#">Wedding Venues</a></li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h5 class="mb-4" style="color: white;">Newsletter</h5>
        <p class="text-muted mb-4">Subscribe to our newsletter for the latest updates and offers.</p>
        
      </div>
    </div>
    <hr class="my-4" style="background-color: rgba(255,255,255,0.1)">
    <div class="row align-items-center">
      <div class="col-md-6 text-center text-md-left">
        <p class="mb-0 text-muted">Copyright © 2025 - <?php echo $_SESSION['system']['name'] ?>. All rights reserved.</p>
      </div>
      <div class="col-md-6 text-center text-md-right">
        <p class="mb-0 text-muted">Designed with <i class="fas fa-heart text-danger"></i> by Design Team</p>
      </div>
    </div>
  </div>
</footer>

<script>
	$('.datepicker').datepicker({
		format:"yyyy-mm-dd"
	})
	 window.start_load = function(){
    $('body').prepend('<div id="preloader2"></div>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

	window.uni_modal = function($title = '' , $url='',$size=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                if($size != ''){
                    $('#uni_modal .modal-dialog').addClass($size)
                }else{
                    $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                }
                
                // Hide modal footer buttons for booking form
                if($url.includes('booking.php') || $url.includes('book_msg.php')) {
                    $('#uni_modal .modal-footer').hide();
                } else {
                    $('#uni_modal .modal-footer').show();
                }
                
                $('#uni_modal').modal({
                  show:true,
                  backdrop:'static',
                  keyboard:false,
                  focus:true
                })
                end_load()
            }
        }
    })
}
  window.uni_modal_right = function($title = '' , $url=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal_right .modal-title').html($title)
                $('#uni_modal_right .modal-body').html(resp)
                
                $('#uni_modal_right').modal('show')
                end_load()
            }
        }
    })
}
window.viewer_modal = function($src = ''){
    start_load()
    var t = $src.split('.')
    t = t[1]
    if(t =='mp4'){
      var view = $("<video src='"+$src+"' controls autoplay></video>")
    }else{
      var view = $("<img src='"+$src+"' />")
    }
    $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
    $('#viewer_modal .modal-content').append(view)
    $('#viewer_modal').modal({
                  show:true,
                  focus:true
                })
                end_load()  

}
window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }
  window.load_cart = function(){
    $.ajax({
      url:'admin/ajax.php?action=get_cart_count',
      success:function(resp){
        if(resp > -1){
          resp = resp > 0 ? resp : 0;
          $('.item_count').html(resp)
        }
      }
    })
  }
  $('#login_now').click(function(){
    uni_modal("LOGIN",'login.php')
  })
  $(document).ready(function(){
    load_cart()
     $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
</script>
<!-- Bootstrap core JS-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

<!-- Scroll behavior script -->
<script>
  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  // Smooth scrolling for all links
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 72)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });
  
  // Newsletter form submission
  $('.newsletter-form').submit(function(e) {
    e.preventDefault();
    alert_toast("Thank you for subscribing to our newsletter!", "success");
    $(this).find('input').val('');
  });
</script>
