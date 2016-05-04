<?php
/**
 * Created by haph on 12/10/15
 */

/**
 * @file
 * @reviewed by Ha
 * @date Feb 04, 2016
 */

/**
 * Function get all lists here
 */

function _get_professors_list_1()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'professors')
        ->propertyCondition('status', NODE_PUBLISHED)
        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();
    $count = $query->count()->execute();

    $news_items = array();
    if (isset($result['node'])) {
        $news_items_nids = array_keys($result['node']);
        $news_items = entity_load('node', $news_items_nids);
    }

    $per_page = PAGER_PROFESSORS_LIST;
    $current_page = pager_default_initialize($count, $per_page);
    $chunks = array_chunk($news_items, $per_page, TRUE);

    if (isset($result['node']))
    {
        $output = theme('professors_list_1', array('nodes' => $chunks[$current_page]));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

function _get_professors_list_2()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'professors')
        ->propertyCondition('status', NODE_PUBLISHED)
        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();
    $count = $query->count()->execute();

    $news_items = array();
    if (isset($result['node'])) {
        $news_items_nids = array_keys($result['node']);
        $news_items = entity_load('node', $news_items_nids);
    }

    $per_page = PAGER_PROFESSORS_LIST;
    $current_page = pager_default_initialize($count, $per_page);
    $chunks = array_chunk($news_items, $per_page, TRUE);

    if (isset($result['node']))
    {
        $output = theme('professors_list_2', array('nodes' => $chunks[$current_page]));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}


