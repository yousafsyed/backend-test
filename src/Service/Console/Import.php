<?php
namespace Service\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class Import extends Command {
    
    //Member variable to store the instant of videoImporter
    protected $videoImporter;
    /**
     * Constructor that takes the videoImporter instant
     * and stores in the member varibale
     * @param \Service\Importer\VideoImporter $videoImporter
     * @return void
     * */
    function __construct(\Service\Importer\VideoImporter $videoImporter) {
        parent::__construct();
        $this->videoImporter = $videoImporter;
    }
    protected function configure() {
        $this->setName('import')->setDescription('This will import the videos for specified site')->addArgument('name', InputArgument::REQUIRED, 'Name of the site from where you want to import videos');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output) {
        $name = $input->getArgument('name');
        
        if ($name != "") {
            $this->videoImporter->config(array(
            	"siteName" => $name, 
            	"feedPath" => dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . "feed-exports" . DIRECTORY_SEPARATOR
            	));
            $this->videoImporter->start();
            $output->writeln("<info>Videos Imported for site:</info> " . $name);
        } else {
            $output->writeln("<error>Name cannot be empty</error>");
        }
    }
}
