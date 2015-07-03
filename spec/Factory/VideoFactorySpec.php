<?php

namespace spec\Factory;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VideoFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Factory\VideoFactory');
    }
    /**
     * This method is to check if the video factory returns
     * appropiate instant of the provider
     * */

    function it_should_create_instant_of_appropiate_video_site(){
    	$siteName = 'glorf';
    	$videoSite = $this->build($siteName);
    	$videoSite->InstanceOfClass()->shouldReturn('Factory\Video'.ucwords(strtolower($siteName)));
    }
}
