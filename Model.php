<?php

namespace Arden;
use DBDriver\MySQL;

abstract class Model
{
    protected $data;

    /**
     * As this is the models base class we set up the Database
     * so Models that inherit this class can use it.
     */
    protected $database;
    public function __construct()
    {
        $this->database = new MySQL();
    }

    /**
     * @return array
     */
    abstract public function getData();
}
