(function(){$.fn.infinitecarousel = function(){
        function repeat(str, n){
            return new Array(n + 1).join(str);
        }
        
        return this.each(function(){
        
            //magic
            var $wrapper = $('> div', this).css('overflow', 'hidden'),            //creates a variable called wrapper
            $slider = $wrapper.find('> ul').width(9999), $items = $slider.find('> li'), $single = $items.filter(':first')
            
            singleWidth = $single.outerWidth(), visible = Math.ceil($wrapper.innerWidth() / singleWidth), currentPage = 1, pages = Math.ceil($items.length / visible);
            
            //  console.log('singleWidth', singleWidth);
            //  console.log('visible', visible);
            //  console.log('pages', pages);
            /* TASKS */
            
            //1. pad the pages with empty element if equired
            
            if ($items.length % visible != 0) {
            
                //pad
                $slider.append(repeat('<li class ="empty" />', visible - ($items.length % visible)));
                $items = $slider.find('> li');
            }
            
            //2. create the carousel padding on the left ande right (cloned items)
            $items.filter(':first').before($items.slice(-visible).clone().addClass('cloned'));
            $items.filter(':last').after($items.slice(0, visible).clone().addClass('cloned'));
            $items = $slider.find('> li');
            //console.log (
            //$items.slice (-visible).clone().addClass('cloned')
            //);
            
            //$items.filter(':first').after()
            //3. reset scroll
            $wrapper.scrollLeft(singleWidth * visible);
            //4. paging function
            function gotoPage(page){
                var dir = page < currentPage ? -1 : 1, n = Math.abs(currentPage - page), left = singleWidth * dir * visible * n;
                
                $wrapper.filter(':not(:animated)').animate({
                
                    scrollLeft: '+=' + left
                }, 500, function(){
                    // if Page = last page then reset position
                    //  console.log(page,pages);
                    if (page > pages) {
                    
                        $wrapper.scrollLeft(singleWidth * visible);
                        page = 1;
                    }
                    else 
                        if (page == 0) {
                            page = pages;
                            $wrapper.scrollLeft(singleWidth * visible * pages)
                        }
                    currentPage = page;
                })
            }
            //global
            
            window.gotoPage = gotoPage;
            //5. insert the back and forward link
            
            $wrapper.after('<a href="" class="arrow back">&lt;</a><a href="" class="arrow forward">&gt;</a>');
            
            //6. bind the bakc and forward links
            
            $('a.back', this).click(function(){
                gotoPage(currentPage - 1);
                return false;
                
            });
            $('a.forward', this).click(function(){
                gotoPage(currentPage + 1);
                return false;
            });
            
            $(this).bind('goto', function(event, page){
                gotoPage(page);
            });
            
            $(this).bind('next', function(){
                gotoPage(currentPage + 1);
            });
            
        });
    };
    
})(jQuery);
$(document).ready(function(){
    var autoscrolling = true;
    $('.infinitecarousel').infinitecarousel().mouseover(function(){
    
        autoscrolling = false;
    }).mouseout(function(){
        autoscrolling = true;
    });
    
    setInterval(function(){
        if (autoscrolling) {
            $('.infinitecarousel').trigger('next');
        }
    }, 7000);
});

$('div.infinitecarousel').infinitecarousel();

