<?php
// $Id: panels-twocol.tpl.php,v 1.1.2.1 2008/12/16 21:27:58 merlinofchaos Exp $
/**
 * @file
 * Template for a 2 column panel layout.
 *
 * This template provides a two column panel display layout, with
 * each column roughly equal in width.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 */
?>
<div class="panel-2col clear-block" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
<?php print $content['left']; ?>
<div id="myController">
			<span class="jFlowPrev">Previous</span>
			<span class="jFlowControl">1</span>
			<span class="jFlowControl">2</span>
			<span class="jFlowControl">3</span>
			<span class="jFlowControl">4</span>
			<span class="jFlowControl">5</span>
			<span class="jFlowControl">5</span>
			<span class="jFlowControl">6</span>
			<span class="jFlowControl">7</span>
			<span class="jFlowControl">8</span>
			<span class="jFlowControl">9</span>
			<span class="jFlowControl">10</span>
			<span class="jFlowNext">Next</span>
</div>
</div>
