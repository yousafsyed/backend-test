<?php
namespace Service\Importer;
/**
 * Service\Importer\VideoImporter - Video Impoter Service
 * NOTE: Requires PHP version 5 or later
 * @package Service\Importer
 * @author Yousaf Syed
 */
/*
 * Sets the config before starting to import
 * It is dependant on Factory\VideoFactory


 * Example


$config = array(
                'siteName'=>"glorf",
                'feedPath'=>"path/to/feed/folder"
            );

$videoImporter = new Service\Importer\VideImporter($config);
$videoImporter->start();

 *
*/
use Factory\VideoFactory;
class VideoImporter {
    // Name of the Site which importer will be using to currently import the videos
    private $configs;
    // VideoFeed base Folder Path
    private $videoFeed;
    // Video List returned from Factory\VideoFactory
    private $videoArray;
    // Array to store the info of current video that is currenlt being in process of import
    private $currentVideoInfo;
    /**
     * Method to setup the configurations
     * @param string[] $config
     * @return void
     *
     */
    public function config($config) {
        $this->configs = $config;
    }
    /**
     * Method to get the configurations
     * @return string[] $config
     *
     */
    public function getConfigs() {
        return $this->configs;
    }
    /**
     * This method gets the videoFeed
     * from the VideoFactory and stores
     * in member variable, and than starts
     * the process of importing videos
     * @return void
     *
     */
    public function start() {
        
        $this->videoFeed = VideoFactory::build($this->configs['siteName']);
        $this->videoFeed->setFeedPath($this->configs['feedPath']);
        $this->videoArray = $this->videoFeed->getVideosArray();
        $this->import();
    }
    /**
     * This method iterates through the
     * videoFeed array stored in member variable
     * and is responsible for extracting video data
     * and calling log Handler
     * @return void
     *
     */
    public function import() {
        
        foreach ($this->videoArray['videos'] as $key => $video) {
            
            $this->currentVideoInfo = $video;
            $this->LogHandler();
        }
    }
    /**
     * @return string title
     *
     */
    public function getCurrentVideoTitle() {
        return $this->currentVideoInfo['title'];
    }
    /**
     * @return string tags
     *
     */
    public function getCurrentVideoTags() {
        return $this->currentVideoInfo['tags'];
    }
    /**
     * @return string url
     *
     */
    public function getCurrentVideoUrl() {
        return $this->currentVideoInfo['url'];
    }
    /**
     * Can be used to instantiate the queing service
     * or to update the data directly on screen or
     * to store on in log files
     * @return void
     *
     */
    public function LogHandler() {
        echo 'Importing: "' . $this->getCurrentVideoTitle() . '"; Url: ' . $this->getCurrentVideoUrl() . '; Tags:' . $this->getCurrentVideoTags() . ';' . PHP_EOL;
    }
}
