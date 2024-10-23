<?php

namespace Jestor;

class Jestor
{
    private $token;
    private $org;
    private $depth;
    private $client;

    public function __construct($_org, $_token, $_depth)
    {
        $this->token = $_token;
        $this->org = $_org;
        $this->depth = $_depth;
        $this->client = new Client($this->org, $this->token, $this->depth);
    }

    public function table($_tableName): Table
    {
        return new Table($this->org, $this->token, $this->depth, $_tableName);
    }

    public function user(): User
    {
        return new User($this->org, $this->token, $this->depth);
    }

    public function file($_table, $_field, $_id): File
    {
        return new File($this->org, $this->token, $this->depth, $_table, $_field, $_id);
    }

    public function __call($name, $arguments)
    {
        $args = ['arguments' => $arguments];
        return $this->client->jestorCallFunctions($name, $args);
    }
}
