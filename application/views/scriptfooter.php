<script>
    // You can also use "$(window).load(function() {"
     $(function() {
      $(".rslides").responsiveSlides();
    });
    $(document).ready(function() {
 
        var owl = $("#owl-demo");
      
        owl.owlCarousel({
            items : 5, //10 items above 1000px browser width
            itemsDesktop : [1000,5], //5 items between 1000px and 901px
            itemsDesktopSmall : [900,3], // betweem 900px and 601px
            itemsTablet: [600,2], //2 items between 600 and 0
            itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
        });
        owl.trigger('owl.play',2000);
        // Custom Navigation Events
        $(".next").click(function(){
          owl.trigger('owl.next');
        })
        $(".prev").click(function(){
          owl.trigger('owl.prev');
        })
        $(".stop").click(function(){
          owl.trigger('owl.stop');
        })
       
      });
      $(document).ready(function(){
      $('.carousel').carousel();
    });
         $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
        
  </script>
