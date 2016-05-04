<?php
/**
 * Created by haph on 12/4/15
 */

/**
 * @file
 * @reviewed by Ha
 * @date Feb 04, 2016
 */

/**
 * Add body classes if certain regions have content.
 */
function education_preprocess_html(&$variables)
{
    $variables['html_attributes_array'] = array();

    // HTML element attributes.
    $variables['html_attributes_array']['lang'] = $variables['language']->language;
    $variables['html_attributes_array']['dir']  = $variables['language']->dir;

    // Adds RDF namespace prefix bindings in the form of an RDFa 1.1 prefix
    // attribute inside the html element.
    if (function_exists('rdf_get_namespaces')) {
        $variables['rdf'] = new stdClass();
        foreach (rdf_get_namespaces() as $prefix => $uri) {
            $variables['rdf']->prefix .= $prefix . ': ' . $uri . "\n";
        }
        $variables['html_attributes_array']['prefix'] = $variables['rdf']->prefix;
    }
    
    // add body class
    $path = current_path();
    if ($path == 'portfolio-1') {
        $variables['classes_array'][] = 'kopa-portfolio-2col';
    }
    elseif ($path == 'portfolio-2') {
        $variables['classes_array'][] = 'kopa-portfolio-3col';
    }
    elseif ($path == 'portfolio-3') {
        $variables['classes_array'][] = 'kopa-portfolio-4col';
    }
    elseif ($path == 'home-1') {
        $variables['classes_array'][] = 'kopa-home-1';
    }
    elseif ($path == 'blog-2') {
        $variables['classes_array'][] = 'kopa-blog-page-2';
    }

    // add path settings to custom.js
    drupal_add_js(array('pathToTheme' => path_to_theme()), 'setting');

    // add google maps
    drupal_add_js('http://maps.google.com/maps/api/js?sensor=true', 'external');

    drupal_add_css('http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,600,600italic,700italic,700', array('type' => 'external'));
    drupal_add_css('http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800', array('type' => 'external'));
}

/**
 * Implements hook_process_html().
 */
function education_process_html(&$variables) {
    // Flatten out html_attributes and body_attributes.
    $variables['html_attributes'] = drupal_attributes($variables['html_attributes_array']);
}

/**
 * Implements hook_html_head_alter().
 */
function education_html_head_alter(&$head_elements) {
    // Simplify the meta charset declaration.
    $head_elements['system_meta_content_type']['#attributes'] = array(
        'charset' => 'utf-8',
    );
}

/**
 * Override or insert variables into the page templates.
 */
function education_preprocess_page(&$variables)
{
    if (!empty($variables['panels_everywhere_site_template'])) {
        $variables['template_file'] = 'page-panels-everywhere';
    }
}

/**
 * Override or insert variables into the node templates.
 */
function education_preprocess_node(&$variables)
{
    // Get a list of all the regions for this theme
    foreach (system_region_list($GLOBALS['theme']) as $region_key => $region_name) {

        // Get the content for each region and add it to the $region variable
        if ($blocks = block_get_blocks_by_region($region_key)) {
            $variables['region'][$region_key] = $blocks;
        }
        else {
            $variables['region'][$region_key] = array();
        }
    }
}

/**
 * Override Top Menu
 */
function education_menu_tree__menu_top_menu($variables) {
    return '<ul id="top-menu" class="clearfix">' . $variables['tree'] . '</ul>';
}

function education_menu_tree__menu_top_menu_inner($variables) {
    return '<ul>' . $variables['tree'] . '</ul>';
}

function education_menu_link__menu_top_menu($variables) {
    $element = $variables['element'];

    $sub_menu = '';
    if ($element['#below']) {
        // You can set a theme wrapper here or put an empty array() only
        // and theme the second level directly by adding <ul></ul> one line below.
        $element['#below']['#theme_wrappers'] = array('menu_tree__menu_top_menu_inner');
        $sub_menu = drupal_render($element['#below']);
    }

    if ($sub_menu) {
        $li_class = 'class="flip-back"';
    } else {
        $li_class = '';
    }

    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li '. $li_class .'>' . $output  . $sub_menu . '</li>';
}

/**
 * Override Top Mobile Menu
 */
function education_menu_tree__menu_top_mobile_menu($variables) {
    return '<nav class="top-main-nav-mobile clearfix"><a class="pull"><span class="fa fa-align-justify"></span></a><ul class="top-main-menu-mobile clearfix">' . $variables['tree'] . '</ul></nav>';
}

/* inner ul */
function education_menu_tree__menu_top_mobile_menu_inner($variables) {
    return '<ul>' . $variables['tree'] . '</ul>';
}

