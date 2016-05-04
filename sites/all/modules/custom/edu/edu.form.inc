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
 * Implements hook_mail().
 */
function edu_mail($key, &$message, $params)
{
    global $user;

    $options = array(
        'langcode' => $message['language']->language,
    );

    switch ($key) {
        case 'contact_message':
            $message['subject'] = t('E-mail sent from @site-name', array('@site-name' => variable_get('site_name', 'Drupal')), $options);
            $message['body'][] = t('@name sent you the following message:', array('@name' => $user->name), $options);
            $message['body'][] = check_plain($params['message']);
            break;
    }
}

/**
 * @param $form_values
 */
function edu_mail_send($form_values)
{
    $module = 'edu';
    $key = 'contact_message';

    $to = $form_values['email'];
    $from = variable_get('site_mail', 'admin@example.com');
    $params = $form_values;
    $language = language_default();
    $send = TRUE;

    $result = drupal_mail($module, $key, $to, $language, $params, $from, $send);
    if ($result['result'] == TRUE) {
        drupal_set_message(t('Your message has been sent.'));
    }
    else {
        drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
    }
}

/**
 * Implements hook_mail_alter().
 */
/*function edu_mail_alter(&$message)
{
    $options = array(
        'langcode' => $message['language']->language,
    );

    $signature = t("\n--\nMail altered by Edu module.", array(), $options);
    if (is_array($message['body'])) {
        $message['body'][] = $signature;
    }
    else {
        $message['body'] .= $signature;
    }
}*/

/**
 * Implements hook_form().
 */
function kopa_contact_form()
{
    $form['#attributes']['class'][] = 'contact-form clearfix';

    $form['#prefix'] = '<section class="kopa-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="contact-form">';
    $form['#suffix'] = '<div id="response"></div>
                        </div>
                        <!-- contact-form -->
                    </div>
                    <!-- col-md-12 -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </section>
        <!-- kopa-area -->';

    $form['wrapper-text'] = array(
        '#type' => 'container',
        '#attributes' => array(
            'class' => array('row'),
        ),
    );
    $form['wrapper-text']['name'] = array(
        '#type' => 'textfield',
        '#attributes' => array(
            'class' => array('valid'),
            'id' => array('contact_name'),
            'placeholder' => array('Name*'),
        ),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="col-md-4 col-sm-4"><p class="input-block"><label class="required" for="contact_name"><i class="fa fa-user"></i></label>',
        '#suffix' => '</p></div>',
    );
    $form['wrapper-text']['email'] = array(
        '#type' => 'textfield',
        '#attributes' => array(
            'class' => array('valid'),
            'id' => array('contact_email'),
            'placeholder' => array('Email*'),
        ),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="col-md-4 col-sm-4"><p class="input-block"><label class="required" for="contact_email"><i class="fa fa-envelope"></i></label>',
        '#suffix' => '</p></div>',
    );
    $form['wrapper-text']['website'] = array(
        '#type' => 'textfield',
        '#attributes' => array(
            'class' => array('valid'),
            'id' => array('contact_url'),
            'placeholder' => array('Website'),
        ),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="col-md-4 col-sm-4"><p class="input-block"><label class="required" for="contact_url"><i class="fa fa-globe"></i></label>',
        '#suffix' => '</p></div>',
    );
    $form['wrapper-message'] = array(
        '#type' => 'container',
        '#attributes' => array(
            'class' => array('row'),
        ),
    );
    $form['wrapper-message']['message'] = array(
        '#type' => 'textarea',
        '#cols' => 88,
        '#rows' => 6,
        '#attributes' => array(
            'id' => array('contact_message'),
            'placeholder' => array('Message*'),
        ),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="col-md-12"><p class="textarea-block"><label class="required" for="contact_message"><i class="fa fa-list-ul"></i></label>',
        '#suffix' => '</p></div>',
    );
    $form['wrapper-submit'] = array(
        '#type' => 'container',
        '#attributes' => array(
            'class' => array('row'),
        ),
    );
    $form['wrapper-submit']['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Send messages'),
        '#attributes' => array(
            'id' => array('submit-contact'),
            'class' => array('input-submit'),
        ),
        '#prefix' => '<div class="col-md-12"><p class="contact-button clearfix">',
        '#suffix' => '</p></div>',
    );

    return $form;
}

