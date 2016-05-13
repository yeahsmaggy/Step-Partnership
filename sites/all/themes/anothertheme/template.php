<?php
/**
* Override or insert PHPTemplate variables into the search_block_form template.
*
* @param $vars
*   A sequential array of variables to pass to the theme template.
* @param $hook
*   The name of the theme function being called (not used in this case.)
*/

function anothertheme_preprocess_search_block_form(&$vars, $hook) {

  // Modify elements of the search form
  $vars['form']['search_block_form']['#title'] = t('');

  // Set a default value for the search box
  $vars['form']['search_block_form']['#value'] = t('Search & Hit Enter');

  // Add a custom class to the search box
  $vars['form']['search_block_form']['#attributes'] = array('class' => t('cleardefault primarysearchinput'));

  // Change the text on the submit button
  $vars['form']['submit']['#value'] = t('');

  // Add a custom class to the submit button
  $vars['form']['submit']['#attributes'] = array('class' => t('button'));

  // Rebuild the rendered version (search form only, rest remains unchanged)
  unset($vars['form']['search_block_form']['#printed']);
  $vars['search']['search_block_form'] = drupal_render($vars['form']['search_block_form']);

  // Rebuild the rendered version (submit button, rest remains unchanged)
  unset($vars['form']['submit']['#printed']);
  $vars['search']['submit'] = drupal_render($vars['form']['submit']);

  // Collect all form elements to make it easier to print the whole form.
  $vars['search_form'] = implode($vars['search']);
}

//creates node templates based on node id

function phptemplate_preprocess_node(&$vars, $hook) {
  $node = $vars['node'];
  $vars['template_file'] = 'node-'. $node->nid;
  $var['comment_add'] = '';

}

//changes the url for the feed icon to the theme url rather than the system url
function anothertheme_feed_icon($url, $title) {
  if ($image = theme('image', path_to_theme() . '/images/feed.png', t('Syndicate content'), $title)) {
    return '<a href="'. check_url($url) .'" class="feed-icon">'. $image .'</a>';
  }
}

/**
* Implementation of hook_theme().
*///supposed to edit the comment form but need to check if it works.
function anothertheme_theme(){
  return array(
    'comment_form' => array(
      'arguments' => array('form' => NULL),
    ),
  );
}

/**
* Theme the output of the comment_form.
*
* @param $form
*   The form that  is to be themed.
*/


function anothertheme_comment_form($form) {

  // Rename some of the form element labels.
  $form['name']['#title'] = t('');
  $form['homepage']['#title'] = t('Website');
  $form['comment_filter']['comment']['#title']  = t('Your message');

  // Add some help text to the homepage field.
  $form['homepage']['#description'] = t('');
  $form['homepage']['#description'] .= ''. t('');

  // Remove the preview button
 //  $form['preview'] = NULL;

  return drupal_render($form);
}
function anothertheme_links($links, $attributes = array()) {
  if (isset($links['blog_usernames_blog'])) {
    unset($links['blog_usernames_blog']);
  }
  return theme_links($links, $attributes);
}

//different page template depending on the url alias see:-http://drupal.org/node/139766
function phptemplate_preprocess_page(&$vars) {
  if (module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
    if ($alias != $_GET['q']) {
      $template_filename = 'page';
      foreach (explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '-' . $path_part;
        $vars['template_files'][] = $template_filename;
      }
    }
  }
}



//strip img tags from teasers
/* Strip only selcted tags in THEME_preprocess_node function below */
function strip_only($str, $tags) {
    if(!is_array($tags)) {
        $tags = (strpos($str, '>') !== false ? explode('>', str_replace('<', '', $tags)) : array($tags));
        if(end($tags) == '') array_pop($tags);
    }
    foreach($tags as $tag) $str = preg_replace('#</?'.$tag.'[^>]*>#is', '', $str);
    return $str;
}

/* Strip only selected tags from teasers - in this case, just img tags */
function anothertheme_preprocess_node(&$vars, $hook) {
  // Strip tags from teaser
  if ($vars['teaser']) {
    // $coreteaser is the teaser without extra cck fields
    $coreteaser = $vars['node']->content['body']['#value'];
    // Make sure there is content to strip tags from
    if ($coreteaser) {
      $teaser = $vars['content'];
      // Calculate position of $coreteaser in $teaser
      $start = strpos($teaser, $coreteaser);
      // Calculate length of core teaser with tags
      $length = strlen($coreteaser);
      // Strip selected tags only from $coreteaser
      $replacement = strip_only($coreteaser, '<img>');
      // Replace corresponding part of $teaser with stripped $coreteaser
      $vars['content'] = substr_replace($teaser, $replacement, $start, $length);
    }
  }
}
//add a taxonomy templating ability

function _phptemplate_variables($hook, $vars = array()) {

    switch ($hook) {
        case 'node':
            if (arg(0)== 'taxonomy') {
                $vars['template_files'] = array(
                    'node-taxonomy',
                    'node-'.$vars['node']->type.'-taxonomy'
                );
            }
        break;
    }

    return $vars;
}


?>