/* inner li */
function education_menu_link__menu_top_mobile_menu_inner($variables) {
    $element = $variables['element'];
    $sub_menu = '';
    if ($element['#below']) {
        $sub_menu = drupal_render($element['#below']);
    }
//    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li><a href="'. $element['#href'] .'">' . $element['#title'] . "</a></li>\n";
}

/* main li */
function education_menu_link__menu_top_mobile_menu($variables)
{
    $element = $variables['element'];

    $sub_menu = '';
    if ($element['#below']) {
        // You can set a theme wrapper here or put an empty array() only
        // and theme the second level directly by adding <ul></ul> one line below.
        $element['#below']['#theme_wrappers'] = array('menu_tree__menu_top_mobile_menu_inner');
        foreach ($element['#below'] as $key => $val) {
            if (is_numeric($key)) {
                $element['#below'][$key]['#theme'] = 'menu_link__menu_top_mobile_menu_inner'; // 2 level <li>
            }
        }
        $element['#below']['#theme_wrappers'][0] = 'menu_tree__menu_top_mobile_menu_inner';
        $sub_menu = drupal_render($element['#below']);
    }

    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li><a href="#">'. $element['#title'] .'</a>'.$sub_menu.'</li>';
}

/**
 * Override Others Menu
 */

/* main ul */
function education_menu_tree__menu_others_menu($variables) {
    return '<ul class="toggle-view kopa-toggle-2">' . $variables['tree'] . '</ul>';
}

/* inner ul */
function education_menu_tree__menu_others_menu_inner($variables) {
    return '<div class="kopa-panel clearfix">' . $variables['tree'] . '</div>';
}

