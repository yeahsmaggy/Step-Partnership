<?php
// $Id: composite-layout-twocol.tpl.php,v 1.1 2008/10/14 01:03:56 bengtan Exp $

/**
 * @file 
 *
 * Variables:
 * - $content: Original node content (from $node->body)
 * - $layout: Layout definition (from $node->composite_layout)
 *
 * Layout specific variables:
 * - $left: Content for the left zone. 
 *
 * @see template_preprocess_composite_content
 */
?>

<?php print $top; ?>
<?php print $left; ?>
<?php print $right; ?>
 <?php print $bottom; ?>
