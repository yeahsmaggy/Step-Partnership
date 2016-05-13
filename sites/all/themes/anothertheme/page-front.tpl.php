<?php include("header.php"); ?>
<script type="text/javascript">
    $(document).ready(function(){
       //sets the width of the testimonial block because it is overriden by the jcycle plugin for whatever reason so this overrides that.
        $('#views-rotator-Testimonials-block_2').css({'width':'620px'});
        $('#views-rotator-Testimonials-block_2').css({'height':'200px'});
        //jcycle sets the background colour to white for some reason-- could be a setting. perhaps worth checking.
        $('.views-rotator-item').css({'backgroundColor':'transparent'});
        //below sets ids for the uls that become scrollable.
        $("#school-events>.pane-content>ul").addClass("scroller-school");
        $("#theatre-events>.pane-content>ul").addClass("scroller-theatre");
    });
            (function($) {
                $(function() { //on DOM ready
                    $("#views-rotator-Testimonials-block_2>.views-rotator-item>.views-field-title").append('<a id="front-page-more-link" class="more-link" href="testimonials-about-step">View more testimonials>></a>');
                    $('#views-rotator-Testimonials-block_2 .views-field-body>img').empty().remove();
                    $('#views-rotator-Testimonials-block_2 .views-field-body>p>img').empty().remove();
                     $("#views-rotator-Testimonials-block_2 .views-field-body>p").remove(":contains('&quot;')");
                });
            })(jQuery);

$(document).ready(function(){
    $("#myController").jFlow({
        slides: ".scroller-theatre",  // the div where all your sliding divs are nested in
        controller: ".jFlowControl", // must be class, use . sign
        slideWrapper : "#jFlowSlide", // must be id, use # sign
        selectedWrapper: "jFlowSelected",  // just pure text, no sign
        width: "600px",  // this is the width for the content-slider
        height: "144px",  // this is the height for the content-slider
        duration: 300,  // time in miliseconds to transition one slide
        prev: ".jFlowPrev", // must be class, use . sign
        next: ".jFlowNext" // must be class, use . sign
    });
});


</script>

<?php print $content; ?>
<?php print $frontpagecontenttier1; ?>
</div></div>
<div id="sidebar" class="three">
    <?php if ($frontpagewidgetarea) : ?>
    <div id="frontpagewidgetarea">
   <?php print $frontpagewidgetarea ?>
    </div>
    <?php endif; ?>
    <?php if ($primarywidgetarea) : ?>
    <div id="primarywidgetarea">
    <?php print $primarywidgetarea ?>
    </div>
    <?php endif; ?>
    
</div><div id="step-logo-small">
    </div> <div id="push">.</div>
</div> <div id="push">.</div><?php include("footer.php"); ?>
</div>
</body>
</html>