/* inner li */
function education_menu_link__menu_others_menu_inner($variables) {
    $element = $variables['element'];
    $sub_menu = '';

    if ($element['#below']) {
        $sub_menu = drupal_render($element['#below']);
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<a href="#">' . $element['#title'] . "</a>\n";
}

/* main li */
function education_menu_link__menu_others_menu($variables)
{
    $element = $variables['element'];

    $sub_menu = '';
    if ($element['#below']) {
        // You can set a theme wrapper here or put an empty array() only
        // and theme the second level directly by adding <ul></ul> one line below.
        $element['#below']['#theme_wrappers'] = array('menu_tree__menu_others_menu_inner');
        foreach ($element['#below'] as $key => $val) {
            if (is_numeric($key)) {
                $element['#below'][$key]['#theme'] = 'menu_link__menu_others_menu_inner'; // 2 level <li>
            }
        }
        $element['#below']['#theme_wrappers'][0] = 'menu_tree__menu_others_menu_inner';
        $sub_menu = drupal_render($element['#below']);
    }

//    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li class="clearfix"><span class="fa fa-plus"></span><h6>' . $element['#title'] . '</h6>'. $sub_menu .'<div class="clear"></div></li>';
}

/**
 * Override Breadcrumb
 */
function education_breadcrumb($variables)
{
    global $base_url;

    if (arg(0) == 'node') {
        $node = node_load(arg(1));
        $title = page_title_page_get_title();
        if (!empty($node)) {
            $current_path = $title;
        }
    }
    else {
        $current_path = str_replace("-", " ", arg(0));
    }

    if (!empty($current_path)) {
        // Provide a navigational heading to give context for breadcrumb links to
        // screen-reader users. Make the heading invisible with .element-invisible.

        $output = '<div class="kopa-breadcrumb"><div class="container"><div class="row"><div class="col-md-12">';
        $output .= '<div class="pull-left"><span>' . ucfirst($current_path) . '</span></div>';
        $output .= '<div class="pull-right">';
        $output .= '<a title="Return to Home" href="' . $base_url . '" ><span>Home</span></a>
							<span>&nbsp;/&nbsp;</span>
							<span class="current-page">' . ucfirst($current_path) . '</span>';
        $output .= '</div></div></div></div></div>';

        return $output;
    }
}

function education_form($variables) {
    $element = $variables['element'];
    if (isset($element['#action'])) {
        $element['#attributes']['action'] = drupal_strip_dangerous_protocols($element['#action']);
    }
    element_set_attributes($element, array('method', 'id'));
    if (empty($element['#attributes']['accept-charset'])) {
        $element['#attributes']['accept-charset'] = "UTF-8";
    }
    // Anonymous DIV to satisfy XHTML compliance.
    return '<form' . drupal_attributes($element['#attributes']) . '>' . $element['#children'] . '</form>';
}

/**
 * Override Field Textarea
 */
function education_textarea($variables) {
    $element = $variables['element'];
    element_set_attributes($element, array('id', 'name', 'cols', 'rows'));
    _form_set_class($element, array('form-textarea'));

    $wrapper_attributes = array(
        'class' => array('form-textarea-wrapper'),
    );

    // Add resizable behavior.
    if (!empty($element['#resizable'])) {
        drupal_add_library('system', 'drupal.textarea');
        $wrapper_attributes['class'][] = 'resizable';
    }

//    $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
    $output = '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
//    $output .= '</div>';
    return $output;
}

/**
 * Override Comment form
 */
function education_form_comment_form_alter(&$form, &$form_state, $form_id)
{
    // set title for each comment form
    if ((arg(0) == 'comment') && (arg(1) == 'reply')) {
        $title = 'Reply';
    } elseif ((arg(0) == 'comment') && (arg(2) == 'edit')) {
        $title = 'Edit';
    } else {
        $title = 'Leave';
    }
    $form['#prefix'] = '<div id="respond"><h4>' . $title . ' a comment</h4>';
    $form['#suffix'] = '</div>';
    $form['#attributes']['class'][] = 'comment-form clearfix';

    $author = !empty($form['author']['name']['#value']) ? $form['author']['name']['#value'] : '';
    $intro = '<span class="c-note">Your email address will not be published. Required fields are marked *</span>';

    if ($form_id == 'comment_node_events_form' || $form_id == 'comment_node_courses_form') {
        $wrapper = '<div class="col-md-12 col-sm-12">';
    } else {
        $wrapper = '<div class="col-md-4 col-sm-4">';
    }

    if (user_is_logged_in()) {
        $form['author']['_author'] = array(
            '#type' => 'textfield',
            '#default_value' => $author,
            '#weight' => 1,
            '#attributes' => array(
                'class' => array('valid'),
                'id' => array('comment_name'),
                'placeholder' => array('Name*'),
            ),
            '#theme_wrappers' => array(),
            '#prefix' => $intro . '<div class="row">'. $wrapper .'<p class="input-block"><label class="required" for="comment_name"><i class="fa fa-user"></i></label>',
            '#suffix' => '</p></div>',
        );
    } else {
        $form['author']['name'] = array(
            '#type' => 'textfield',
            '#default_value' => $author,
            '#weight' => 1,
            '#attributes' => array(
                'class' => array('valid'),
                'id' => array('comment_name'),
                'placeholder' => array('Name*'),
            ),
            '#theme_wrappers' => array(),
            '#prefix' => $intro . '<div class="row">'. $wrapper .'<p class="input-block"><label class="required" for="comment_name"><i class="fa fa-user"></i></label>',
            '#suffix' => '</p></div>',
        );
    }

    $form['subject'] = array(
        '#type' => 'textfield',
        '#weight' => 2,
        '#attributes' => array(
            'class' => array('valid'),
            'id' => array('comment_email'),
            'placeholder' => array('Subject*'),
        ),
        '#theme_wrappers' => array(),
        '#prefix' => $wrapper . '<p class="input-block"><label class="required" for="comment_email"><i class="fa fa-envelope"></i></label>',
        '#suffix' => '</p></div> </div>',
    );

    $form['comment_body']['und'][0]['value'] = array(
        '#type' => 'textarea',
        '#weight' => 3,
        '#cols' => 88,
        '#rows' => 6,
        '#attributes' => array(
            'id' => array('comment_message'),
            'placeholder' => array('Message*'),
        ),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="row"> <div class="col-md-12"><p class="textarea-block"><label class="required" for="comment_message"><i class="fa fa-list-ul"></i></label>',
        '#suffix' => '</p></div> </div>',
    );

    $form['actions']['submit'] = array(
        '#type' => 'submit',
        '#weight' => 4,
        '#value' => t('Post Comment'),
        '#attributes' => array(
            'id' => array('submit-comment'),
            'class' => array('input-submit'),
        ),
        '#prefix' => '<div class="row"> <div class="col-md-12"><p class="comment-button clearfix">',
        '#suffix' => '</p></div> </div>',
    );

    $form['actions']['preview'] = array();
}

/**
 * Override Pager
 */
function education_pager($variables)
{
    $tags = $variables['tags'];
    $element = $variables['element'];
    $parameters = $variables['parameters'];
    $quantity = $variables['quantity'];
    global $pager_page_array, $pager_total;

    $pager_prev = $pager_page_array[$element] - 1;
    $pager_next = $pager_page_array[$element] + 1;

    // Calculate various markers within this pager piece:
    // Middle is used to "center" pages around the current page.
    $pager_middle = ceil($quantity / 2);
    // current is the page we are currently paged to
    $pager_current = $pager_page_array[$element] + 1;
    // first is the first page listed by this pager piece (re quantity)
    $pager_first = $pager_current - $pager_middle + 1;
    // last is the last page listed by this pager piece (re quantity)
    $pager_last = $pager_current + $quantity - $pager_middle;
    // max is the maximum page number
    $pager_max = $pager_total[$element];
    // End of marker calculations.

    // Prepare for generation loop.
    $i = $pager_first;
    if ($pager_last > $pager_max) {
        // Adjust "center" if at end of query.
        $i = $i + ($pager_max - $pager_last);
        $pager_last = $pager_max;
    }
    if ($i <= 0) {
        // Adjust "center" if at start of query.
        $pager_last = $pager_last + (1 - $i);
        $i = 1;
    }
    // End of generation loop preparation.

    if ($pager_total[$element] > 1) {
        $output = '<div class="pagination clearfix"><ul class="page-numbers clearfix">';

        if ($pager_page_array[$element] != 0) $output .= '<li><a href="?page=' . $pager_prev . '" class="first page-numbers"><i class="fa fa-angle-double-left"></i></a></li>';

        if ($i != $pager_max) {
            if ($i > 1) {
                $output .= '<li><span class="page-numbers dots">...</span></li>';
            }
            for (; $i <= $pager_last && $i <= $pager_max; $i++) {
                if ($i < $pager_current) {
                    $output .= '<li><a href="?page=' . ($i - 1) . '" class="page-numbers">' . $i . '</a></li>';
                }
                if ($i == $pager_current) {
                    $output .= '<li><span class="page-numbers current">' . $i . '</span></li>';
                }
                if ($i > $pager_current) {
                    $output .= '<li><a href="?page=' . ($i - 1) . '" class="page-numbers">' . $i . '</a></li>';
                }
            }
            if ($i < $pager_max) {
                $output .= '<li><span class="page-numbers dots">...</span></li>';
            }
        }
        // End generation.

        if ($pager_current != $pager_total[$element]) $output .= '<li><a href="?page=' . $pager_next . '" class="last page-numbers"><i class="fa fa-angle-double-right"></i></a></li>';

        $output .= '</ul></div>';

        return $output;
    }
}

/**
 * Override Others
 * Panels Pane
 */
function education_preprocess_panels_pane(&$variables) {
//    dpm('type: ' . $variables['pane']->type);
    if ($variables['pane']->type == 'block') {
//        dpm('subtype: ' . $variables['pane']->subtype);
    }
}

/**
 * Override Block Megamenu
 * @param $variables
 */
function education_preprocess_tb_megamenu_block(&$variables) {
    $block = tb_megamenu_load_block($variables['block_key']);
    if ($block) {
        $module = $block->module;
        $delta = $block->delta;
        $block_content = module_invoke($module, 'block_view', $delta);
        if (empty($block_content) && $variables['section'] == 'backend') {
            // Using description to show instead content.
            $blocks_info = module_invoke($module, 'block_info');
            $variables['content'] = $blocks_info[$delta]['info'];
        }
        elseif ($block_content) {
            $block->subject = '';
            $is_enabled_i18n_block = module_enable(array('i18n_block'));
            // Translate content in block. And content must be a string.
            if ($is_enabled_i18n_block && !is_array($block_content['content'])) {
                $block->content = &$block_content['content'];
                $block->content = i18n_string_text("blocks:$block->module:$block->delta:body", $block->content);
            }
            // Check configuration for show block title;
            if (isset($variables['showblocktitle']) && $variables['showblocktitle']) {
                // If i18n_block is not enabled, so we will set title to subject.
                if (!$is_enabled_i18n_block) {
                    $block->subject = $block->title ? $block->title : $block_content['subject'];
                }
                elseif (!empty($block->title) && $block->title != '<none>') {
                    // Check plain here to allow module generated titles to keep any markup.
                    $block->subject = $block->title;
                    $block->subject = i18n_string_plain("blocks:$block->module:$block->delta:title", $block->subject);
                }
            }

            $variables['content'] = $block_content['content'];
        }
        else {
            $variables['content'] = NULL;
        }
        $variables['classes_array'][] = "tb-block";
        $variables['classes_array'][] = "tb-megamenu-block";
        $variables['attributes_array']['data-type'] = "block";
        $variables['attributes_array']['data-block'] = $variables['block_key'];
    }
    else {
        $variables['content'] = NULL;
    }
}

/**
 * Return variables to search result
 * @param $variables
 * @throws Exception
 */
function education_preprocess_search_result(&$variables)
{
    $variables['search_results'] = '';
    if (!empty($variables['module'])) {
        $variables['module'] = check_plain($variables['module']);
    }
    $teaser = node_view($variables['result']['node'], 'teaser');
    $variables['snippet'] = drupal_render($teaser);
    $variables['info'] = '';
    $variables['pager'] = theme('pager', array('tags' => NULL));
    $variables['theme_hook_suggestions'][] = 'search_result__' . $variables['module'];
}