/**
 * @param $form
 * @param $form_state
 */
function kopa_contact_form_validate($form, &$form_state)
{

}

/**
 * @param $form
 * @param $form_state
 */
function kopa_contact_form_submit($form, &$form_state)
{
    edu_mail_send($form_state['values']);
}

/**
 *
 * Processing comment at here
 */

function kopa_comment_form()
{
    $form['#attributes']['class'][] = 'comment-form clearfix';

    $form['#prefix'] = '<div id="respond">';
    $form['#suffix'] = '</div>';

    $form['#attached']['js'] = array(
        drupal_get_path('module', 'edu') . 'js/form.js',
    );

    $form['intro'] = array(
        '#markup' => t('Your email address will not be published. Required fields are marked *'),
        '#prefix' => '<span class="c-note">',
        '#suffix' => '</span>',
    );

    $form['wrapper-text'] = array(
        '#type' => 'container',
        '#attributes' => array(
            'class' => array('row'),
        ),
    );
    $form['wrapper-text']['name'] = array(
        '#type' => 'textfield',
        '#attributes' => array(
            'class' => array('valid'),
            'id' => array('comment_name'),
            'placeholder' => array('Name*'),
        ),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="col-md-4 col-sm-4"><p class="input-block"><label class="required" for="comment_name"><i class="fa fa-user"></i></label>',
        '#suffix' => '</p></div>',
    );
    $form['wrapper-text']['email'] = array(
        '#type' => 'textfield',
        '#attributes' => array(
            'class' => array('valid'),
            'id' => array('comment_email'),
            'placeholder' => array('Email*'),
        ),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="col-md-4 col-sm-4"><p class="input-block"><label class="required" for="comment_email"><i class="fa fa-envelope"></i></label>',
        '#suffix' => '</p></div>',
    );
    $form['wrapper-text']['website'] = array(
        '#type' => 'textfield',
        '#attributes' => array(
            'class' => array('valid'),
            'id' => array('comment_url'),
            'placeholder' => array('Website'),
        ),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="col-md-4 col-sm-4"><p class="input-block"><label class="required" for="comment_url"><i class="fa fa-globe"></i></label>',
        '#suffix' => '</p></div>',
    );
    $form['wrapper-message'] = array(
        '#type' => 'container',
        '#attributes' => array(
            'class' => array('row'),
        ),
    );
    $form['wrapper-message']['message'] = array(
        '#type' => 'textarea',
        '#cols' => 88,
        '#rows' => 6,
        '#attributes' => array(
            'id' => array('comment_message'),
            'placeholder' => array('Message*'),
        ),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="col-md-12"><p class="textarea-block"><label class="required" for="comment_message"><i class="fa fa-list-ul"></i></label>',
        '#suffix' => '</p></div>',
    );
    $form['wrapper-submit'] = array(
        '#type' => 'container',
        '#attributes' => array(
            'class' => array('row'),
        ),
    );
    $form['wrapper-submit']['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Post Comment'),
        '#attributes' => array(
            'id' => array('submit-comment'),
            'class' => array('input-submit'),
        ),
        '#prefix' => '<div class="col-md-12"><p class="comment-button clearfix">',
        '#suffix' => '</p></div>',
    );

    return $form;
}
/*
function kopa_comment_form_submit($form, &$form_state)
{
    global $user;
    $nid = arg(1);

    $comment = new stdClass();

    $comment->nid = $nid; // nid of a node you want to attach a comment to
    $comment->cid = 0; // leave it as is
    $comment->pid = 0; // parent comment id, 0 if none
    $comment->uid = ($user->uid) ? $user->uid : ''; // user's id, who left the comment
    $comment->mail = $form_state['values']['email']; // user's email
    $comment->name = $form_state['values']['name']; // If user is authenticated you can omit this field, it will be auto-populated, if the user is anonymous and you want to name him somehow, input his name here

    // Make sure we have a bundle name.
    if (!isset($comment->node_type)) {
        $node = node_load($comment->nid);
        $comment->node_type = 'comment_node_' . $node->type;
    }

    if ($comment->cid) {

        drupal_write_record('comment', $comment, 'cid');

        // Ignore slave server temporarily to give time for the
        // saved comment to be propagated to the slave.
        db_ignore_slave();

        // Update the {node_comment_statistics} table prior to executing hooks.
        _comment_update_node_statistics($comment->nid);

        field_attach_update('comment', $comment);
        // Allow modules to respond to the updating of a comment.
        module_invoke_all('comment_update', $comment);
        module_invoke_all('entity_update', $comment, 'comment');
    }
    else {
        // Add the comment to database. This next section builds the thread field.
        // Also see the documentation for comment_view().
        if (!empty($comment->thread)) {
            // Allow calling code to set thread itself.
            $thread = $comment->thread;
        }
        elseif ($comment->pid == 0) {
            // This is a comment with no parent comment (depth 0): we start
            // by retrieving the maximum thread level.
            $max = db_query('SELECT MAX(thread) FROM {comment} WHERE nid = :nid', array(':nid' => $comment->nid))->fetchField();
            // Strip the "/" from the end of the thread.
            $max = rtrim($max, '/');
            // We need to get the value at the correct depth.
            $parts = explode('.', $max);
            $firstsegment = $parts[0];
            // Finally, build the thread field for this new comment.
            $thread = int2vancode(vancode2int($firstsegment) + 1) . '/';
        }
        else {
            // This is a comment with a parent comment, so increase the part of the
            // thread value at the proper depth.

            // Get the parent comment:
            $parent = comment_load($comment->pid);
            // Strip the "/" from the end of the parent thread.
            $parent->thread = (string) rtrim((string) $parent->thread, '/');
            // Get the max value in *this* thread.
            $max = db_query("SELECT MAX(thread) FROM {comment} WHERE thread LIKE :thread AND nid = :nid", array(
                ':thread' => $parent->thread . '.%',
                ':nid' => $comment->nid,
            ))->fetchField();

            if ($max == '') {
                // First child of this parent.
                $thread = $parent->thread . '.' . int2vancode(0) . '/';
            }
            else {
                // Strip the "/" at the end of the thread.
                $max = rtrim($max, '/');
                // Get the value at the correct depth.
                $parts = explode('.', $max);
                $parent_depth = count(explode('.', $parent->thread));
                $last = $parts[$parent_depth];
                // Finally, build the thread field for this new comment.
                $thread = $parent->thread . '.' . int2vancode(vancode2int($last) + 1) . '/';
            }
        }

        if (empty($comment->created)) {
            $comment->created = REQUEST_TIME;
        }

        if (empty($comment->changed)) {
            $comment->changed = $comment->created;
        }

        if ($comment->uid === $user->uid && isset($user->name)) { // '===' Need to modify anonymous users as well.
            $comment->name = $user->name;
        }

        // Ensure the parent id (pid) has a value set.
        if (empty($comment->pid)) {
            $comment->pid = 0;
        }

        // Add the values which aren't passed into the function.
        $comment->thread = $thread;
        $comment->hostname = ip_address();

        drupal_write_record('comment', $comment);

        // Ignore slave server temporarily to give time for the
        // created comment to be propagated to the slave.
        db_ignore_slave();

        // Update the {node_comment_statistics} table prior to executing hooks.
        _comment_update_node_statistics($comment->nid);

        field_attach_insert('comment', $comment);

        // Tell the other modules a new comment has been submitted.
        module_invoke_all('comment_insert', $comment);
        module_invoke_all('entity_insert', $comment, 'comment');
    }

    $comment->is_anonymous = 0; // leave it as is
    $comment->homepage = $form_state['values']['website']; // you can add homepage URL here
    $comment->status = COMMENT_NOT_PUBLISHED; // We auto-publish this comment
    $comment->language = LANGUAGE_NONE; // The same as for a node
    $comment->subject = $form_state['values']['name'];
    $comment->comment_body[$comment->language][0]['value'] = $form_state['values']['message']; // Everything here is pretty much like with a node
    $comment->comment_body[$comment->language][0]['format'] = 'filtered_html';

    $comment->field_email[LANGUAGE_NONE][0]['value'] = $form_state['values']['email'];
    $comment->field_website[LANGUAGE_NONE][0]['value'] = $form_state['values']['website'];

    comment_submit($comment); // saving a comment
    comment_save($comment);

    drupal_set_message(t('Thank you for your comment, administrator will be consider your comment and approve it!'));
}
*/

