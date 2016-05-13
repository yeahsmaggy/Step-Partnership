<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $
?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="clear-block block block-<?php print $block->module ?> polaroidblock">

    <?php if (!empty($block->subject)): ?>
    <h2><?php print $block->subject ?></h2>
    <?php endif;?>

    <div id="polaroid-snaps" class="block three no-grid-margin">
        <div id="image-wrapper">
            <div id="images" class="jcycleimagecarousel">
            </div>
        </div>
        <!--//Container for the images-->
        <div id="flickrNav">
            <!--//Navigation for the images--><a id="prev" href="#">Prev</a>
            <a id="next" href="#">Next</a>.
        </div>
    </div>
</div>
