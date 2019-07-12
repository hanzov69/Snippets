<?
/*
 * A library for dealing with the Flickr API.
 * This software is free to use, modify and redistribute
 * under any and all circumstances. There is no warranty whatsoever.
 * If you use it or like it, let me know.
 * 
 * Chris Eberly@Apr/05/2007
 * me@behindthecurve.net
 */
# how many urls to return? 1-500 valid
define('FLICKR_TOTAL_URLS', '500');

define('FLICKR_API_KEY', '51a238f104d0eebe490bfe274fbf8862');
define('FLICKR_REST_URL_FSTRING', 'http://api.flickr.com/services/rest/?%s');
define('FLICKR_STATIC_PHOTO_URL_FSTRING', 'http://farm%s.static.flickr.com/%s/%s_%s.jpg');
define('FLICKR_PHOTO_URL_FSTRING', 'http://www.flickr.com/photos/%s/%s');

function _flickr_request($url_encoded_params, &$unserialized_response)
{
    $url_encoded_params[] = 'format=php_serial';

    $param_str = implode('&', $url_encoded_params);

    $url = sprintf(FLICKR_REST_URL_FSTRING, $param_str);
    
    if ( ($contents = file_get_contents($url)) === FALSE) {
        return FALSE;
    }

    if ( ($unserialized_response = unserialize($contents)) === FALSE) {
        return FALSE;
    }

    return TRUE;
}

function _url_encode_parameters(&$unencoded_parameters)
{
    $rarray = array();

    foreach ($unencoded_parameters as $k => $p) {
        $rarray[] = urlencode($k) . '=' . urlencode($p);
    }

    $unencoded_parameters = $rarray;

    return TRUE;
}

# Returns an array of arrays of URLs for a user's photos.
# e.g:
# array[0] {
#   array {
#       ['static'] = (static photo url)
#       ['flickr'] = (url of photo on flickr)
#   }
# }
function flickr_get_user_photo_urls($user_id, &$photo_urls)
{
    $parameters = array
    (
        'api_key'   => FLICKR_API_KEY,
        'method'    => 'flickr.people.getPublicPhotos',
        'user_id'    => $user_id,
	'per_page' => FLICKR_TOTAL_URLS
    );

    if ($user_id) {
        $parameters['user_id'] = $user_id;
    }

    if (!_url_encode_parameters($parameters)) {
        return FALSE;
    }

    $response = array();

    if (!_flickr_request($parameters, $response)) {
        return FALSE;
    }
    
    if ($response['stat'] != 'ok') {
        return FALSE;
    }

    if (!isset($response['photos']['photo'])) {
        return FALSE;
    }

    $index = 0;

    foreach ($response['photos']['photo'] as $photo) {
        $static_url = sprintf(
                      FLICKR_STATIC_PHOTO_URL_FSTRING, 
                      $photo['farm'], 
                      $photo['server'], 
                      $photo['id'], 
                      $photo['secret']
                      );

        $flickr_url = sprintf(
                      FLICKR_PHOTO_URL_FSTRING,
                      $user_id,
                      $photo['id']
                      );
    
        $photo_urls[$index]['static'] = $static_url;
        $photo_urls[$index]['flickr'] = $flickr_url;

        $index++;
    }

    return TRUE;
}
?>
