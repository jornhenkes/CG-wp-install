$(document).ready(function() {
  if ($('#slideshow > img').size() > 1) {
    $('#slideshow').cycle({ 
         fx:      'fade',  
         timeout:  4000, 
         pager: 	'#slideshow_navigatie',
         pagerAnchorBuilder: function(idx, slide) { 
                 return '<div class="slide_nav"></div>'; 
             }

     });
  }else{
    $(window).load(
        function() {
            $('#slideshow').css('height', $('#slideshow > img').height());
        }
    );

  }
});
