<?php

namespace BatchWrite;

class PDOAdapter implements DBAdapter
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function query($sql, $params)
    {
        // TODO: Implement query() method.
    }
}
