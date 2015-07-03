<?php
namespace spec\Factory;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VideoGlorfSpec extends ObjectBehavior {
    function it_is_initializable() {
        $this->shouldHaveType('Factory\VideoGlorf');
    }
     /**
     * This method is to check if the VideoSite Provider
     *  an set Feed path
     *
     */
    
    function it_should_have_correct_feed_path() {
        $feedPath = dirname(dirname(__dir__)) . DIRECTORY_SEPARATOR . "feed-exports" . DIRECTORY_SEPARATOR;
        $this->setFeedPath($feedPath);
    }
     /**
     * This method is to check if the VideoSite Provider
     *  returns an array
     *
     */
    function it_should_return_video_array() {
        $feedPath = dirname(dirname(__dir__)) . DIRECTORY_SEPARATOR . "feed-exports" . DIRECTORY_SEPARATOR;
        $this->setFeedPath($feedPath);
        $this->getVideosArray()->shouldBeArray();
    }
}
