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
        $dateString = date("Ymd");
        $showCollectionName="shows_".$dateString;
        $this->showsCollection = $this->db->$showCollectionName;
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
    public function getExistingShowData($id, $date)
    {
        if (!empty($date)){
            $collectionName = "shows_".$date;
            return $this->db->$collectionName->findOne(array('_id' => new MongoId($id)));
        }
        else {
            return $this->showsCollection->findOne(array('_id' => new MongoId($id)));
        }
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

    /**
     * Get back all collections stored
     * in this database
     * @return array
     */
    public function getAvailableCollectionsRaw()
    {
        return $this->db->listCollections();
    }

    /**
     * Get back the collection names (using date)
     * using the available data in the database
     * @return array
     */
    public function getAvailableCollectionDates()
    {
        $collectionDates = array();
        $collections = $this->getAvailableCollectionsRaw();
        foreach($collections as $c){
            $collectionData = explode("rsr.shows_", $c);
            $collectionDates[] = $collectionData[1];
        }

        return $collectionDates;
    }

    /**
     * Get all data for
     * the collection for that date
     * @param $date
     * @return MongoCursor
     */
    public function getShowsForDate($date)
    {
        $collectionName = "shows_".$date;
        return $this->db->$collectionName->find();

    }






}