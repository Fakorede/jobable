<footer>

        <section class="footer-Content">
        <div class="container">
        <div class="row">
        <div class="col-lg-3 col-md-3 col-xs-12">
        <div class="widget">
        <div class="footer-logo"><img src="assets\img\logo-footer.png" alt=""></div>
        <div class="textwidget">
        <p>Sed consequat sapien faus quam bibendum convallis quis in nulla. Pellentesque volutpat odio eget diam cursus semper.</p>
        </div>
        </div>
        </div>
        <div class="col-lg-6 col-md-4 col-xs-12">
        <div class="widget">
        <h3 class="block-title">Quick Links</h3>
        <ul class="menu">
        <li><a href="#">About Us</a></li>
        <li><a href="#">Support</a></li>
        <li><a href="#">License</a></li>
        <li><a href="#">Contact</a></li>
        </ul>
        <ul class="menu">
        <li><a href="#">Terms & Conditions</a></li>
        <li><a href="#">Privacy</a></li>
        <li><a href="#">Refferal Terms</a></li>
        <li><a href="#">Product License</a></li>
        </ul>
        </div>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-12">
        <div class="widget">
        <h3 class="block-title">Subscribe Now</h3>
        <p>Sed consequat sapien faus quam bibendum convallis.</p>
        <form method="post" id="subscribe-form" name="subscribe-form" class="validate">
        <div class="form-group is-empty">
        <input type="email" value="" name="Email" class="form-control" id="EMAIL" placeholder="Enter Email..." required="">
        <button type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i class="lni-envelope"></i></button>
        <div class="clearfix"></div>
        </div>
        </form>
        <ul class="mt-3 footer-social">
        <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
        <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
        <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
        <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
        </ul>
        </div>
        </div>
        </div>
        </div>
        </section>
        
        
        <div id="copyright">
        <div class="container">
        <div class="row">
        <div class="col-md-12">
        <div class="site-info text-center">

        </div>
        </div>
        </div>
        </div>
        </div>
</footer>
        
<a href="#" class="back-to-top">
    <i class="lni-arrow-up"></i>
</a>
        
<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>
        
<script src="{{ asset('template/js/jquery-min.js') }}"></script>
<script src="{{ asset('template/js/popper.min.js') }}"></script>
<script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('template/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('template/js/waypoints.min.js') }}"></script>
<script src="{{ asset('template/js/form-validator.min.js') }}"></script>
<script src="{{ asset('template/js/contact-form-script.js') }}"></script>
<script src="{{ asset('template/js/main.js') }}"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker({dateFormat:"yy-mm-dd"}).val();
    } );
</script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
           $('.summernote').summernote({
            height: 200,
            dialogsInBody: true,
            callbacks:{
                onInit:function(){
                $('body > .note-popover').hide();
                }
             },
         });
      });
</script>