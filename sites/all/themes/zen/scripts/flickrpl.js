$(document).ready(function(){
    $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id=65914865@N00&lang=en-us&format=json&jsoncallback=?", function(data){
        $.each(data.items, function(i, item){
			// I only want the ickle square thumbnails
       // var sourceSquare = (item.media.m).replace("_m.jpg", "_s.jpg");
	   $
	   
	   $("<img/>").attr("src", item.media.m).appendTo("#images").wrap("<a href='" + item.link + "'></a>");
        })
        $("#title").html(data.title);
        $("#description").html(data.description);
        $("#link").html("<a href='" + data.link + "' target=\"_blank\">Visit the Viget Inspiration Pool!</a>");
        //Notice that the object here is "data" because that information sits outside of "items" in the JSON feed
        $('#images').cycle({
            fx: 'fade',
            speed: 300,
            timeout: 3000,
            next: '#next',
            prev: '#prev',
            pause: 1
        });
    });
});
