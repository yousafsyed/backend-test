<?php

namespace spec\Service\Importer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VideoImporterSpec extends ObjectBehavior
{
	#shorthand for directory sperator;
	const DS = DIRECTORY_SEPARATOR;
    function it_is_initializable()
    {
        $this->shouldHaveType('Service\Importer\VideoImporter');
    }
     /**
     * This method is to check if the Importer
     *  Can set the configs provided
     *
     */
    function it_should_set_configs()
    {
    	
    	$configs = array('siteName'=>'glorf','feedPath'=>'');
    	$this->config($configs);
        $this->getConfigs()->shouldReturn($configs);
    }

}