function courses_search_form($form, &$form_state)
{
    $form['#prefix'] = '<section class="kopa-area kopa-area-2 kopa-area-light">

        	<div class="container">

        		<div class="row">

        			<div class="col-md-12">

        				<div class="widget kopa-course-search-widget">

        					<div class="widget-title widget-title-s5 text-center">
	                            <span></span>
	                            <h2>Courses search</h2>
	                            <p>Make Your Success a Priority.</p>
	                        </div>
	                        <!-- widget-title -->

	                        <div class="widget-content">';
    $form['#suffix'] = '<p class="text-center">Or, If you’re looking for more specific News, please visit our News Center to receive our other news publications. Visit Our News Center</p>

	                        </div>
	                        <!-- widget-content -->

        				</div>
        				<!-- widget -->

        			</div>
        			<!-- col-md-12 -->

        		</div>
        		<!-- row -->

        	</div>
        	<!-- container -->

        </section>
        <!-- kopa-area-light -->';

    $form['#attributes']['class'][] = 'course-form clearfix';

    $form['category'] = array(
        '#type' => 'select',
        '#options' => drupal_map_assoc(array_merge(array('-- Category --'), _get_taxonomy_term('Courses'))),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="row"><div class="col-md-3 col-sm-3 col-xs-12"><div class="select-block">',
        '#suffix' => '<i class="fa fa-sort-desc"></i></div></div>'
    );

    $form['duration'] = array(
        '#type' => 'select',
        '#options' => drupal_map_assoc(array_merge(array('-- Duration --'), _get_taxonomy_term('duration'))),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="col-md-3 col-sm-3 col-xs-12"><div class="select-block">',
        '#suffix' => '<i class="fa fa-sort-desc"></i></div></div>'
    );

    $form['level'] = array(
        '#type' => 'select',
        '#options' => drupal_map_assoc(array_merge(array('-- Level --'), _get_taxonomy_term('level'))),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="col-md-3 col-sm-3 col-xs-12"><div class="select-block">',
        '#suffix' => '<i class="fa fa-sort-desc"></i></div></div>'
    );

    $form['location'] = array(
        '#type' => 'select',
        '#options' => drupal_map_assoc(array_merge(array('-- Location --'), _get_taxonomy_term('location'))),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="col-md-3 col-sm-3 col-xs-12"><div class="select-block">',
        '#suffix' => '<i class="fa fa-sort-desc"></i></div></div></div>'
    );

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => 'Search',
        '#attributes' => array(
            'class' => array('course-submit'),
        ),
        '#prefix' => '<div class="text-center">',
        '#suffix' => '</div>'
    );
    return $form;
}

