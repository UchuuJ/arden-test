<?php

namespace Arden;
use DBDriver\MySQL;

abstract class Model
{
    protected $data;
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
