<?php

namespace App;

class Config extends \PDO
{
    private $db;

    public function __construct()
    {
        $this->db = parent::__construct('mysql:host=localhost;dbname=daily_activity','root','nrd113');
    }
}
