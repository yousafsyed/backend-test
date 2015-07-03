<?php
namespace Factory;
/**
 * Factory\VideoFactory
 * @package Factory
 * @author Yousaf Syed
 *
 * This factory gives us the abstrated layer of complex objects for
 * Video providers. It exposes the similar methods with normalized
 * Responses from the different video providers.
 * We want to use Factory because
 * We want to encapsulate the logic for instantiating complex objects.
 * We want to reduce tight coupling between our application classes.
 *
 */

class VideoFactory {
    private $siteName;
    
    public static function build($siteName) {
        $videoSite = "Video" . ucwords(strtolower($siteName));
        $videoSiteClass = "Factory\\" . $videoSite;
        if (class_exists($videoSiteClass)) {
            return new $videoSiteClass();
        } else {
            throw new \Exception('Invalid sitename or not yet supported');
        }
    }
}

