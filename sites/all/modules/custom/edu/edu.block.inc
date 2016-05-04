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
 * Implements hook_block_info().
 */
function edu_block_info()
{
    $blocks['kopa_contact'] = array(
        'info' => t('Kopa contact'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['recent_posts'] = array(
        'info' => t('Recent posts'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['blog_categories'] = array(
        'info' => t('Blog categories'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['related_posts'] = array(
        'info' => t('Related posts'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['blog_list_1'] = array(
        'info' => t('Blog list 1'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['blog_list_2'] = array(
        'info' => t('Blog list 2'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['professor_list_1'] = array(
        'info' => t('Professor list 1'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['professor_list_2'] = array(
        'info' => t('Professor list 2'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['portfolio_list_1'] = array(
        'info' => t('Portfolio list 1'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['portfolio_list_2'] = array(
        'info' => t('Portfolio list 2'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['portfolio_list_3'] = array(
        'info' => t('Portfolio list 3'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['event_list_1'] = array(
        'info' => t('Event list 1'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['event_list_2'] = array(
        'info' => t('Event list 2'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['event_list_3'] = array(
        'info' => t('Event list 3'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['event_list_4'] = array(
        'info' => t('Event list 4'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['courses_list_4'] = array(
        'info' => t('Courses list 4'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['courses_list_5'] = array(
        'info' => t('Courses list 5'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['courses_list_6'] = array(
        'info' => t('Courses list 6'),
        'cache' => DRUPAL_NO_CACHE
    );

    $blocks['courses_search'] = array(
        'info' => t('Courses search block form'),
        'cache' => DRUPAL_NO_CACHE,
    );

    $blocks['courses_search_page'] = array(
        'info' => t('Courses search page form'),
        'cache' => DRUPAL_NO_CACHE,
    );

    $blocks['node_search'] = array(
        'info' => t('Node search form'),
        'cache' => DRUPAL_NO_CACHE,
    );

    return $blocks;
}

/**
 * Implements hook_block_view().
 */
function edu_block_view($delta = '')
{
    $block = array();

    $node = menu_get_object();

    switch ($delta) {
        case 'kopa_contact':
            $block['subject'] = t('Contact');
            $block['content'] = drupal_get_form('kopa_contact_form');
            break;

        case 'recent_posts':
            $block['subject'] = t('Recent posts');
            $block['content'] = _get_recent_posts();
            break;

        case 'blog_categories':
            $block['subject'] = t('Blog categories');
            $block['content'] = _get_blog_categories();
            break;

        case 'related_posts':
            $block['subject'] = t('Related posts');
            $block['content'] = _get_blog_related_posts($node->type, RELATED_POSTS_BLOG);
            break;

        case 'blog_list_1':
            $block['subject'] = t('Kopa blog list 1');
            $block['content'] = _get_blog_list_1();
            break;

        case 'blog_list_2':
            $block['subject'] = t('Blog list 2');
            $block['content'] = _get_blog_list_2();
            break;

        case 'professor_list_1':
            $block['subject'] = t('Professor list 1');
            $block['content'] = _get_professors_list_1();
            break;

        case 'professor_list_2':
            $block['subject'] = t('Professor list 2');
            $block['content'] = _get_professors_list_2();
            break;

        case 'portfolio_list_1':
            $block['content'] = _get_portfolio_list_1();
            break;

        case 'portfolio_list_2':
            $block['content'] = _get_portfolio_list_2();
            break;

        case 'portfolio_list_3':
            $block['content'] = _get_portfolio_list_3();
            break;

        case 'event_list_3':
            $block['content'] = _get_event_list_3();
            break;

        case 'event_list_4':
            $block['content'] = _get_event_list_4();
            break;

        case 'courses_list_4':
            $block['content'] = _get_courses_list_4();
            break;

        case 'courses_list_5':
            $block['content'] = _get_courses_list_5();
            break;

        case 'courses_list_6':
            $block['content'] = _get_courses_list_6();
            break;

        case 'courses_search':
            $block['title'] = 'Custom Courses Search Block';
            $block['content'] = drupal_get_form('courses_search_block_form');
            break;

        case 'courses_search_page':
            $block['title'] = 'Custom Courses Search Page';
            $block['content'] = drupal_get_form('courses_search_form');
            break;

        case 'node_search':
            $block['title'] = 'Node Search Page';
            $block['content'] = drupal_get_form('node_search_block_form');
            break;
    }

    return $block;
}

function edu_block_configure($delta = '') {
    
}