<?php
//header.php
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
    <head>
        <?php print_r($page) ?>
        <title><?php print $head_title ?></title>
        <?php print $head ?>
        <?php print $styles ?>
        <?php print $scripts ?>
        <script type="text/javascript">
            var IE7_PNG_SUFFIX = ".png";
            //initialise the text replacement
            Cufon.replace('#strap-line', { fontFamily: 'Liberation Sans' });
            Cufon.replace('h2', { fontFamily: 'Hand of Sean' });
            Cufon.replace('h3.sketchblock', { fontFamily: 'sketchblock' });
            Cufon.replace('p.get-involved', { fontFamily: 'Liberation Sans' });
            Cufon.replace('#block-search-0>h3', { fontFamily: 'Hand of Sean' });
            $(document).ready(function(){
                $('div#menu>ul>li:first').addClass('homelink');
                $('div#menu>ul>li:last').addClass('contactlink');
                $.fn.search = function() {
                    return this.focus(function() {
                        if( this.value == this.defaultValue ) {
                            this.value = "";
                            this.className = "active";
                        }
                    }).blur(function() {
                        if( !this.value.length ) {
                            this.value = this.defaultValue;
                            this.className = "normal";
                        }
                    });
                };
                $(".form-text").search();
                $("#views-rotator-Testimonials-block_2 .views-field-body>p").wrapInner('<span class="pullquote" />');
                // Easy Pullquotes by Mike Jolley
                // Go through each span element with a classname of "pullquote"
                $('span.pullquote').each(function() {
                    // Get the text of the span
                    text = $(this).text();
                    // Get rid of unwanted charactors
                    text=text.replace( /\((.*)\)/gi, " " );
                    // Check if this is to be a right or left pull quote and output it
                    if ($(this).is(".right"))
                        $(this).parent().before('<blockquote class="pullquote right"><p>'+ text +'</p></blockquote>');
                    else
                        $(this).parent().before('<blockquote class="pullquote"><p>'+ text +'</p></blockquote>');
                });
                $('span.pullquote').css('display','none');
                // End pull quote code}
            });

        </script>
        <!--[if IE 6]>
            <link href="<?php print $directory; ?>/css/ie6.css" rel="stylesheet" type="text/css" />
        <![endif]-->       
        <!--[if IE 7]>
            <link href="<?php print $directory; ?>/css/ie7.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!--[if IE 8]>
            <link href="<?php print $directory; ?>/css/ie8.css" rel="stylesheet" type="text/css" />
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="site-title">
                    <span><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a></span>
                </div>
                <div id="strap-line">
                    <h1 class="sitesloganstep" style="margin:0px;"><?php print $site_slogan; ?></h1>
                </div>
                <div id="menu" class="twelve">
                    <?php print theme('nice_menus_primary_links'); ?>
                </div>
            </div>

            <?php if ( $tabs || $help || $messages): ?><div id="info-stuff">
                    <?php print $messages; ?>
                    <?php if ($tabs): ?>
                        <?php print $tabs; ?>
                    <?php endif; ?>
                    <?php print $help; ?>  </div>
            <?php endif; ?>

            <div id="main-wrapper">
                <div id="main-content" class="nine">