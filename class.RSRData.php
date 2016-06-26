<?php

/**
 * Class RSRData
 * to handle all connectivity to
 * Mongo DB for RSR app
 */
class RSRData
{

    /** MongoDB Connection variable */
    private $db;
    /** MongoCollection  */
    private $showsCollection;

    /**
     * Setting up the connection to MongoDB and
     * defining the collection variable
     */
    public function __construct()
    {
        $connection = new \MongoClient(); //localhost 27017
        //database connection
        $this->db = $connection->rsr;
        $this->showsCollection = $this->db->shows;
    }

    /**
     * Adding a show name to the collection
     * @param $showName
     * @param $showReview
     */
    public function addShowToCollection($showName, $showHost)
    {
        $doc = array(
            "showName" => $showName,
            "showHost" => $showHost,
            "date" => time()
        );

        $this->showsCollection->insert($doc);
    }

    /**
     * Retrieve all the shows in the 'shows'
     * collection
     * @return MongoCursor
     */
    public function getAvailableShowsForReview()
    {
        return $this->showsCollection->find();
    }

    /**
     * Get existing data for the document
     * with the supplied id
     * @param $id
     * @return array|null
     */
    public function getExistingShowData($id)
    {
        return $this->showsCollection->findOne(array('_id' => new MongoId($id)));
    }

    /**
     * Update Show Review
     * @param $showReview
     * @param $reviewerName
     * @param $showName
     */
    public function updateShowReview($reviewerName, $showReview, $showName)
    {

        $newdata = array('$set' => array("showReview" => $showReview, "showReviewer" => $reviewerName, "reviewTime" => time()));
        $this->showsCollection->update(array("showName" => $showName), $newdata);
    }



}