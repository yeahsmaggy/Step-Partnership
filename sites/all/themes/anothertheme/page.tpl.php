                <?php include("header.php"); ?>
                <div id="pagetemplate-main-content" class="nine no-grid-margin maincontentpadding">
                    <?php print $content; ?>
                    </div>
                </div>
           <div id="sidebar" class="three">
                    <?php if ($primarywidgetarea) : ?>
                    <div id="primarywidgetarea">
                    <?php print $primarywidgetarea ?>
                    </div>
                    <?php endif; ?>
               
            </div><div id="step-logo-small">
                </div>
                <div id="push">.</div>
        </div> <div id="push">.</div><?php include("footer.php"); ?>
    </div>
</body>
</html>