function courses_search_form_submit($form, &$form_state) {
    $category = ($form_state['values']['category'] != '-- Category --') ? '+' . $form_state['values']['category'] : '';
    $level = ($form_state['values']['level'] != '-- Level --') ? '+' . $form_state['values']['level'] : '';
    $duration = ($form_state['values']['duration'] != '-- Duration --') ? '+' . $form_state['values']['duration'] : '';
    $location = ($form_state['values']['location'] != '-- Location --') ? '+' . $form_state['values']['location'] : '';

    if (!empty($category) || !empty($level) || !empty($duration) || !empty($location)) {
        drupal_goto('search/node/' . $category . $level . $duration . $location);
    }
}

function courses_search_block_form($form, &$form_state)
{
    $form['#prefix'] = '<div class="widget kopa-course-search-2-widget"><h4 class="widget-title widget-title-s10">Courses search</h4><div class="widget-content">';
    $form['#suffix'] = '</div></div>';

    $form['#attributes']['class'][] = 'course-form clearfix';

    $form['category'] = array(
        '#type' => 'select',
        '#options' => drupal_map_assoc(array_merge(array('-- Category --'), _get_taxonomy_term('Courses'))),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="select-block">',
        '#suffix' => '<i class="fa fa-sort-desc"></i></div>'
    );

    $form['duration'] = array(
        '#type' => 'select',
        '#options' => drupal_map_assoc(array_merge(array('-- Duration --'), _get_taxonomy_term('duration'))),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="select-block">',
        '#suffix' => '<i class="fa fa-sort-desc"></i></div>'
    );

    $form['level'] = array(
        '#type' => 'select',
        '#options' => drupal_map_assoc(array_merge(array('-- Level --'), _get_taxonomy_term('level'))),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="select-block">',
        '#suffix' => '<i class="fa fa-sort-desc"></i></div>'
    );

    $form['location'] = array(
        '#type' => 'select',
        '#options' => drupal_map_assoc(array_merge(array('-- Location --'), _get_taxonomy_term('location'))),
        '#theme_wrappers' => array(),
        '#prefix' => '<div class="select-block">',
        '#suffix' => '<i class="fa fa-sort-desc"></i></div>'
    );

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => 'Search',
        '#attributes' => array(
            'class' => array('course-submit'),
        ),
    );
    return $form;
}

