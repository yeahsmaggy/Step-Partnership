<?php
// $Id: front.inc,v 1.1.2.1 2008/12/16 21:27:58 $

/**
* Implementation of hook_panels_layouts().
*/
function anothertheme_steprecommends_panels_layouts() {
  $items['steprecommends'] = array(
    'title' => t('steprecommends'),
    'icon' => 'steprecommends.png',
    'theme' => 'steprecommends',
    'css' => 'steprecommends.css',
    'panels' => array(
      'middle' => t('middle'),
     ),
  );

  return $items;
}
?>