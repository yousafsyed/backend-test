<?php
namespace Factory;
interface VideoInterface {
    /**
     * Method that allows
     * us to set the base folder
     * path in our feed providers
     * @param string $feedpath
     * @return void
     *
     */
    public function setFeedPath($feedPath);
    /**
     * Method to get the video array
     * in the standard normalized
     * format so that it can be used in
     * common Importer
     * @return array $videoFeed;
     *
     */
    public function getVideosArray();
    /**
     * Method that returns the name of class
     * of which it is a member
     * @return string $className;
     *
     */
    public function InstanceOfClass();
}
