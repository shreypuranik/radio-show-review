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
        $this->showsCollection = $banksData = $this->db->shows;
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

}