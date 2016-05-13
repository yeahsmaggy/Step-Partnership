<?php
// $Id: page.tpl.php,v 1.14.2.10 2009/11/05 14:26:26 johnalbin Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 * - $body_classes_array: An array of the body classes. This is easier to
 *   manipulate then the string in $body_classes.
 * - $node: Full node object. Contains data that may not be safe. This is only
 *   available if the current page is on the node's primary url.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
    <head>
        
        
        <!--<link href="css/screen.css" rel="stylesheet" type="text/css" />-->
        <title><?php print $head_title; ?></title>
        <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
        
        
        
        <!--[if IE 6]>
            <link href="css/ie6.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!--[if IE 7]>
            <link href="css/ie7.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!--[if IE 8]>
            <link href="css/ie8.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript">
        </script>
        <script src="scripts/jquery.cycle.all.min.js" type="text/javascript">
        </script>
        <script src="scripts/vimeo.js" type="text/javascript"></script>
        <script src="scripts/carousel.js" type="text/javascript">
        </script>
        <script src="scripts/flickrpl.js" type="text/javascript">
        </script>
        <script type="text/javascript" charset="utf-8">
            
            
            
            $(document).ready(function(){
                $("div#images").mouseover(function(){
                    $('#slideshow').cycle('resume');
                });
                
            });
        </script>
    </head>
    <body class="<?php print $body_classes; ?>">
        <div id="wrapper">
              <div id="page"><div id="page-inner">
            <a name="navigation-top" id="navigation-top"></a>
    <?php if ($primary_links || $secondary_links || $navbar): ?>
      <div id="skip-to-nav"><a href="#navigation"><?php print t('Skip to Navigation'); ?></a></div>
    <?php endif; ?>
            <div id="header"><div id="header-inner" class="clear-block">
                    
                     <?php if ($logo || $site_name || $site_slogan): ?>
        <div id="logo-title">

          <?php if ($logo): ?>
            <div id="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" id="logo-image" /></a></div>
          <?php endif; ?>
                    
            
            <?php if ($site_name): ?>
            <?php if ($title): ?>
              <div id="site-title"><strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                <?php print $site_name; ?>
                </a>
              </strong></div>
            <?php else: ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                <?php print $site_name; ?>
                </a>
              </h1>
            <?php endif; ?>
          <?php endif; ?>
           
             <?php if ($site_slogan): ?>
            <div id="strap-line"><?php print $site_slogan; ?><a>southwark theatres' education partnership</a></div>
          <?php endif; ?>
            
             </div> <!-- /#logo-title -->
                 <?php endif; ?>

      <?php if ($header): ?>
        <div id="header-blocks" class="region region-header">
          <?php print $header; ?>
        </div> <!-- /#header-blocks -->
      <?php endif; ?>

    </div></div> <!-- /#header-inner, /#header -->
             <div id="main"><div id="main-inner" class="clear-block<?php if ($search_box || $primary_links || $secondary_links || $navbar) { print ' with-navbar'; } ?>">

             <div id="menu" class="twelve">
                    <ul id="nav">
                        <li>
                            <a href="">home</a>
                        </li>
                        <li>
                            <a href="">about</a>
                        </li>
                        <li>
                            <a href="">projects</a>
                        </li>
                        <li>
                            <a href="">festivals</a>
                        </li>
                        <li>
                            <a href="">contact</a>
                        </li>
                    </ul>
                </div>
            </div>



                 <div id="content">
            <div id="main-wrapper">

                <?php if ($left): ?>
        <div id="sidebar-left"><div id="sidebar-left-inner" class="region region-left">
          <?php print $left; ?>
        </div></div> <!-- /#sidebar-left-inner, /#sidebar-left -->
      <?php endif; ?>



                    <div id="content-inner">
                        
                        
                        
                <div id="main-content" class="nine">
                    
                    <?php if ($mission): ?>
          <div id="mission"><?php print $mission; ?></div>
        <?php endif; ?>

        <?php if ($content_top): ?>
          <div id="content-top" class="region region-content_top">
            <?php print $content_top; ?>
          </div> <!-- /#content-top -->
        <?php endif; ?>
                        
                        
                    
                      <?php if ($breadcrumb || $title || $tabs || $help || $messages): ?>
          <div id="content-header">
            <?php print $breadcrumb; ?>
            <?php if ($title): ?>
              <h1 class="title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print $messages; ?>
            <?php if ($tabs): ?>
              <div class="tabs"><?php print $tabs; ?></div>
            <?php endif; ?>
            <?php print $help; ?>
          </div> <!-- /#content-header -->
        <?php endif; ?>
                    
                    <div id="content-area">
          <?php print $content; ?>
        </div>

           <?php if ($feed_icons): ?>
          <div class="feed-icons"><?php print $feed_icons; ?></div>
        <?php endif; ?>
                    
                    <div id="welcome" class="nine no-grid-margin">
                        <div id="welcome-image" class="six no-margin-left">
                            <img class="welcome-image" src="images/welcome-photo.png" alt="" />
                        </div>
                        <div id="welcome-text" class="three no-margin-right">
                            <h2>What's this all about?</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <ul>
                                <li>
                                    <a href="">Do something</a>
                                </li>
                                <li>
                                    <a href="">Do something</a>
                                </li>
                                <li>
                                    <a href="">Do something</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="testimonials" class="nine cntwrp-vert-marg-top cntwrp-vert-marg-bottom">
                        <h2 id="testimonials-h2">Testimonials</h2>
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                        </p>
                    </div>
                    <div id="events" class="nine no-grid-margin">
                        <div id="school-events" class="four no-margin-left">
                            <h2 class="events-h2">School Events</h2>
                            <div class="event-item-wrapper" class="four no-margin-left">
                                <div class="thumbnail one no-margin-left">
                                    <img src="images/event-thumbnail.png" alt="" />
                                </div>
                                <div class="event-info">
                                    <h3>Event Title</h3>
                                    <h4>Date</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                    </p>
                                </div>
                            </div>
                            <div class="event-item-wrapper" class="four no-margin-left">
                                <div class="thumbnail one no-margin-left">
                                    <img src="images/event-thumbnail.png" alt="" />
                                </div>
                                <div class="event-info">
                                    <h3>Event Title</h3>
                                    <h4>Date</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="theatre-events" class="four no-margin-left">
                            <h2 class="events-h2">Theatre Events</h2>
                            <div class="event-item-wrapper" class="four no-margin-left">
                                <div class="thumbnail one no-margin-left">
                                    <img src="images/event-thumbnail.png" alt="" />
                                </div>
                                <div class="event-info">
                                    <h3>Event Title</h3>
                                    <h4>Date</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                    </p>
                                </div>
                            </div>
                            <div class="event-item-wrapper" class="four no-margin-left">
                                <div class="thumbnail one no-margin-left">
                                    <img src="images/event-thumbnail.png" alt="" />
                                </div>
                                <div class="event-info">
                                    <h3>Event Title</h3>
                                    <h4>Date</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="infinitecarousel nine no-grid-margin cntwrp-vert-marg-top">
                        <div id="carousel" class="wrapper">
                        		
                            <ul id="video-list">
                                <li>
                                    <a href=""></a>
                                    <img src="images/video-thumbnail.png" alt="" />
                                </li>
                                <li>
                                    <a href=""></a>
                                    <img src="images/video-thumbnail-pu.png" alt="" />
                                </li>
                                <li>
                                    <a href=""></a>
                                    <img src="images/video-thumbnail-gr.png" alt="" />
                                </li>
                                <li>
                                    <a href=""></a>
                                    <img src="images/video-thumbnail-ye.png" alt="" />
                                </li>
                                <li>
                                    <a href=""></a>
                                    <img src="images/video-thumbnail.png" alt="" />
                                </li>
                                <li>
                                    <a href=""></a>
                                    <img src="images/video-thumbnail.png" alt="" />
                                </li>
                                <li>
                                    <a href=""></a>
                                    <img src="images/video-thumbnail.png" alt="" />
                                </li>
                                <li>
                                    <a href=""></a>
                                    <img src="images/video-thumbnail.png" alt="" />
                                </li>
                                <li>
                                    <a href=""></a>
                                    <img src="images/video-thumbnail.png" alt="" />
                                </li>
                            </ul>
                        </div>
                    </div>
          <?php if ($content_bottom): ?>
          <div id="content-bottom" class="region region-content_bottom">
            <?php print $content_bottom; ?>
          </div> <!-- /#content-bottom -->
        <?php endif; ?>

      </div></div> <!-- /#content-inner, /#content -->
                </div>


                 <?php if ($search_box || $primary_links || $secondary_links || $navbar): ?>
        <div id="navbar"><div id="navbar-inner" class="clear-block region region-navbar">

          <a name="navigation" id="navigation"></a>

          <?php if ($search_box): ?>
            <div id="search-box">
              <?php print $search_box; ?>
            </div> <!-- /#search-box -->
          <?php endif; ?>

          <?php if ($primary_links): ?>
            <div id="primary" class="clear-block">
              <?php print theme('links', $primary_links); ?>
            </div> <!-- /#primary -->
          <?php endif; ?>

          <?php if ($secondary_links): ?>
            <div id="secondary" class="clear-block">
              <?php print theme('links', $secondary_links); ?>
            </div> <!-- /#secondary -->
          <?php endif; ?>

          <?php print $navbar; ?>

        </div></div> <!-- /#navbar-inner, /#navbar -->
      <?php endif; ?>



                <div id="sidebar" class="three">

                       <?php if ($right): ?>
        <div id="sidebar-right"><div id="sidebar-right-inner" class="region region-right">
          <?php print $right; ?>
        </div></div> <!-- /#sidebar-right-inner, /#sidebar-right -->
      <?php endif; ?>


                     </div></div> <!-- /#main-inner, /#main -->

                    <div id="social-icons" class="block three no-grid-margin">
                        <img class="social-icons" src="images/doodle-icons.png" alt="" />
                    </div>
                    <div id="step-recommends" class="block three no-grid-margin">
                        <h2 id="step-recommends-h2">step recommends</h2>
                        <p class="step-recommends-p">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                        </p>
                        <p class="step-recommends-p">
                            the globe theatre
                        </p>
                    </div>
                    <div id="get-involved" class="block three no-grid-margin">
                        <p>
                            <a class="get-involved-text" href="">get involved</a>
                        </p>
                    </div>
                    <div id="polaroid-snaps" class="block three no-grid-margin">
                        <!--  <h1 id="title"></h1> Title of the Flickr pool --><!-- <p id="description"></p> //Description of the images pool--><!-- <p id="link"></p> //Link to the images pool-->
                        <div id="images">
                        </div>
                        <!--//Container for the images-->
                        <div id="flickrNav">
                            <!--//Navigation for the images--><a id="prev" href="#">Prev</a>
                            <a id="next" href="#">Next</a>
                        </div>
                    </div>
                </div>
                <div id="small-logo">
                </div>
            </div>
            <div id="footer">
                <div id="footer-tier-1">


                    <?php if ($footer || $footer_message): ?>
      <div id="footer"><div id="footer-inner" class="region region-footer">

        <?php if ($footer_message): ?>
          <div id="footer-message"><?php print $footer_message; ?></div>
        <?php endif; ?>

        <?php print $footer; ?>

      </div></div> <!-- /#footer-inner, /#footer -->
    <?php endif; ?>

        </div></div> <!-- /#page-inner, /#page -->


                </div>
                <div id="footer-tier-2">
                    <a class="first">Site</a>
                    <a>Useful Links</a>
                    <a>Contact</a>
                    <a class="last">FNAIM Registered</a>
                    <br/>
                    ©2010 STEP


                     <?php if ($closure_region): ?>
    <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
  <?php endif; ?>

  <?php print $closure; ?>

                </div>
            </div>
        </div>
        </div>  </div>  </div>
    </body>
</html>