function _get_portfolio_list_1()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'portfolio')
        ->propertyCondition('status', NODE_PUBLISHED)
        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $news_items = array();
    if (isset($result['node'])) {
        $news_items_nids = array_keys($result['node']);
        $news_items = entity_load('node', $news_items_nids);
    }

    if (isset($result['node']))
    {
        $output = theme('portfolio_list_1', array('nodes' => $news_items));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

function _get_portfolio_list_2()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'portfolio')
        ->propertyCondition('status', NODE_PUBLISHED)
        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $news_items = array();
    if (isset($result['node'])) {
        $news_items_nids = array_keys($result['node']);
        $news_items = entity_load('node', $news_items_nids);
    }

    if (isset($result['node']))
    {
        $output = theme('portfolio_list_2', array('nodes' => $news_items));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

function _get_portfolio_list_3()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'portfolio')
        ->propertyCondition('status', NODE_PUBLISHED)
        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $news_items = array();
    if (isset($result['node'])) {
        $news_items_nids = array_keys($result['node']);
        $news_items = entity_load('node', $news_items_nids);
    }

    if (isset($result['node']))
    {
        $output = theme('portfolio_list_3', array('nodes' => $news_items));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

function _get_blog_list_1()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->propertyCondition('type', array('blog_standard', 'blog_audio', 'blog_gallery', 'blog_video'))
        ->propertyCondition('status', NODE_PUBLISHED)
        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $news_items = array();
    if (isset($result['node'])) {
        $news_items_nids = array_keys($result['node']);
        $news_items = entity_load('node', $news_items_nids);
    }
//    kpr($news_items);

    $per_page = PAGER_BLOG_LIST_1;
    $count = $query->count()->execute();
    $current_page = pager_default_initialize($count, $per_page);
    $chunks = array_chunk($news_items, $per_page, TRUE);

    if (isset($result['node']))
    {
        $output = theme('blog_list_1', array('nodes' => $chunks[$current_page]));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

function _get_blog_list_2()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->propertyCondition('type', array('blog_standard', 'blog_audio', 'blog_gallery', 'blog_video'))
        ->propertyCondition('status', NODE_PUBLISHED)
        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $news_items = array();
    if (isset($result['node'])) {
        $news_items_nids = array_keys($result['node']);
        $news_items = entity_load('node', $news_items_nids);
    }

    $per_page = PAGER_BLOG_LIST_2;
    $count = $query->count()->execute();
    $current_page = pager_default_initialize($count, $per_page);
    $chunks = array_chunk($news_items, $per_page, TRUE);

    if (isset($result['node']))
    {
        $output = theme('blog_list_2', array('nodes' => $chunks[$current_page]));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

/**
 * Event list 3
 * @return string
 * @throws Exception
 */
function _get_event_list_3()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->propertyCondition('type', array('events'))
        ->propertyCondition('status', NODE_PUBLISHED)
        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $news_items = array();
    if (isset($result['node'])) {
        $news_items_nids = array_keys($result['node']);
        $news_items = entity_load('node', $news_items_nids);
    }

    $per_page = PAGER_EVENT;
    $count = $query->count()->execute();
    $current_page = pager_default_initialize($count, $per_page);
    $chunks = array_chunk($news_items, $per_page, TRUE);

    if (isset($result['node']))
    {
        $output = theme('event_list_3', array('nodes' => $chunks[$current_page]));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

/**
 * Event list 4
 * @return string
 * @throws Exception
 */
function _get_event_list_4()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->propertyCondition('type', array('events'))
        ->propertyCondition('status', NODE_PUBLISHED)
        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $news_items = array();
    if (isset($result['node'])) {
        $news_items_nids = array_keys($result['node']);
        $news_items = entity_load('node', $news_items_nids);
    }

    $per_page = PAGER_EVENT;
    $count = $query->count()->execute();
    $current_page = pager_default_initialize($count, $per_page);
    $chunks = array_chunk($news_items, $per_page, TRUE);

    if (isset($result['node']))
    {
        $output = theme('event_list_4', array('nodes' => $chunks[$current_page]));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

/**
 * Courses list 4
 * @return string
 * @throws Exception
 */
function _get_courses_list_4()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->propertyCondition('type', array(BUNDLE_COURSES))
        ->propertyCondition('status', NODE_PUBLISHED)
//        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $nodes = array();
    if (isset($result['node'])) {
        $nids = array_keys($result['node']);
        $nodes = entity_load('node', $nids);
    }

    if (isset($result['node']))
    {
        $output = theme('courses_list_4', array('nodes' => $nodes));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

/**
 * Courses list 5
 * @return string
 * @throws Exception
 */
function _get_courses_list_5()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->propertyCondition('type', array(BUNDLE_COURSES))
        ->propertyCondition('status', NODE_PUBLISHED)
//        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $nodes = array();
    if (isset($result['node'])) {
        $nids = array_keys($result['node']);
        $nodes = entity_load('node', $nids);
    }

    if (isset($result['node']))
    {
        $output = theme('courses_list_5', array('nodes' => $nodes));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

/**
 * Courses list 5
 * @return string
 * @throws Exception
 */
function _get_courses_list_6()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->propertyCondition('type', array(BUNDLE_COURSES))
        ->propertyCondition('status', NODE_PUBLISHED)
//        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $nodes = array();
    if (isset($result['node'])) {
        $nids = array_keys($result['node']);
        $nodes = entity_load('node', $nids);
    }

    if (isset($result['node']))
    {
        $output = theme('courses_list_6', array('nodes' => $nodes));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

/**
 * Function get all blocks here
 */

function _get_testimonial()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'page_testimonial')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $news_items = array();
    if (isset($result['node'])) {
        $news_items_nids = array_keys($result['node']);
        $news_items = entity_load('node', $news_items_nids);
    }

    if (isset($result['node']))
    {
        foreach ($news_items as $node) {
            $output = theme('testimonial', array('node' => $node));
        }
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

function _get_recent_posts()
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->propertyCondition('type', array('blog_standard', 'blog_audio', 'blog_gallery', 'blog_video'))
        ->propertyCondition('status', NODE_PUBLISHED)
        ->range(0, 4)
        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $news_items = array();
    if (isset($result['node'])) {
        $news_items_nids = array_keys($result['node']);
        $news_items = entity_load('node', $news_items_nids);
    }

    if (isset($result['node']))
    {
        $output = theme('recent_posts', array('nodes' => $news_items));
    }
    else
    {
        $output = 'No results found.';
    }

    return $output;
}

/**
 * Block Blog categories
 * @return string
 * @throws Exception
 */
function _get_blog_categories()
{
    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'taxonomy_term')
        ->entityCondition('bundle', array('blogs'))
        ->propertyOrderBy('weight');

    $result = $query->execute();
    $tids = array_keys($result['taxonomy_term']);

    return theme('blog_categories', array('tids' => $tids));
}

/**
 * Block related posts of a node
 * @param $type
 * @param $number
 * @return string
 * @throws Exception
 */
function _get_related_posts($type, $number)
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', $type)
        ->propertyCondition('status', NODE_PUBLISHED)
        ->range(0, $number)
        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $nodes = array();
    if (isset($result['node'])) {
        $nids = array_keys($result['node']);
        $nodes = entity_load('node', $nids);
    }

    return $nodes;
}

function _get_blog_related_posts($type, $number)
{
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', $type)
        ->propertyCondition('status', NODE_PUBLISHED)
        ->range(0, $number)
        ->propertyOrderBy('nid', 'DESC')
        ->addMetaData('account', user_load(1)); // Run the query as user 1.

    $result = $query->execute();

    $news_items = array();
    if (isset($result['node'])) {
        $news_items_nids = array_keys($result['node']);
        $news_items = entity_load('node', $news_items_nids);
    }

    if (isset($result['node']))
    {
        $output = theme('related_posts', array('nodes' => $news_items));
    }
    else
    {
        $output = '';
    }

    return $output;
}