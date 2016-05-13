 <div id="footer">
                    <div id="footer-tier-1">
                    </div>
     <div id="footer-tier-2">
<div id="footer-links-wrapper" class="eight">
             <div id="southwark-link" class="two no-margin-left"><a href="http://www.southwark.gov.uk"></a></div>
             <div id="southguar-link" class="two"><a href="http://www.southwarkguarantee.com"></a></div>
             <div id="ft-link" class="two"><a href="http://www.ft.com"></a></div>
             <div id="bb-link" class="two no-margin-left"><a href="http://www.betterbankside.co.uk"></a></div>
         </div>



                         <?php if ($secondary_links): ?>
            <div id="secondary" class="clear-block twelve">
              <?php print theme('links', $secondary_links); ?>
            </div> <!-- /#secondary -->
          <?php endif; ?>

          <?php print $navbar; ?>

                        <?php if($footer_message) {
                            print $footer_message;
                        } ?>
                        <?php print $footer; ?>


                    </div>
     <div id="copyright" class="twelve">&copy 2013 STEP<br/>
     Designed & Developed with <a href="http://www.drupal.org" target="_blank">Drupal</a> by <a href="http://www.andrewwelch.info" target="_blank">WELCH</a></div>
                </div><script type="text/javascript"> Cufon.now(); </script>
                <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-1665147-9");
pageTracker._trackPageview();
} catch(err) {}</script>
