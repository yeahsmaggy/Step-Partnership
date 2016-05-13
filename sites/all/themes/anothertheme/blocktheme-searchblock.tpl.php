<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $<?php print_r($block)


/*stdClass Object
/*(
/*[bid] => 37 [module] => search [delta] => 0 [theme] => anothertheme [status] => 1 [weight] => -12 [region] => right [custom] => 0 [throttle] => 0 [visibility] => 0 [pages] => [title] => Search STEP [cache] => -1 [enabled] => 1 [page_match] => 1 [content] =>
/*[subject] => Search STEP )
*/
?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="clear-block block block-<?php print $block->module ?> searchblock">
    <h3><?php print $block->title ?></h3>
    
    <?php print $block->content ?>
</div>

