<?php
namespace Factory;

class VideoGlorf implements VideoInterface {
	// Member variable to store the path of base folder for feeds
    private $feedPath;
    // Member variable to store the name of current feed file
    private $feedFile = 'glorf.json';
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
        $videosArray = json_decode(file_get_contents($this->feedPath . $this->feedFile), true);
        $newFormatedArray = array();
        foreach ($videosArray['videos'] as $key => $video) {
            $formatedVideo['title'] = $video['title'];
            if (isset($video['tags'])) {
                
                $formatedVideo['tags'] = implode(',', $video['tags']);
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
