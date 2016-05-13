$(document).ready(function(){
   $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id=48719970@N07&lang=en-us&format=json&jsoncallback=?",function(data){
       $.each(data.items, function(i, item){
                       var newurl =  item.media.m;
                       $('<div class="images"></div>').css('background-image', 'url(' + item.media.m + ')').append('<a target="_blank" href="' + item.link +'">&nbsp;</a>').appendTo('#images');
                       });
               $("#title").html(data.title);
       $("#description").html(data.description);
       $("#link").html("<a href='" + data.link + "'target=\"_blank\">Visit the Viget Inspiration Pool!</a>");
       //Notice that the object here is "data" because thatinformation sits outside of "items" in the JSON feed
       $('.jcycleimagecarousel').cycle({
           fx: 'fade',
           speed: 300,
           timeout: 3000,
           next: '#next',
           prev: '#prev',
           pause: 1,
           random: 1
       });
   });
});
$(document).ready(function(){
    $("div#images").mouseover(function(){
        $('#slideshow').cycle('resume');
    });
    $('#panel-theatre>.pane-content>ul').cycle({
            fx: 'fade',
            speed: 300,
            timeout: 8000,
            next: '#next',
            prev: '#prev',
            pause: 1,
			random: 1
        });
		 $('#panel-school>.pane-content>ul').cycle({
            fx: 'fade',
            speed: 300,
            timeout: 8000,
            next: '#next',
            prev: '#prev',
            pause: 1,
			random: 1
        });
});
