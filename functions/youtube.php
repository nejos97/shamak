<?php
/**
 * Fetch YouTube ID from URLs
 *
 * @param string $url
 * @return string
 */
function getYoutubeId($url){
    $regex = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*~i';
    $id = preg_replace( $regex, '$1', $url );
	return $id;
}