function courses_search_block_form_submit($form, &$form_state) {
    $category = ($form_state['values']['category'] != '-- Category --') ? '+' . $form_state['values']['category'] : '';
    $level = ($form_state['values']['level'] != '-- Level --') ? '+' . $form_state['values']['level'] : '';
    $duration = ($form_state['values']['duration'] != '-- Duration --') ? '+' . $form_state['values']['duration'] : '';
    $location = ($form_state['values']['location'] != '-- Location --') ? '+' . $form_state['values']['location'] : '';

    if (!empty($category) || !empty($level) || !empty($duration) || !empty($location)) {
        drupal_goto('search/node/' . $category . $level . $duration . $location);
    } else {
        drupal_set_message(t('Please select at least one field!'));
    }
}


function node_search_block_form($form, &$form_state)
{
    $form['#prefix'] = '<div class="kopa-search-box"><a href="#" class="toggle-search-box"><i class="fa fa-search"></i><span>search</span></a>';
    $form['#suffix'] = '</div>';

    $form['#attributes']['class'][] = 'search-form clearfix';

    $form['keyword'] = array(
        '#type' => 'textfield',
        '#required' => TRUE,
        '#theme_wrappers' => array(),
        '#attributes' => array(
            'class' => array('search-text'),
        ),
    );
    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => 'Search',
        '#attributes' => array(
            'class' => array('search-submit'),
        ),
        '#theme_wrappers' => array(),
//        '#suffix' => '<i class="fa fa-search"></i>',
    );
    return $form;
}

function node_search_block_form_submit($form, &$form_state) {
    drupal_goto('search/node/' . $form_state['values']['keyword']);
}
