<?php
/**
 * Created by haph on 12/18/15
 */

/**
 * @file
 * @reviewed by Ha
 * @date Feb 04, 2016
 */

/**
 * Create links prev, next for every article content type
 * @param $node
 * @return array
 */
function _get_article_prev_next($node)
{
    $result = db_query('SELECT n.nid, n.title from {node} n WHERE n.type = :type', array(':type' => $node->type));
    $anid = array();
    $atitle = array();
    foreach ($result as $record) {
        $anid[] = $record->nid;
        $atitle[] = $record->title;
    }
    $idx = -1;
    for ($i = 0; $i < count($anid); $i++) {
        if ($anid[$i] == $node->nid) {
            $idx = $i;
        }
    }

    return array($idx, $anid, $atitle);
}

/**
 * @param $address
 * @return array
 */
function _get_location_from_google_maps($address) {
    $address = urlencode($address);

    $url = "http://maps.googleapis.com/maps/api/geocode/json?address=$address&sensor=false";

    // Make the HTTP request
    $data = @file_get_contents($url);
    // Parse the json response
    $json_data = json_decode($data, TRUE);

    // If the json data is invalid, return empty array
    if (!check_json_data_status($json_data))
        return array();

    $location = array(
        'lat' => $json_data["results"][0]["geometry"]["location"]["lat"],
        'lng' => $json_data["results"][0]["geometry"]["location"]["lng"],
        'place' => $json_data["results"][0]["address_components"][2]["short_name"],
    );

    return $location;
}

/**
 * @param $json_data
 * @return bool
 */
function check_json_data_status($json_data) {
    if ($json_data["status"] == "OK")
        return TRUE;
    return FALSE;
}

/**
 * @param $text
 * @param $maxchar
 * @param string $end
 * @return string
 */
function sub_str_words($text, $maxchar, $end = '...')
{
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);
        $output = '';
        $i = 0;
        while (1) {
            $length = strlen($output) + strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            }
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    }
    else {
        $output = $text;
    }

    return $output;
}

/**
 * Get youtube video id from url
 * @param string $youtube_url
 * @return boolean|mixed
 */
function _get_youtube_video_id($youtube_url)
{
    $query_string = parse_url($youtube_url, PHP_URL_QUERY);

    if (!$query_string) {
        return FALSE;
    }

    parse_str($query_string, $queries);
    return isset($queries['v']) ? $queries['v'] : FALSE;
}

/**
 * Get Youtube video screenshot
 * @param string $youtube_url
 * @param string $quality
 * @return string|boolean
 */
function _get_youtube_screenshot($youtube_url, $quality = 'maxres')
{
    $video_id = _be_youtube_video_id($youtube_url);
    if ($video_id) {
        //return 'http://img.youtube.com/vi/' . $ytID . '/' . $quality . 'default.jpg';
        return 'http://img.youtube.com/vi/' . $video_id . '/0.jpg';
    }

    return FALSE;
}


/**
 * get comment body from field_data_comment_body table
 * @param $cid
 * @return mixed
 */
function _get_comment_body($cid)
{
    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'comment')
        ->entityCondition('entity_id', $cid, '=')
        ->propertyCondition('status', NODE_PUBLISHED);

    $result = $query->execute();
//    dpm(entity_get_info());

    if (isset($result['comment'])) {
        $news_items_nids = array_keys($result['comment']);
        $news_items = entity_load('comment', $news_items_nids);
    }

    return $news_items;
}

/**
 * count comment by node
 * @param $nid
 * @param $status
 * @return mixed
 */
function _get_comment_count_by_node($nid, $status) {
    $count = db_query('SELECT COUNT(cid) FROM {comment} WHERE nid = :nid AND status = :status', array(
        ':nid' => $nid,
        ':status' => $status,
    ))->fetchField();

    return $count;
}

/**
 * return list taxonomy term name
 * @param $name
 * @return array
 */
function _get_taxonomy_term($name)
{
    $vocal = taxonomy_vocabulary_machine_name_load($name);
    $tree = taxonomy_get_tree($vocal->vid);
    $term_name = array();
    foreach ($tree as $term) {
        $term_name[] = $term->name;
    }

    return $term_name;
}

/**
 * @param $string
 * @return mixed|string
 */
function _get_first_paragraph($string)
{
    $string = substr($string, 0, strpos($string, "</a>") + 4);
    $string = str_replace("<a>", "", str_replace("</a>", "", $string));

    return $string;
}