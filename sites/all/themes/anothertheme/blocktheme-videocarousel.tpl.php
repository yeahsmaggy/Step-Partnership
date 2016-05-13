<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $
?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="clear-block block block-<?php print $block->module ?> polaroidblock">

    <?php if (!empty($block->subject)): ?>
    <h2><?php print $block->subject ?></h2>
    <?php endif;?>
<?php

// Change this to your username to load in your videos
$vimeo_user_name = 'user3461307';
/*3461307*/

// API endpoint
$api_endpoint = 'vimeo.com/api/v2/'.$vimeo_user_name;


// Curl helper function
function curl_get($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    $return = curl_exec($curl);
    curl_close($curl);
    return $return;
}
// handle any external exceptions

	// Load the user clips
	$user = simplexml_load_string(curl_get($api_endpoint.'/info.xml'));
	$videos = simplexml_load_string(curl_get($api_endpoint.'/videos.xml'));

	//the number of the video in the array
	$video_url = $videos->video[0]->url;


?>
    <div class="infinitecarousel nine no-grid-margin cntwrp-vert-marg-top">
        <div id="carousel" class="wrapper"><ul id="video-list">
                <?php foreach ($videos->video as $video): ?>
                <li>
                        <?php $eachvideourl = ($video->url);
                        $justid = str_replace('http://vimeo.com/','', $eachvideourl);
                        ;?>
                    <a class="thingy" href="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $justid ?>" rel="shadowbox;player=swf;"><img src="<?php echo $video->thumbnail_small; ?>" /></a>
                <br/>
                <a  href="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $justid ?>" rel="shadowbox;player=swf;" class="vid-titles"><?php echo $video->title; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>


<?php 


?>
