<?php
namespace Factory;

use Symfony\Component\Yaml\Parser;

class VideoFlub implements VideoInterface {
    // Member variable to store the path of base folder for feeds
    private $feedPath;
    // Member variable to store the name of current feed file
    private $feedFile = 'flub.yaml';
    /**
     * Method that allows
     * us to set the base folder
     * path in our feed providers
     * @param string $feedpath
     * @return void
     *
     */
    public function setFeedPath($feedPath) {
        $this->feedPath = $feedPath;
    }
    /**
     * Method to get the video array
     * in the standard normalized
     * format so that it can be used in
     * common Importer
     * @return array $videoFeed;
     *
     */
    
    public function getVideosArray() {
        $yaml = new Parser();
        
        $videosArray = $yaml->parse(file_get_contents($this->feedPath . $this->feedFile));
        $newFormatedArray = array();
        foreach ($videosArray as $key => $video) {
            $formatedVideo['title'] = $video['name'];
            if (isset($video['labels'])) {
                $formatedVideo['tags'] = $video['labels'];
            } else {
                $formatedVideo['tags'] = null;
            }
            
            $formatedVideo['url'] = $video['url'];
            $newFormatedArray['videos'][] = $formatedVideo;
        }
        
        return $newFormatedArray;
    }
    /**
     * Method that returns the name of class
     * of which it is a member
     * @return string $className;
     *
     */
    
    public function InstanceOfClass() {
        return get_class();
    }
}
